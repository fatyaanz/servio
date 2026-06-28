<div class="stats-grid">

    <!-- CARD 1: ORDER HARI INI -->
    <div class="stats-card">
        <div class="stats-icon orange">
            <i class='bx bx-shopping-bag'></i>
        </div>
        <div class="stats-info">
            <p>Order hari ini</p>
            <h2>{{ $ordersTodayCount }}</h2>
            <span class="stats-success" style="color: {{ str_contains($comparisonText, 'naik') ? '#22c55e' : (str_contains($comparisonText, 'turun') ? '#ef4444' : '#6b7280') }};">
                {{ $comparisonText }}
            </span>
        </div>
    </div>

    <!-- CARD 2: ORDER AKTIF -->
    <div class="stats-card">
        <div class="stats-icon blue">
            <i class='bx bx-wrench'></i>
        </div>
        <div class="stats-info">
            <p>Order Aktif</p>
            <h2>{{ $activeOrders }}</h2>
            <a href="{{ route('provider.pesanan') }}">Lihat Detail</a>
        </div>
    </div>

    <!-- CARD 3: ORDER BARU (PENDING) -->
    <div class="stats-card">
        <div class="stats-icon yellow">
            <i class='bx bx-time-five'></i>
        </div>
        <div class="stats-info">
            <p>Order Baru (Pending)</p>
            <h2>{{ $pendingApprovalCount }}</h2>
            <a href="{{ route('provider.pesanan') }}">Lihat Detail</a>
        </div>
    </div>

    <!-- CARD 4: PENDAPATAN HARI INI -->
    <div class="stats-card">
        <div class="stats-icon green">
            <i class='bx bx-wallet'></i>
        </div>
        <div class="stats-info">
            <p>Pendapatan hari ini</p>
            <h2>Rp{{ number_format($todayIncome, 0, ',', '.') }}</h2>
            <a href="{{ route('provider.transaksi') }}">Lihat Detail</a>
        </div>
    </div>

    <!-- CARD 5: TOTAL PRODUK -->
    <div class="stats-card">
        <div class="stats-icon purple" style="background: #f5f3ff; color: #8b5cf6;">
            <i class='bx bx-package'></i>
        </div>
        <div class="stats-info">
            <p>Total Produk</p>
            <h2>{{ $totalProduk }}</h2>
            <a href="{{ route('provider.produk') }}">Kelola Produk</a>
        </div>
    </div>

    <!-- CARD 6: TOTAL LAYANAN -->
    <div class="stats-card">
        <div class="stats-icon cyan" style="background: #e0f2fe; color: #0ea5e9;">
            <i class='bx bx-category-alt'></i>
        </div>
        <div class="stats-info">
            <p>Total Layanan</p>
            <h2>{{ $totalLayanan }}</h2>
            <a href="{{ route('provider.layanan') }}">Kelola Layanan</a>
        </div>
    </div>

</div>

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    .stats-card {
        display: flex;
        align-items: center;
        gap: 16px;
        background: white;
        padding: 20px;
        border-radius: 20px;
        border: 1px solid #eef0f4;
        box-shadow: 0 4px 15px rgba(15,23,42,0.03);
        transition: 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(15,23,42,0.06);
        border-color: #e2e8f0;
    }

    /* =========================
        ICON
    ========================== */
    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
        flex-shrink: 0;
    }

    .orange {
        background: #fff1e8;
        color: #ff7a00;
    }

    .blue {
        background: #eef4ff;
        color: #3b82f6;
    }

    .yellow {
        background: #fff8df;
        color: #d4a300;
    }

    .green {
        background: #eafaf0;
        color: #22c55e;
    }

    /* =========================
        INFO
    ========================== */
    .stats-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-width: 0; /* Prevents text overflow breaking flex layout */
    }

    .stats-info p {
        font-size: 13px;
        color: #64748b;
        margin: 0 0 4px 0;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stats-info h2 {
        font-size: 24px;
        color: #0f172a;
        margin: 0 0 6px 0;
        font-weight: 800;
        line-height: 1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .stats-info a {
        text-decoration: none;
        color: #3b82f6;
        font-size: 13px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: 0.2s;
    }
    
    .stats-info a::after {
        content: '\eb72'; /* bx-chevron-right */
        font-family: 'boxicons';
        font-size: 16px;
        opacity: 0;
        transform: translateX(-5px);
        transition: 0.2s;
    }
    
    .stats-info a:hover {
        color: #2563eb;
    }
    
    .stats-info a:hover::after {
        opacity: 1;
        transform: translateX(0);
    }

    .stats-success {
        color: #22c55e;
        font-size: 12px;
        font-weight: 600;
    }

    /* =========================
        RESPONSIVE
    ========================== */
    @media(max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width: 640px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>