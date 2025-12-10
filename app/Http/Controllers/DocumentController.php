<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spay;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use PDF; // barryvdh/laravel-dompdf
use Maatwebsite\Excel\Facades\Excel; // jika pakai Maatwebsite
use App\Exports\SpayExport; // jika pakai Excel export class

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::where('user_id', auth()->id())->latest()->get();

        return view('document.document', compact('documents'));
    }

    // endpoint export: ?from=YYYY-MM-DD&to=YYYY-MM-DD&format=pdf|excel
    public function export(Request $request)
    {
        $request->validate([
            'from' => 'required|date',
            'to'   => 'required|date',
            'format' => 'required|in:pdf,excel'
        ]);

        $from = $request->from;
        $to = $request->to;
        $userId = auth()->id();

        $data = Spay::where('user_id', $userId)
                    ->whereBetween('date', [$from, $to])
                    ->orderBy('date','asc')
                    ->get();

        $fileName = 'history_'.$userId.'_'.str_replace('-','',$from).'_'.str_replace('-','',$to).'_'.time();

        if($request->format === 'pdf'){
            $pdf = PDF::loadView('document.history', compact('data','from','to'));
            $fullName = $fileName.'.pdf';
            $path = 'documents/'.$fullName;
            Storage::put($path, $pdf->output());
            $size = Storage::size($path);

            $doc = Document::create([
                'user_id' => $userId,
                'name' => $fullName,
                'type' => 'pdf',
                'path' => $path,
                'size' => $size,
            ]);

            return Storage::download($path, $fullName);
        }

        // Excel branch (Maatwebsite)
        if($request->format === 'excel'){
            // buat export class SpayExport yang menerima $from, $to, $userId
            $export = new SpayExport($from, $to, $userId);
            $fullName = $fileName.'.xlsx';
            $path = 'documents/'.$fullName;

            // simpan file ke storage
            Excel::store($export, $path);

            $size = Storage::size($path);
            $doc = Document::create([
                'user_id' => $userId,
                'name' => $fullName,
                'type' => 'excel',
                'path' => $path,
                'size' => $size,
            ]);

            return Storage::download($path, $fullName);
        }
    }
    public function download($id)
{
    $doc = Document::where('user_id', auth()->id())->findOrFail($id);

    return Storage::download($doc->path, $doc->name);
}


}
