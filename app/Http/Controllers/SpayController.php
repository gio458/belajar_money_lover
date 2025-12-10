<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SpayController;
use App\Models\Spay ;

class SpayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Spay::where('user_id', auth()->id())->get();

        $income = Spay::where('user_id', auth()->id())->where('type', 'income')->sum('amount');
        $expense = Spay::where('user_id', auth()->id())->where('type', 'expense')->sum('amount');

        $balance = $income - $expense;

        return view('spay.spay', compact('data', 'income', 'expense', 'balance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required|integer',
            'category' => 'required',
            'note' => 'nullable',
            'date' => 'required|date',
        ]);

        Spay::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'amount' => $request->amount,
            'category' => $request->category,
            'note' => $request->note,
            'date' => $request->date,
        ]);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
