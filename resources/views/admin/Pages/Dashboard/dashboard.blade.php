@extends('admin.layouts.app')

@section('content')

<style>
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
        font-size:32px;
        font-weight:700;
        color:var(--primary);
        margin-bottom:6px;
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

        border-radius:20px;

        background:linear-gradient(135deg,#ff8a00,#ffb347);

        color:white;

        box-shadow:var(--shadow-md);

        transition:0.3s ease;
    }

    .stat-card:hover{
        transform:translateY(-4px);
    }

   .stat-card{
    min-height:140px;
}

    .stat-label{
        font-size:14px;
        font-weight:500;
        position:relative;
        z-index:2;
    }

    .stat-number{
        font-size:30px;
        font-weight:700;
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
    border-radius:20px;
    padding:20px;
    border:1px solid var(--border);
    box-shadow:var(--shadow-sm);
}

    .table-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:14px;
    }

    .table-header h3{
        font-size:18px;
    font-weight:600;
    color:var(--text-dark);
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
        color:var(--text-secondary);
        font-weight:700;
    }
    .empty-state{
    text-align:center;
    color:var(--text-secondary);
    padding:24px;
    background:white;
}

    td{
        padding:14px 12px;
        font-size:13px;
        color:#374151;
        background: white;
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
    .dashboard-date{
    font-size:14px;
    color:var(--text-secondary);
    font-weight:500;
}
.stat-card{
    position:relative;
}

.stat-icon{
    position:absolute;
    top:20px;
    right:20px;

    font-size:32px;

    opacity:.25;
}

</style>

<div class="dashboard-page">

    <!-- HEADER -->

    <div class="dashboard-header">

        <div class="dashboard-title">
            <h1>Dashboard Admin</h1>
            <p>Pantau aktivitas dan data layanan Servio.</p>
        </div>

        <div class="dashboard-date">
            {{ now()->translatedFormat('l, d F Y') }}
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
            <div class="stat-label">Pendapatan ServioPay</div>
            <div class="stat-number">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</div>
            <div class="stat-info">Total dana dari biaya layanan</div>
        </div>

    </div>

    <!-- CONTENT -->

    <div class="content-grid">

        <!-- PENYEDIA TERBARU -->

        <div class="table-card">

            <div class="table-header">
                <h3>Penyedia Layanan Terbaru</h3>
                <a href="{{ url('/admin/providers') }}">
                    Lihat Semua
                </a>
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
                <a href="{{ url('/admin/Kategori_Layanan/categories') }}">
                    Lihat Semua
                </a>
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
                        @if($provider->status == 'approved')
                            <td>
                                <span class="badge badge-success">
                                    Aktif
                                </span>
                            </td>
                        @else
                            <span class="badge badge-warning">
                                Pending
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach

            </table>

        </div>

        <!-- APPROVAL PENYEDIA -->

        <div class="table-card full-width">

            <div class="table-header">
                <h3>Approval Penyedia Baru</h3>
                <a href="{{ url('/admin/providers') }}">
                    Lihat Semua
                </a>
            </div>

            <table>

                <tr>
                    <th>Nama Penyedia</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>

                @if($pendingProviders->isEmpty())

                <tr>
                    <td colspan="3" class="empty-state">
                        Belum ada provider yang menunggu approval
                    </td>
                </tr>

                @else

                @foreach($pendingProviders as $provider)

                <tr>
                    <td>{{ $provider->name }}</td>

                    <td>{{ $provider->email }}</td>

                    <td>
                        <span class="badge badge-warning">
                            Menunggu Approval
                        </span>
                    </td>
                </tr>

                @endforeach

                @endif

            </table>

        </div>

    </div>

</div>

@endsection