<?php

namespace App\Http\Controllers;

use App\Models\Spay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HistoryController extends Controller
{
    public function index(Request $request)
    {
    $search = $request->query('search', '');   // atau $request->search ?? ''
    $filter = $request->query('filter', '');   // default empty

    $query = \App\Models\Spay::where('user_id', auth()->id());

    if ($filter === 'income') {
        $query->where('type', 'income');
    } elseif ($filter === 'expense') {
        $query->where('type', 'expense');
    }

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('note', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%")
              ->orWhere('type', 'like', "%{$search}%");
        });
    }

    // pagination + jaga query string
    $history = $query->orderBy('date','desc')->paginate(10)->appends($request->query());

    return view('history.history', compact('history', 'search', 'filter'));
}

    public function edit($id)
    {
        $data = Spay::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Spay::where('user_id', Auth::id())->findOrFail($id);

        $data->update([
            'type' => $request->type,
            'amount' => $request->amount,
            'category' => $request->category,
            'note' => $request->note,
            'date' => $request->date,
        ]);

        return back()->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $history = Spay::findOrFail($id);
        $history->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data has been deleted'
        ]);
    }
    public function download($id)
{
    $spay = Spay::findOrFail($id);
    $userId = auth()->id();

    $fileName = 'spay_'.$spay->id.'_'.time().'.pdf';
    $path = 'documents/'.$fileName;

    // generate PDF
    $pdf = PDF::loadView('document.history', compact('spay'));
    Storage::put($path, $pdf->output());

    // save record to documents
    Document::create([
        'user_id' => $userId,
        'name' => $fileName,
        'type' => 'pdf',
        'path' => $path,
        'size' => Storage::size($path)
    ]);

    return Storage::download($path);
}
public function exportExcel()
{
    $userId = auth()->id();
    
    // ambil semua spay user ini
    $spay = Spay::where('user_id', $userId)->get();

    // buat nama file
    $fileName = 'spay_'.$userId.'_'.time().'.xlsx';
    $path = 'documents/'.$fileName;
    
    // export
    Excel::store(new SpayExport($userId), $path);

    // simpan ke table documents
    Document::create([
        'user_id' => $userId,
        'name' => $fileName,
        'type' => 'excel',
        'path' => $path,
        'size' => Storage::size($path)
    ]);

    // download ke user
    return Storage::download($path);
}


}
