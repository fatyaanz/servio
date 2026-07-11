<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - Servio</title>
    
    <!-- Design System -->
    <link rel="stylesheet" href="{{ asset('css/servio-design-system.css') }}">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        /* CSS variables for Design System Tokens */
        :root {
            --font-family: 'Inter', sans-serif;
            --border-radius-btn: 8px;
            --border-radius-input: 8px;
            --border-radius-card: 16px;
            --border-radius-sidebar: 24px;
            
            /* Color Palette (PRD Aligned) */
            --color-primary: #E28743;
            --color-primary-hover: #C97539;
            --color-primary-light: #FFF8F1;
            --color-bg-main: #FAFAFC;
            --color-bg-card: #FFFFFF;
            --color-text-title: #1F2937;
            --color-text-body: #4B5563;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            
            /* Secondary stats colors */
            --color-blue-bg: #EFF6FF;
            --color-blue-text: #2563EB;
            --color-green-bg: #ECFDF5;
            --color-green-text: #059669;
            --color-orange-bg: #FFF7ED;
            --color-orange-text: #EA580C;
            
            /* Spacing Grid (8px based) */
            --space-xs: 4px;
            --space-sm: 8px;
            --space-md: 16px;
            --space-lg: 24px;
            --space-xl: 32px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--color-bg-main);
            color: var(--color-text-body);
            min-height: 100vh;
        }

        /* Main Workspace Container */
        .main-container {
            margin: 0 auto;
            max-width: 1200px;
            width: 100%;
            padding: var(--space-xl);
            display: flex;
            flex-direction: column;
            gap: var(--space-xl);
        }

        /* Header System */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--color-border);
            padding-bottom: var(--space-md);
        }

        .header-title h1 {
            font-size: 32px;
            font-weight: 700;
            color: var(--color-text-title);
        }

        .header-title p {
            font-size: 14px;
            color: var(--color-text-muted);
            margin-top: 4px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
        }

        .notification-trigger {
            position: relative;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
            color: var(--color-text-title);
            transition: all 0.25s ease;
        }

        .notification-trigger:hover {
            background-color: var(--color-primary-light);
            color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .notification-trigger i {
            font-size: 22px;
        }

        .notification-badge {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #EF4444;
            border: 2px solid var(--color-bg-card);
        }

        /* Welcome Banner Card */
        .welcome-card {
            background: linear-gradient(135deg, #FFFDFB 0%, #FFF8F1 100%);
            border: 1px solid rgba(240, 138, 40, 0.15);
            border-radius: var(--border-radius-card);
            padding: var(--space-xl);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-lg);
            box-shadow: 0 4px 20px rgba(240, 138, 40, 0.03);
        }

        .welcome-info {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .welcome-info h2 {
            font-size: 24px;
            font-weight: 600;
            color: var(--color-text-title);
        }

        .welcome-info p {
            font-size: 14px;
            color: var(--color-text-body);
            line-height: 1.6;
            max-width: 600px;
        }

        .primary-btn {
            background-color: var(--color-primary);
            color: #FFFFFF;
            font-family: var(--font-family);
            font-size: 14px;
            font-weight: 500;
            padding: 12px 24px;
            border: none;
            border-radius: var(--border-radius-btn);
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 8px 16px rgba(240, 138, 40, 0.15);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: var(--space-sm);
            white-space: nowrap;
        }

        .primary-btn:hover {
            background-color: var(--color-primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(240, 138, 40, 0.25);
        }

        .primary-btn:active {
            transform: translateY(0);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-lg);
        }

        .stat-card {
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-card);
            padding: var(--space-lg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            transition: all 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border-color: var(--color-text-muted);
        }

        .stat-details {
            display: flex;
            flex-direction: column;
            gap: var(--space-xs);
        }

        .stat-label {
            font-size: 14px;
            color: var(--color-text-muted);
            font-weight: 500;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: var(--color-text-title);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon i {
            font-size: 28px;
        }

        /* Stat specific color maps */
        .stat-active .stat-icon {
            background-color: var(--color-blue-bg);
            color: var(--color-blue-text);
        }
        .stat-completed .stat-icon {
            background-color: var(--color-green-bg);
            color: var(--color-green-text);
        }
        .stat-total .stat-icon {
            background-color: var(--color-orange-bg);
            color: var(--color-orange-text);
        }

        /* Activities Section */
        .section-card {
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-card);
            padding: var(--space-lg);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-lg);
        }

        .section-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: var(--color-text-title);
        }

        .secondary-btn {
            background: none;
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-btn);
            padding: 8px 16px;
            font-family: var(--font-family);
            font-size: 13px;
            font-weight: 500;
            color: var(--color-text-body);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .secondary-btn:hover {
            background-color: var(--color-bg-main);
            color: var(--color-text-title);
            border-color: var(--color-text-muted);
        }

        /* Table & Data List */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .activities-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .activities-table th {
            padding: var(--space-md);
            font-size: 13px;
            font-weight: 600;
            color: var(--color-text-muted);
            border-bottom: 1px solid var(--color-border);
        }

        .activities-table td {
            padding: var(--space-md);
            font-size: 14px;
            color: var(--color-text-body);
            border-bottom: 1px solid var(--color-border);
            vertical-align: middle;
        }

        .activities-table tr:last-child td {
            border-bottom: none;
        }

        .activities-table tr:hover td {
            background-color: var(--color-bg-main);
        }

        /* Status Badges */
        .badge {
            display: inline-flex;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .badge.pending {
            background-color: #FEF3C7;
            color: #D97706;
        }

        .badge.accepted {
            background-color: #DBEAFE;
            color: #2563EB;
        }

        .badge.on_the_way {
            background-color: #E0F2FE;
            color: #0284C7;
        }

        .badge.diagnosis {
            background-color: #F3E8FF;
            color: #9333EA;
        }

        .badge.waiting_approval {
            background-color: #FFF7ED;
            color: #EA580C;
        }

        .badge.approved {
            background-color: #DCFCE7;
            color: #16A34A;
        }

        .badge.working {
            background-color: #D1FAE5;
            color: #059669;
        }

        .badge.payment {
            background-color: #CFFAFE;
            color: #0891B2;
        }

        .badge.completed {
            background-color: #DCFCE7;
            color: #15803D;
        }

        .badge.cancelled, .badge.rejected {
            background-color: #FEE2E2;
            color: #DC2626;
        }

        .view-detail-btn {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: var(--space-xs);
            transition: all 0.2s ease;
        }

        .view-detail-btn:hover {
            color: var(--color-primary-hover);
            text-decoration: underline;
        }

        .empty-activities {
            text-align: center;
            padding: var(--space-xl) 0;
            color: var(--color-text-muted);
        }

        .empty-activities i {
            font-size: 48px;
            margin-bottom: var(--space-sm);
            display: block;
        }

        /* Responsive Layout Rules */
        @media(max-width: 768px) {
            .main-container {
                padding: var(--space-md);
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .welcome-card {
                flex-direction: column;
                align-items: flex-start;
                padding: var(--space-lg);
            }

            .primary-btn {
                width: 100%;
                justify-content: center;
            }

            .header-title h1 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>

    <!-- MAIN CONTAINER -->
    <main class="main-container">
        <!-- HEADER -->
        <header class="header">
            <div class="header-title">
                <h1>Dashboard</h1>
                <p>Pantau pesanan dan aktivitas perbaikan perangkat Anda.</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('notifications.index') }}" class="notification-trigger">
                    <i class="bx bx-bell"></i>
                    @if(Auth::user() && Auth::user()->notifications()->where('is_read', false)->count() > 0)
                        <span class="notification-badge"></span>
                    @endif
                </a>
            </div>
        </header>

        <!-- WELCOME CARD -->
        <section class="welcome-card">
            <div class="welcome-info">
                <h2>Selamat Datang Kembali, {{ Auth::user()?->name ?? 'Pelanggan' }}!</h2>
                <p>Butuh perbaikan elektronik atau servis AC di rumah? Temukan teknisi andal terdekat dengan cepat dan mudah melalui Servio.</p>
            </div>
            <a href="{{ route('home') }}" class="primary-btn">
                <i class="bx bx-plus-circle"></i>
                Cari Layanan Baru
            </a>
        </section>

        <!-- STATS GRID -->
        <section class="stats-grid">
            <!-- Active Bookings -->
            <div class="stat-card stat-active">
                <div class="stat-details">
                    <span class="stat-label">Pesanan Aktif</span>
                    <span class="stat-number">{{ $activeBookingsCount }}</span>
                </div>
                <div class="stat-icon">
                    <i class="bx bx-refresh"></i>
                </div>
            </div>

            <!-- Completed Bookings -->
            <div class="stat-card stat-completed">
                <div class="stat-details">
                    <span class="stat-label">Selesai</span>
                    <span class="stat-number">{{ $completedBookingsCount }}</span>
                </div>
                <div class="stat-icon">
                    <i class="bx bx-check-circle"></i>
                </div>
            </div>

            <!-- Total Bookings -->
            <div class="stat-card stat-total">
                <div class="stat-details">
                    <span class="stat-label">Total Pesanan</span>
                    <span class="stat-number">{{ $totalBookings }}</span>
                </div>
                <div class="stat-icon">
                    <i class="bx bx-receipt"></i>
                </div>
            </div>
        </section>

        <!-- RECENT ACTIVITIES -->
        <section class="section-card">
            <div class="section-header">
                <h3>Aktivitas Terbaru</h3>
                <a href="{{ route('aktifitas') }}" class="secondary-btn">Lihat Semua</a>
            </div>

            <div class="table-responsive">
                @if($recentBookings->isEmpty())
                    <div class="empty-activities">
                        <i class="bx bx-package"></i>
                        <span>Belum ada pesanan terbaru. Mulai order pertama Anda sekarang!</span>
                    </div>
                @else
                    <table class="activities-table">
                        <thead>
                            <tr>
                                <th>ID Order</th>
                                <th>Kategori</th>
                                <th>Teknisi</th>
                                <th>Tanggal Booking</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentBookings as $booking)
                                @php
                                    $categoryName = $booking->subServices->first()?->providerService?->category?->name ?? 'Layanan';
                                @endphp
                                <tr>
                                    <td style="font-weight: 600; color: var(--color-primary);">#{{ $booking->formatted_id }}</td>
                                    <td>{{ $categoryName }}</td>
                                    <td>{{ $booking->provider?->name ?? 'Mencari Teknisi' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge {{ $booking->status }}">
                                            {{ str_replace('_', ' ', $booking->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('detail.aktifitas', $booking->id) }}" class="view-detail-btn">
                                            Detail <i class="bx bx-right-arrow-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </section>
    </main>

    <!-- Bottom navigation bar for mobile compatibility -->
    @include('user.navigation.navigation')

</body>
</html>
