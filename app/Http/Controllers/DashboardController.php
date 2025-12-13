<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Spay;
use App\Models\Transaction;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        $transactions = Transaction::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->get();

        $totalIncome = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = Spay::where('user_id', $userId)
            ->where('type', 'expense')
            ->sum('amount');

        $totalBalance = $totalIncome - $totalExpense;

        return view('dashboard.index', compact(
            'transactions',
            'totalIncome',
            'totalExpense',
            'totalBalance'
        ));

        
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
        //
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
