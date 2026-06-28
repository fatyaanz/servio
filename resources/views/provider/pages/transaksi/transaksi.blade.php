@extends('provider.layouts.app')

@section('content')

<div class="transaksi-page">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <div class="header-badge"><i class='bx bx-wallet'></i> Keuangan Provider</div>
            <h1>Riwayat Transaksi</h1>
            <p>Lihat semua dana yang masuk dari pembayaran booking pelanggan.</p>
        </div>
    </div>

    {{-- STATS CARDS --}}
    <div class="stats-grid">

        <div class="stat-card primary">
            <div class="stat-icon"><i class='bx bx-money'></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Pendapatan</span>
                <h2 class="stat-value">Rp{{ number_format($totalEarnings, 0, ',', '.') }}</h2>
            </div>
        </div>

        <div class="stat-card green">
            <div class="stat-icon"><i class='bx bx-calendar'></i></div>
            <div class="stat-info">
                <span class="stat-label">Bulan Ini</span>
                <h2 class="stat-value">Rp{{ number_format($thisMonth, 0, ',', '.') }}</h2>
            </div>
        </div>

        <div class="stat-card blue">
            <div class="stat-icon"><i class='bx bx-package'></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Order Selesai</span>
                <h2 class="stat-value">{{ $totalOrders }} order</h2>
            </div>
        </div>

        <div class="stat-card orange">
            <div class="stat-icon"><i class='bx bx-building-house'></i></div>
            <div class="stat-info">
                <span class="stat-label">Saldo Aktif</span>
                <h2 class="stat-value">Rp{{ number_format(Auth::user()->balance ?? 0, 0, ',', '.') }}</h2>
            </div>
        </div>

    </div>

    {{-- TABLE --}}
    <div class="table-card">

        <div class="table-header">
            <h3><i class='bx bx-list-ul'></i> Detail Transaksi</h3>
            <span class="total-badge">{{ $totalOrders }} transaksi</span>
        </div>

        @if($transactions->isEmpty())
            <div class="empty-state">
                <i class='bx bx-credit-card' style="font-size:60px;color:#cbd5e1;"></i>
                <h3>Belum ada transaksi</h3>
                <p>Pendapatan dari pembayaran booking akan tampil di sini.</p>
            </div>
        @else
        <div class="table-wrapper">
            <table class="transaksi-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Order</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Total Bayar</th>
                        <th>Biaya App</th>
                        <th>Diterima</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $index => $trx)
                    <tr>
                        <td class="no-col">{{ $index + 1 }}</td>
                        <td>
                            <span class="order-id">
                                {{ $trx->booking ? $trx->booking->formatted_id : '#' . $trx->booking_id }}
                            </span>
                        </td>
                        <td>
                            <div class="customer-info">
                                <img
                                    src="{{ $trx->booking && $trx->booking->customer && $trx->booking->customer->profile_photo
                                        ? asset('storage/' . $trx->booking->customer->profile_photo)
                                        : 'https://ui-avatars.com/api/?name=' . urlencode($trx->booking?->customer?->name ?? 'C') . '&background=f08a28&color=fff' }}"
                                    class="customer-avatar"
                                    alt="Customer">
                                <span>{{ $trx->booking?->customer?->name ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="layanan-col">
                            @if($trx->booking && $trx->booking->subServices->isNotEmpty())
                                {{ $trx->booking->subServices->pluck('name')->join(', ') }}
                            @else
                                <span style="color:#aaa;">—</span>
                            @endif
                        </td>
                        <td class="date-col">
                            {{ $trx->created_at->format('d M Y') }}<br>
                            <small style="color:#aaa;">{{ $trx->created_at->format('H:i') }}</small>
                        </td>
                        <td class="amount-col">
                            Rp{{ number_format($trx->amount + $trx->service_fee + ($trx->app_fee ?? 0), 0, ',', '.') }}
                        </td>
                        <td class="fee-col">
                            <span class="fee-badge">Rp{{ number_format($trx->app_fee ?? 5000, 0, ',', '.') }}</span>
                        </td>
                        <td class="earned-col">
                            <strong style="color:#16A34A;">Rp{{ number_format($trx->amount, 0, ',', '.') }}</strong>
                        </td>
                        <td>
                            @if($trx->booking_id)
                            <a href="{{ route('provider.detail-pesanan', $trx->booking_id) }}" class="detail-btn">
                                Lihat
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>

</div>

<style>

.transaksi-page {
    padding: 28px;
}

/* Header */
.page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
}

.header-badge {
    display: inline-block;
    background: #FFF6EE;
    color: #F08A28;
    border: 1px solid rgba(240,138,40,.15);
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 10px;
}

.page-header h1 {
    font-size: 38px;
    font-weight: 800;
    color: #1e293b;
    margin: 0 0 6px;
}

.page-header p {
    color: #7b8497;
    font-size: 14px;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 28px;
}

.stat-card {
    background: white;
    border-radius: 22px;
    padding: 22px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.05);
    border: 1px solid rgba(0,0,0,0.04);
    transition: .25s;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.08);
}

.stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.stat-card.primary .stat-icon { background: #FFF3E0; }
.stat-card.green .stat-icon   { background: #DCFCE7; }
.stat-card.blue .stat-icon    { background: #EFF6FF; }
.stat-card.orange .stat-icon  { background: #FFF7ED; }

.stat-label {
    font-size: 12px;
    color: #888;
    font-weight: 600;
    display: block;
    margin-bottom: 6px;
}

.stat-value {
    font-size: 20px;
    font-weight: 800;
    color: #1e293b;
    margin: 0;
}

/* Table Card */
.table-card {
    background: white;
    border-radius: 24px;
    padding: 28px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
}

.table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
}

.table-header h3 {
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
}

.total-badge {
    background: #F3F4F6;
    color: #555;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
}

.table-wrapper {
    overflow-x: auto;
}

.transaksi-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.transaksi-table th {
    padding: 14px 16px;
    text-align: left;
    font-weight: 700;
    color: #6B7280;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: .5px;
    border-bottom: 2px solid #F3F4F6;
    white-space: nowrap;
}

.transaksi-table td {
    padding: 16px;
    color: #374151;
    border-bottom: 1px solid #F9FAFB;
    vertical-align: middle;
}

.transaksi-table tr:hover td {
    background: #FAFAFA;
}

.no-col {
    font-weight: 700;
    color: #aaa;
    width: 40px;
}

.order-id {
    background: #FFF6EE;
    color: #F08A28;
    padding: 5px 12px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 13px;
    white-space: nowrap;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
}

.customer-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #F3F4F6;
}

.layanan-col {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.date-col {
    font-size: 13px;
    white-space: nowrap;
}

.amount-col {
    font-weight: 700;
    color: #1e293b;
    white-space: nowrap;
}

.fee-badge {
    background: #FEE2E2;
    color: #DC2626;
    padding: 4px 10px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}

.earned-col {
    font-size: 15px;
    white-space: nowrap;
}

.detail-btn {
    display: inline-block;
    background: #F08A28;
    color: white;
    padding: 7px 14px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
    transition: .2s;
    white-space: nowrap;
}

.detail-btn:hover {
    background: #e07818;
    transform: translateY(-1px);
}

/* Empty */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #888;
}

.empty-state h3 {
    margin: 18px 0 8px;
    font-size: 20px;
    color: #555;
}

.empty-state p {
    font-size: 14px;
}

/* Responsive */
@media (max-width: 1024px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    .page-header h1 {
        font-size: 28px;
    }
}

</style>

@endsection
