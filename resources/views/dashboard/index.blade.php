@extends('layouts.app')

{{-- PAGE META --}}
@section('page_title_main', 'Saldo-')
@section('page_title_blue', 'In')
@section('page_description', 'Manage your money here.')

@section('content')

<div class="dashboard-wrapper">

    {{-- DASHBOARD CONTENT --}}
    <main class="dashboard-content">

        {{-- SUMMARY CARDS --}}
        <section class="summary-cards">

            <div class="summary-card">
                <i class="icon icon-wallet"></i>
                <p>Total Balance</p>
                <h3>
                    Rp {{ number_format($totalBalance ?? 0, 0, ',', '.') }}
                </h3>
            </div>

            <div class="summary-card">
                <i class="icon icon-up"></i>
                <p>Expenditure</p>
                <h3 class="red">
                    Rp {{ number_format($totalExpense ?? 0, 0, ',', '.') }}
                </h3>
            </div>

            <div class="summary-card">
                <i class="icon icon-down"></i>
                <p>Income</p>
                <h3 class="green">
                    Rp {{ number_format($totalIncome ?? 0, 0, ',', '.') }}
                </h3>
            </div>

        </section>
        {{-- END SUMMARY CARDS --}}

                {{-- TRANSACTION HISTORY --}}
        <section class="history-card">
            <h3>Transaction History</h3>

            <table>
                <thead>
                    <tr>
                        <th>Report Name</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($transactions as $trx)
                        <tr>
                            <td>{{ $trx->report_name }}</td>
                            <td>{{ ucfirst($trx->type) }}</td>
                            <td>{{ \Carbon\Carbon::parse($trx->date)->format('d M Y') }}</td>
                            <td class="{{ $trx->type === 'expense' ? 'red' : 'green' }}">
                                Rp {{ number_format($trx->amount, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center;">
                                Belum ada transaksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        {{-- END TRANSACTION HISTORY --}}


    </main>
    {{-- END DASHBOARD CONTENT --}}

</div>

@endsection
