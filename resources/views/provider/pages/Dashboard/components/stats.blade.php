<div class="stats-grid">

    <!-- CARD 1 -->

    <div class="stats-card">

        <div class="stats-icon orange">
            👜
        </div>

        <div class="stats-info">

            <p>
                Order hari ini
            </p>

            <h2>
                {{ $ordersTodayCount }}
            </h2>

            <span class="stats-success" style="color: {{ strpos($comparisonText, '📈') !== false ? '#22c55e' : (strpos($comparisonText, '📉') !== false ? '#ef4444' : '#6b7280') }};">
                {{ $comparisonText }}
            </span>

        </div>

    </div>

    <!-- CARD 2 -->

    <div class="stats-card">

        <div class="stats-icon blue">
            🛠️
        </div>

        <div class="stats-info">

            <p>
                Order Aktif
            </p>

            <h2>
                {{ $activeOrders }}
            </h2>

            <a href="{{ route('provider.pesanan') }}">
                Lihat Detail
            </a>

        </div>

    </div>

    <!-- CARD 3 -->

    <div class="stats-card">

        <div class="stats-icon yellow">
            😊
        </div>

        <div class="stats-info">

            <p>
                Order Baru (Pending)
            </p>

            <h2>
                {{ $pendingApprovalCount }}
            </h2>

            <a href="{{ route('provider.pesanan') }}">
                Lihat Detail
            </a>

        </div>

    </div>

    <!-- CARD 4 -->

    <div class="stats-card">

        <div class="stats-icon green">
            💳
        </div>

        <div class="stats-info">

            <p>
                Pendapatan hari ini
            </p>

            <h2>
                Rp{{ number_format($todayIncome, 0, ',', '.') }}
            </h2>

            <a href="{{ route('provider.transaksi') }}">
                Lihat Detail
            </a>

        </div>

    </div>

    <!-- CARD 5 -->

    <div class="stats-card">

        <div class="stats-icon purple" style="background: #f5f3ff; color: #8b5cf6;">
            ⭐
        </div>

        <div class="stats-info">

            <p>
                Rata-rata Rating
            </p>

            <h2>
                {{ number_format($averageRating, 1) }}
            </h2>

            <a href="{{ route('provider.ulasan') }}">
                Lihat Ulasan
            </a>

        </div>

    </div>

</div>

<style>

    .stats-grid{

        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));

        gap:18px;

    }

    .stats-card{

        display:flex;
        align-items:center;
        gap:18px;

        background:white;

        padding:22px;

        border-radius:22px;

        border:1px solid #eef0f4;

        box-shadow:
        0 6px 18px rgba(15,23,42,0.04);

        transition:0.3s ease;

    }

    .stats-card:hover{

        transform:translateY(-3px);

        box-shadow:
        0 10px 24px rgba(15,23,42,0.08);

    }

    /* =========================
        ICON
    ========================== */

    .stats-icon{

        width:62px;
        height:62px;

        border-radius:18px;

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:28px;

        flex-shrink:0;

    }

    .orange{
        background:#fff1e8;
        color:#ff7a00;
    }

    .blue{
        background:#eef4ff;
        color:#3b82f6;
    }

    .yellow{
        background:#fff8df;
        color:#d4a300;
    }

    .green{
        background:#eafaf0;
        color:#22c55e;
    }

    /* =========================
        INFO
    ========================== */

    .stats-info p{

        font-size:14px;
        color:#6b7280;

        margin-bottom:6px;

        font-weight:500;

    }

    .stats-info h2{

        font-size:34px;
        color:#111827;

        margin-bottom:6px;

    }

    .stats-info a{

        text-decoration:none;

        color:#2563eb;

        font-size:13px;
        font-weight:600;

    }

    .stats-success{

        color:#22c55e;

        font-size:13px;
        font-weight:600;

    }

</style>