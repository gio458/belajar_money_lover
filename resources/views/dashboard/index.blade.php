@extends('layouts.app')

@section('page_title_main', 'Saldo-')
@section('page_title_blue', 'In')
@section('page_description', 'Manage your money here.')

@section('content')

<div class="dashboard-wrapper">

    {{-- CONTENT --}}
    <main class="dashboard-content">


        {{-- SUMMARY CARDS --}}
        <div class="summary-cards">

            <div class="summary-card">
                <i class="icon icon-wallet"></i>
                <p>Total Balance</p>
                <h3>$1234.56</h3>
            </div>

            <div class="summary-card">
                <i class="icon icon-up"></i>
                <p>Expenditure</p>
                <h3 class="red">$1234.56</h3>
            </div>

            <div class="summary-card">
                <i class="icon icon-down"></i>
                <p>Income</p>
                <h3 class="green">$1234.56</h3>
            </div>

        </div>

        {{-- TRANSACTION HISTORY --}}
        <div class="history-card">
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

    </main>

</div>

@endsection
