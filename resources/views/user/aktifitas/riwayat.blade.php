<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Servio</title>
    
    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Boxicons for clean modern vector icons (NO EMOJIS) -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        /* CSS variables for Design System Tokens */
        :root {
            --font-family: 'Poppins', sans-serif;
            --border-radius-btn: 8px;
            --border-radius-input: 8px;
            --border-radius-card: 16px;
            --border-radius-sidebar: 24px;
            
            /* Color Palette */
            --color-primary: #F08A28;
            --color-primary-hover: #D9771E;
            --color-primary-light: #FFF8F1;
            --color-bg-main: #FAFAFC;
            --color-bg-card: #FFFFFF;
            --color-text-title: #1F2937;
            --color-text-body: #4B5563;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            
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

        /* Filter Tab Bar */
        .tabs-container {
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-card);
            padding: 8px;
            display: flex;
            gap: var(--space-sm);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            overflow-x: auto;
            scrollbar-width: none;
        }

        .tabs-container::-webkit-scrollbar {
            display: none;
        }

        .tab-btn {
            padding: 12px 24px;
            border: none;
            background: none;
            font-family: var(--font-family);
            font-size: 14px;
            font-weight: 600;
            color: var(--color-text-body);
            border-radius: var(--border-radius-btn);
            cursor: pointer;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .tab-btn:hover {
            background-color: var(--color-bg-main);
            color: var(--color-primary);
        }

        .tab-btn.active {
            background-color: var(--color-primary-light);
            color: var(--color-primary);
            box-shadow: inset 0 0 0 1px rgba(240, 138, 40, 0.2);
        }

        /* History Table Container */
        .history-card {
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-card);
            padding: var(--space-lg);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .history-table th {
            padding: var(--space-md);
            font-size: 13px;
            font-weight: 600;
            color: var(--color-text-muted);
            border-bottom: 1px solid var(--color-border);
            white-space: nowrap;
        }

        .history-table td {
            padding: var(--space-md);
            font-size: 14px;
            color: var(--color-text-body);
            border-bottom: 1px solid var(--color-border);
            vertical-align: middle;
            white-space: nowrap;
        }

        .history-table tr:last-child td {
            border-bottom: none;
        }

        .history-table tr:hover td {
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

        /* Action Link */
        .secondary-btn {
            background-color: #FFFFFF;
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
            display: inline-flex;
            align-items: center;
            gap: var(--space-xs);
        }

        .secondary-btn:hover {
            background-color: var(--color-bg-main);
            color: var(--color-text-title);
            border-color: var(--color-text-muted);
        }

        .empty-history {
            text-align: center;
            padding: var(--space-xl) 0;
            color: var(--color-text-muted);
        }

        .empty-history i {
            font-size: 56px;
            margin-bottom: var(--space-sm);
            display: block;
        }

        /* Responsive Layout Rules */
        @media(max-width: 768px) {
            .main-container {
                padding: var(--space-md);
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
                <h1>Riwayat Pesanan</h1>
                <p>Kelola dan pantau seluruh transaksi pemesanan servis Anda.</p>
            </div>
        </header>

        <!-- TABS FILTER CONTAINER -->
        <section class="tabs-container">
            <button class="tab-btn active" onclick="filterHistory('all', this)">Semua</button>
            <button class="tab-btn" onclick="filterHistory('active', this)">Aktif</button>
            <button class="tab-btn" onclick="filterHistory('completed', this)">Selesai</button>
            <button class="tab-btn" onclick="filterHistory('cancelled', this)">Dibatalkan</button>
        </section>

        <!-- TABLE SECTION -->
        <section class="history-card">
            <div class="table-responsive">
                @if($bookings->isEmpty())
                    <div class="empty-history" id="emptyState">
                        <i class="bx bx-history"></i>
                        <span>Belum ada riwayat pesanan.</span>
                    </div>
                @else
                    <table class="history-table" id="historyTable">
                        <thead>
                            <tr>
                                <th>ID Order</th>
                                <th>Kategori</th>
                                <th>Teknisi</th>
                                <th>Tanggal Booking</th>
                                <th>Estimasi Biaya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                @php
                                    $categoryName = $booking->subServices->first()?->providerService?->category?->name ?? 'Layanan';
                                    $minPrice = $booking->subServices->sum('price_min');
                                    $maxPrice = $booking->subServices->sum('price_max');
                                    
                                    // Map groups
                                    if ($booking->status == 'completed') {
                                        $group = 'completed';
                                    } elseif (in_array($booking->status, ['cancelled', 'rejected'])) {
                                        $group = 'cancelled';
                                    } else {
                                        $group = 'active';
                                    }
                                @endphp
                                <tr class="history-row" data-group="{{ $group }}">
                                    <td style="font-weight: 600; color: var(--color-primary);">#{{ $booking->formatted_id }}</td>
                                    <td>{{ $categoryName }}</td>
                                    <td>{{ $booking->provider?->name ?? 'Mencari Teknisi' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                    <td>
                                        @if($minPrice > 0)
                                            Rp{{ number_format($minPrice, 0, ',', '.') }} - Rp{{ number_format($maxPrice, 0, ',', '.') }}
                                        @else
                                            Hubungi Teknisi
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ $booking->status }}">
                                            {{ str_replace('_', ' ', $booking->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('detail.aktifitas', $booking->id) }}" class="secondary-btn">
                                            Lihat Detail
                                            <i class="bx bx-right-arrow-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="empty-history" id="noMatchState" style="display: none;">
                        <i class="bx bx-search"></i>
                        <span>Tidak ada pesanan untuk kategori filter ini.</span>
                    </div>
                @endif
            </div>
        </section>
    </main>

    <!-- Bottom navigation bar for mobile compatibility -->
    @include('user.navigation.navigation')

    <!-- Interactive Filtering Script -->
    <script>
        function filterHistory(filter, btn) {
            // Manage Active Tab highlight
            const tabs = document.querySelectorAll('.tab-btn');
            tabs.forEach(tab => tab.classList.remove('active'));
            btn.classList.add('active');

            const rows = document.querySelectorAll('.history-row');
            let matchCount = 0;

            rows.forEach(row => {
                const group = row.getAttribute('data-group');
                if (filter === 'all' || group === filter) {
                    row.style.display = 'table-row';
                    matchCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Handle empty matched state
            const table = document.getElementById('historyTable');
            const noMatchState = document.getElementById('noMatchState');
            if (table) {
                if (matchCount === 0) {
                    table.style.display = 'none';
                    noMatchState.style.display = 'block';
                } else {
                    table.style.display = 'table';
                    noMatchState.style.display = 'none';
                }
            }
        }
    </script>

</body>
</html>