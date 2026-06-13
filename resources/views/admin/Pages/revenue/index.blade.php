@extends('admin.layouts.app')

@section('content')

<style>
    .revenue-page {
        padding-bottom: 40px;
    }

    .revenue-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
    }

    .revenue-title h1 {
        font-size: 32px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 6px;
    }

    .revenue-title p {
        color: #7b8494;
        font-size: 15px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        padding: 22px;
        border-radius: 20px;
        background: linear-gradient(135deg, #ff8a00, #ffb347);
        color: white;
        box-shadow: var(--shadow-md);
        min-height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .stat-label {
        font-size: 14px;
        font-weight: 500;
    }

    .stat-number {
        font-size: 36px;
        font-weight: 700;
        margin-top: 8px;
    }

    .table-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        border: 1px solid var(--border);
        box-shadow: var(--shadow-sm);
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
    }

    .table-header h3 {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-dark);
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    th {
        text-align: left;
        padding: 0 12px 8px;
        font-size: 12px;
        color: var(--text-secondary);
        font-weight: 700;
    }

    td {
        padding: 14px 12px;
        font-size: 13px;
        color: #374151;
        background: white;
        transition: 0.2s ease;
    }

    tr td:first-child {
        border-radius: 12px 0 0 12px;
    }

    tr td:last-child {
        border-radius: 0 12px 12px 0;
    }

    tr:hover td {
        background: #fff5eb;
    }

    .empty-state {
        text-align: center;
        color: var(--text-secondary);
        padding: 40px;
        background: white;
    }

    .pagination-wrapper {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }
</style>

<div class="revenue-page">

    <!-- HEADER -->
    <div class="revenue-header">
        <div class="revenue-title">
            <h1>ServioPay Ledger</h1>
            <p>Laporan pendapatan dan biaya layanan transaksi aplikasi Servio.</p>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Total Saldo Pendapatan Admin (ServioPay)</div>
            <div class="stat-number">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</div>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="table-card">
        <div class="table-header">
            <h3>Detail Uang Masuk Biaya Layanan</h3>
        </div>

        @if($transactions->isEmpty())
            <div class="empty-state">
                <span style="font-size: 48px; display: block; margin-bottom: 15px;">📊</span>
                <p style="font-weight: 600; font-size: 15px; margin: 0;">Belum ada biaya layanan yang masuk.</p>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID Order</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Provider</th>
                        <th>Tanggal & Jam Transaksi</th>
                        <th>Biaya Layanan (Admin)</th>
                        <th>Total Pembayaran (Customer)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $tx)
                        <tr>
                            <td style="font-weight: 700; color: #ff7a00;">#{{ $tx->booking->formatted_id }}</td>
                            <td>{{ $tx->customer->name }}</td>
                            <td>{{ $tx->provider->name }}</td>
                            <td>{{ $tx->created_at->format('d M Y • H:i') }}</td>
                            <td style="font-weight: 700; color: #22c55e;">+Rp{{ number_format($tx->app_fee, 0, ',', '.') }}</td>
                            <td style="font-weight: 600;">Rp{{ number_format($tx->amount, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination-wrapper">
                {{ $transactions->links() }}
            </div>
        @endif

    </div>

</div>

@endsection
