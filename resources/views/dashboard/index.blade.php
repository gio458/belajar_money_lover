@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-grid">
    
    <div class="summary-cards">
        
        {{-- Total Balance Card --}}
        <div class="card balance-card">
            <div class="card-icon">
                <i class="icon-balance"></i>
            </div>
            <p class="card-label">Total Balance</p>
            <h2 class="card-amount">$1234.56</h2>
        </div>

        {{-- Expenditure Card --}}
        <div class="card expenditure-card">
            <div class="card-icon">
                <i class="icon-up-arrow"></i>
            </div>
            <p class="card-label">Expenditure</p>
            <h2 class="card-amount">$1234.56</h2>
        </div>

        {{-- Income Card --}}
        <div class="card income-card">
            <div class="card-icon">
                <i class="icon-down-arrow"></i>
            </div>
            <p class="card-label">Income</p>
            <h2 class="card-amount">$1234.56</h2>
        </div>

    </div>

    <div class="card transaction-history-card">
        <h3>Transaction history</h3>
        <table>
            <thead>
                <tr>
                    <th>Report Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Iki Manurung</td>
                    <td>Cash</td>
                    <td>22 Octo 2025</td>
                    <td class="text-right">$400.00</td>
                </tr>
                <tr>
                    <td>Gio Ciamis</td>
                    <td>Transfer</td>
                    <td>19 Octo 2025</td>
                    <td class="text-right">$150.00</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection