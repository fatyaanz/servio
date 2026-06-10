@extends('admin.layouts.app')

@section('content')

<style>

    *{
        font-family:'Inter',sans-serif;
        box-sizing:border-box;
    }

    html,
    body{
        background:#f5f7fb;
        overflow-y:auto !important;
    }

    /* =========================
        PAGE
    ========================== */

    .dashboard-page{
        padding-bottom:40px;
    }

    /* =========================
        HEADER
    ========================== */

    .dashboard-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:28px;
    }

    .dashboard-title h1{
        font-size:36px;
        font-weight:800;
        color:#ff7a00;
        margin-bottom:6px;
        letter-spacing:-1px;
    }

    .dashboard-title p{
        color:#7b8494;
        font-size:15px;
    }

    /* =========================
        STATS CARD
    ========================== */

    .stats-grid{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:18px;
        margin-bottom:25px;
    }

    .stat-card{
        position:relative;
        overflow:hidden;

        padding:22px;

        border-radius:24px;

        background:linear-gradient(135deg,#ff8a00,#ffb347);

        color:white;

        box-shadow:
        0 10px 25px rgba(255,138,0,0.18);

        transition:0.3s ease;
    }

    .stat-card:hover{
        transform:translateY(-4px);
    }

    .stat-card::before{
        content:'';

        position:absolute;

        width:130px;
        height:130px;

        background:rgba(255,255,255,0.10);

        border-radius:50%;

        top:-50px;
        right:-40px;
    }

    .stat-card::after{
        content:'';

        position:absolute;

        width:70px;
        height:70px;

        background:rgba(255,255,255,0.08);

        border-radius:50%;

        bottom:-20px;
        right:15px;
    }

    .stat-label{
        font-size:14px;
        font-weight:500;
        position:relative;
        z-index:2;
    }

    .stat-number{
        font-size:34px;
        font-weight:800;
        margin:10px 0 8px;
        position:relative;
        z-index:2;
    }

    .stat-info{
        font-size:12px;
        opacity:0.9;
        position:relative;
        z-index:2;
    }

    /* =========================
        CONTENT GRID
    ========================== */

    .content-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
        align-items:start;
    }

    .table-card{
        background:white;
        border-radius:24px;
        padding:20px;

        border:1px solid #f3f4f6;

        box-shadow:
        0 6px 20px rgba(15,23,42,0.04);

        transition:0.3s ease;
    }

    .table-card:hover{
        transform:translateY(-2px);
    }

    .table-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:14px;
    }

    .table-header h3{
        font-size:20px;
        font-weight:800;
        color:#1f2937;
    }

    .table-header a{
        text-decoration:none;
        color:#ff7a00;
        font-size:13px;
        font-weight:700;
    }

    /* =========================
        TABLE
    ========================== */

    table{
        width:100%;
        border-collapse:separate;
        border-spacing:0 8px;
    }

    th{
        text-align:left;
        padding:0 12px 8px;
        font-size:12px;
        color:#94a3b8;
        font-weight:700;
    }

    td{
        padding:14px 12px;
        font-size:13px;
        color:#374151;
        background:#fafafa;
        transition:0.2s ease;
    }

    tr td:first-child{
        border-radius:12px 0 0 12px;
    }

    tr td:last-child{
        border-radius:0 12px 12px 0;
    }

    tr:hover td{
        background:#fff5eb;
    }

    /* =========================
        STATUS
    ========================== */

    .status{
        padding:6px 12px;
        border-radius:999px;
        font-size:11px;
        font-weight:700;
        display:inline-block;
    }

    .active{
        background:#dcfce7;
        color:#16a34a;
    }

    .pending{
        background:#fef3c7;
        color:#d97706;
    }

    /* =========================
        FULL WIDTH
    ========================== */

    .full-width{
        grid-column:1 / -1;
    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:1200px){

        .stats-grid{
            grid-template-columns:repeat(2,1fr);
        }

        .content-grid{
            grid-template-columns:1fr;
        }

        .full-width{
            grid-column:auto;
        }

    }

    @media(max-width:700px){

        .stats-grid{
            grid-template-columns:1fr;
        }

        .dashboard-title h1{
            font-size:30px;
        }

    }

</style>

<div class="dashboard-page">

    <!-- HEADER -->

    <div class="dashboard-header">

        <div class="dashboard-title">
            <h1>Dashboard</h1>
            <p>Selamat datang kembali, Admin Servio 👋</p>
        </div>

    </div>

    <!-- STATS -->

    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-label">Total Penyedia Layanan</div>
            <div class="stat-number">{{ $totalProvider }}</div>
            <div class="stat-info">Total provider terdaftar</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Penyedia Aktif</div>
            <div class="stat-number">{{ $providerAktif }}</div>
            <div class="stat-info">Provider yang telah disetujui</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Kategori</div>
            <div class="stat-number">{{ $totalKategori }}</div>
            <div class="stat-info">Kategori layanan tersedia</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Sub Layanan</div>
            <div class="stat-number">{{ $totalSubLayanan }}</div>
            <div class="stat-info">Sub layanan tersedia</div>
        </div>

    </div>

    <!-- CONTENT -->

    <div class="content-grid">

        <!-- PENYEDIA TERBARU -->

        <div class="table-card">

            <div class="table-header">
                <h3>Penyedia Layanan Terbaru</h3>
                <a href="#">Lihat semua</a>
            </div>

            <table>

                <tr>
                    <th>Nama Penyedia</th>
                    <th>Kategori</th>
                    <th>Status</th>
                </tr>

                @foreach($latestProviders as $provider)
                <tr>
                    <td>{{ $provider->name }}</td>

                    <td>
                        @if($provider->categories->count())
                            {{ $provider->categories->pluck('name')->join(', ') }}
                        @else
                            -
                        @endif
                    </td>

                    <td>
                        <span class="status {{ $provider->status == 'approved' ? 'active' : 'pending' }}">
                            {{ ucfirst($provider->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach

            </table>

        </div>

        <!-- KATEGORI -->
        <div class="table-card">

            <div class="table-header">
                <h3>Kategori Layanan</h3>
                <a href="#">Lihat semua</a>
            </div>

            <table>

                <tr>
                    <th>Kategori</th>
                    <th>Jumlah Provider</th>
                    <th>Status</th>
                </tr>

                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>

                    <td>{{ $category->providers->count() }}</td>

                    <td>
                        <span class="status active">
                            Aktif
                        </span>
                    </td>
                </tr>
                @endforeach

            </table>

        </div>

        <!-- APPROVAL PENYEDIA -->

        <div class="table-card full-width">

            <div class="table-header">
                <h3>Approval Penyedia Baru</h3>
                <a href="#">Lihat semua</a>
            </div>

            <table>

                <tr>
                    <th>Nama Penyedia</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>

                @foreach($pendingProviders as $provider)
                <tr>
                    <td>{{ $provider->name }}</td>

                    <td>{{ $provider->email }}</td>

                    <td>
                        <span class="status pending">
                            Menunggu Approval
                        </span>
                    </td>
                </tr>
                @endforeach

            </table>

        </div>

    </div>

</div>

@endsection