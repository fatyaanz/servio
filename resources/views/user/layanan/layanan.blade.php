<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Layanan - Servio</title>
    
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
            
            /* Color Palette */
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

        /* Search Section */
        .search-container {
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-card);
            padding: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-md);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .search-wrapper {
            flex: 1;
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-wrapper i {
            position: absolute;
            left: var(--space-md);
            font-size: 22px;
            color: var(--color-text-muted);
        }

        .search-input {
            width: 100%;
            height: 50px;
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-input);
            padding: 0 var(--space-md) 0 50px;
            font-family: var(--font-family);
            font-size: 14px;
            color: var(--color-text-title);
            background-color: var(--color-bg-main);
            outline: none;
            transition: all 0.25s ease;
        }

        .search-input:focus {
            border-color: var(--color-primary);
            background-color: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(240, 138, 40, 0.15);
        }

        /* Horizontal Category Filter Bar */
        .category-filter-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .category-filter-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--color-text-title);
        }

        .category-filter-bar {
            display: flex;
            gap: var(--space-sm);
            overflow-x: auto;
            padding: var(--space-xs) 0;
            scrollbar-width: none; /* Hide default scrollbar for Firefox */
        }

        .category-filter-bar::-webkit-scrollbar {
            display: none; /* Hide default scrollbar for Chrome/Safari */
        }

        .filter-pill {
            padding: 10px 20px;
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: 999px;
            font-family: var(--font-family);
            font-size: 13px;
            font-weight: 600;
            color: var(--color-text-body);
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .filter-pill:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
            background-color: var(--color-primary-light);
        }

        .filter-pill.active {
            background-color: var(--color-primary);
            color: #FFFFFF;
            border-color: var(--color-primary);
            box-shadow: 0 4px 10px rgba(240, 138, 40, 0.2);
        }

        /* Provider/Services Grid */
        .provider-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-lg);
        }

        .provider-card {
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-card);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            transition: all 0.25s ease;
        }

        .provider-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
            border-color: var(--color-text-muted);
        }

        .provider-cover {
            height: 180px;
            background-color: var(--color-bg-main);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid var(--color-border);
        }

        .provider-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Verified & Distance badges */
        .badge-container {
            position: absolute;
            top: var(--space-md);
            left: var(--space-md);
            right: var(--space-md);
            display: flex;
            justify-content: space-between;
            align-items: center;
            pointer-events: none;
        }

        .provider-badge {
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-orange {
            background-color: var(--color-orange-bg);
            color: var(--color-orange-text);
            border: 1px solid rgba(234, 88, 12, 0.2);
        }

        .badge-distance {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            color: var(--color-text-title);
            border: 1px solid var(--color-border);
        }

        .provider-content {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
            flex: 1;
        }

        .provider-meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .provider-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--color-text-title);
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .provider-rating {
            display: flex;
            align-items: center;
            gap: var(--space-xs);
            font-size: 13px;
            font-weight: 700;
            color: var(--color-text-title);
        }

        .provider-rating i {
            color: #FACC15;
            font-size: 16px;
        }

        .provider-location {
            font-size: 13px;
            color: var(--color-text-muted);
            display: flex;
            align-items: center;
            gap: var(--space-xs);
        }

        .provider-location i {
            font-size: 16px;
        }

        .price-box {
            background-color: var(--color-bg-main);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-input);
            padding: var(--space-sm) var(--space-md);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price-box span {
            font-size: 12px;
            font-weight: 500;
            color: var(--color-text-muted);
        }

        .price-box strong {
            font-size: 16px;
            font-weight: 800;
            color: var(--color-primary);
        }

        .provider-features {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            font-size: 12px;
            color: var(--color-text-body);
        }

        .provider-features span {
            background-color: var(--color-primary-light);
            border: 1px solid rgba(240, 138, 40, 0.1);
            color: var(--color-primary);
            padding: 4px 10px;
            border-radius: 999px;
            font-weight: 500;
        }

        .provider-guarantee {
            font-size: 12px;
            color: var(--color-green-text);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: var(--space-xs);
            border-top: 1px solid var(--color-border);
            padding-top: var(--space-md);
        }

        .provider-guarantee i {
            font-size: 16px;
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
            box-shadow: 0 4px 12px rgba(240, 138, 40, 0.15);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-sm);
        }

        .primary-btn:hover {
            background-color: var(--color-primary-hover);
            box-shadow: 0 8px 16px rgba(240, 138, 40, 0.25);
        }

        .empty-providers {
            grid-column: 1 / -1;
            text-align: center;
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-card);
            padding: var(--space-xl) var(--space-lg);
            color: var(--color-text-muted);
        }

        .empty-providers i {
            font-size: 48px;
            margin-bottom: var(--space-sm);
            display: block;
        }

        /* Responsive Layout Rules */
        @media(max-width: 1024px) {
            .provider-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 768px) {
            .main-container {
                padding: var(--space-md);
            }

            .provider-grid {
                grid-template-columns: 1fr;
            }

            .header-title h1 {
                font-size: 26px;
            }
        }

        /* =========================
           FILTERS SECTION
        ========================== */
        .filters-container {
            background-color: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-card);
            padding: var(--space-md) var(--space-lg);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .filter-header h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--color-text-title);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filter-controls-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-lg);
            flex-wrap: wrap;
        }

        .sort-group {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .filter-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--color-text-body);
        }

        .sort-btn {
            padding: 8px 16px;
            background-color: var(--color-bg-main);
            border: 1px solid var(--color-border);
            border-radius: 999px;
            font-family: var(--font-family);
            font-size: 13px;
            font-weight: 600;
            color: var(--color-text-body);
            cursor: pointer;
            transition: all 0.25s ease;
            outline: none;
        }

        .sort-btn:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
            background-color: var(--color-primary-light);
        }

        .sort-btn.active {
            background-color: var(--color-primary);
            color: #FFFFFF;
            border-color: var(--color-primary);
            box-shadow: 0 4px 10px rgba(240, 138, 40, 0.2);
        }

        .price-filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .price-input-wrapper {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .price-input-wrapper input {
            width: 120px;
            height: 38px;
            border: 1px solid var(--color-border);
            border-radius: var(--border-radius-btn);
            padding: 0 var(--space-sm);
            font-family: var(--font-family);
            font-size: 13px;
            outline: none;
            background-color: var(--color-bg-main);
            transition: all 0.25s ease;
        }

        .price-input-wrapper input:focus {
            border-color: var(--color-primary);
            background-color: #FFFFFF;
        }

        .price-input-wrapper .divider {
            color: var(--color-text-muted);
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .filter-controls-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
                width: 100%;
            }
            .sort-group {
                width: 100%;
            }
            .price-filter-group {
                width: 100%;
                justify-content: space-between;
            }
            .price-input-wrapper input {
                width: 100px;
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
                <h1>Cari Layanan</h1>
                <p>Temukan penyedia jasa perbaikan elektronik dan servis rumah tangga terbaik.</p>
            </div>
        </header>

        <!-- SEARCH BAR CONTAINER -->
        <section class="search-container">
            <div class="search-wrapper">
                <i class="bx bx-search"></i>
                <input 
                    type="text" 
                    id="searchInput" 
                    class="search-input" 
                    placeholder="Cari nama penyedia jasa atau keahlian..."
                    onkeyup="applyFiltersAndSort()"
                >
            </div>
        </section>

        <!-- FILTERS CONTAINER -->
        <section class="filters-container">
            <div class="filter-header">
                <h3><i class="bx bx-slider-alt"></i> Filter & Urutkan</h3>
            </div>
            <div class="filter-controls-row">
                <!-- Sorting pills -->
                <div class="sort-group">
                    <span class="filter-label">Urutkan:</span>
                    <button type="button" class="sort-btn active" onclick="setSort('default', this)">Default</button>
                    <button type="button" class="sort-btn" onclick="setSort('rating', this)">⭐ Rating Tertinggi</button>
                    <button type="button" class="sort-btn" onclick="setSort('distance', this)">📍 Lokasi Terdekat</button>
                    <button type="button" class="sort-btn" onclick="setSort('price', this)">💵 Harga Termurah</button>
                </div>
                
                <!-- Price range filter inputs -->
                <div class="price-filter-group">
                    <span class="filter-label">Range Harga:</span>
                    <div class="price-input-wrapper">
                        <input type="number" id="minPriceInput" placeholder="Min (Rp)" oninput="applyFiltersAndSort()">
                        <span class="divider">-</span>
                        <input type="number" id="maxPriceInput" placeholder="Max (Rp)" oninput="applyFiltersAndSort()">
                    </div>
                </div>
            </div>
        </section>


        <!-- PROVIDER SERVICES GRID -->
        <section class="provider-grid" id="providerGrid">
            @forelse($providers as $providerService)
                @php
                    $provider = $providerService->provider;
                    $distance = Auth::check() ? Auth::user()->distanceTo($provider) : null;
                    $avgRating = $provider->providerReviews->avg('rating') ?: 5.0;
                    $minPrice = $providerService->subServices->min('price_min') ?: 0;
                    $maxPrice = $providerService->subServices->max('price_max') ?: 0;
                    $firstSubServices = $providerService->subServices->take(2);
                @endphp
                <div class="provider-card" 
                     data-name="{{ strtolower($provider->name) }}" 
                     data-desc="{{ strtolower($providerService->category->name) }}"
                     data-rating="{{ $avgRating }}"
                     data-distance="{{ $distance ?? 999999 }}"
                     data-min-price="{{ $minPrice }}"
                     data-max-price="{{ $maxPrice }}"
                     data-index="{{ $loop->index }}">
                    <div class="provider-cover">
                        <img 
                            src="{{ $provider->profile_photo ? asset('storage/' . $provider->profile_photo) : asset('assets/images/provider-logo.png') }}" 
                            alt="Provider Cover"
                        >
                        <div class="badge-container">
                            <span class="provider-badge badge-orange">
                                <i class="bx bx-badge-check"></i>
                                {{ $provider->experience ? $provider->experience . ' Thn' : 'Verified' }}
                            </span>
                            @if($distance !== null)
                                <span class="provider-badge badge-distance">
                                    <i class="bx bx-navigation"></i>
                                    {{ number_format($distance, 1) }} km
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="provider-content">
                        <div class="provider-meta-row">
                            <span class="provider-name">{{ $provider->name }}</span>
                            <span class="provider-rating">
                                <i class="bx bxs-star"></i>
                                {{ number_format($avgRating, 1) }}
                            </span>
                        </div>

                        <div class="provider-location" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <div style="display: flex; align-items: center; gap: var(--space-xs);">
                                <i class="bx bx-map"></i>
                                <span>{{ $provider->city ?: ($provider->address ?: 'Bandung') }}</span>
                            </div>
                            @if($distance !== null)
                                <span style="font-size: 12px; font-weight: 600; color: var(--color-primary); display: flex; align-items: center; gap: 2px;">
                                    📍 {{ number_format($distance, 1) }} km
                                </span>
                            @endif
                        </div>

                        <div class="provider-features">
                            @foreach($firstSubServices as $sub)
                                <span>{{ $sub->name }}</span>
                            @endforeach
                            @if($providerService->subServices->count() > 2)
                                <span style="background-color: var(--color-border); color: var(--color-text-body);">
                                    +{{ $providerService->subServices->count() - 2 }} Lainnya
                                </span>
                            @endif
                        </div>

                        <div class="price-box">
                            <span>Estimasi Biaya</span>
                            <strong>
                                @if($minPrice > 0)
                                    @if($minPrice === $maxPrice)
                                        Rp{{ number_format($minPrice, 0, ',', '.') }}
                                    @else
                                        Rp{{ number_format($minPrice, 0, ',', '.') }} - Rp{{ number_format($maxPrice, 0, ',', '.') }}
                                    @endif
                                @else
                                    Hubungi Jasa
                                @endif
                            </strong>
                        </div>

                        <div class="provider-guarantee">
                            <i class="bx bx-shield-quarter"></i>
                            <span>Garansi Layanan: {{ $provider->warranty ?? 'Tersedia' }}</span>
                        </div>

                        <a href="{{ route('provider.detail', $provider->id) }}" class="primary-btn">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div class="empty-providers">
                    <i class="bx bx-wrench"></i>
                    <span>Belum ada penyedia layanan aktif untuk kategori ini.</span>
                </div>
            @endforelse

            <!-- Dynamic filter empty state -->
            <div class="empty-providers" id="noFilterMatch" style="display: none; grid-column: 1 / -1; width: 100%;">
                <i class="bx bx-search"></i>
                <span>Tidak ada penyedia layanan yang cocok dengan filter harga/pencarian Anda.</span>
            </div>
        </section>
    </main>

    <!-- Bottom navigation bar for mobile compatibility -->
    @include('user.navigation.navigation')

    <!-- Search & Filter Client-Side script -->
    <script>
        let currentSort = 'default';

        function setSort(sortType, btn) {
            document.querySelectorAll('.sort-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentSort = sortType;
            applyFiltersAndSort();
        }

        function applyFiltersAndSort() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const minPrice = parseFloat(document.getElementById('minPriceInput').value) || 0;
            const maxPrice = parseFloat(document.getElementById('maxPriceInput').value) || Infinity;
            
            const grid = document.getElementById('providerGrid');
            const cards = Array.from(document.querySelectorAll('.provider-card'));
            
            let visibleCards = [];
            
            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                const desc = card.getAttribute('data-desc');
                const cardMinPrice = parseFloat(card.getAttribute('data-min-price')) || 0;
                
                const matchesSearch = name.includes(query) || desc.includes(query);
                const matchesPrice = cardMinPrice >= minPrice && cardMinPrice <= maxPrice;
                
                if (matchesSearch && matchesPrice) {
                    card.style.display = 'flex';
                    visibleCards.push(card);
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Sort visible cards
            if (currentSort === 'rating') {
                visibleCards.sort((a, b) => {
                    return parseFloat(b.getAttribute('data-rating')) - parseFloat(a.getAttribute('data-rating'));
                });
            } else if (currentSort === 'distance') {
                visibleCards.sort((a, b) => {
                    return parseFloat(a.getAttribute('data-distance')) - parseFloat(b.getAttribute('data-distance'));
                });
            } else if (currentSort === 'price') {
                visibleCards.sort((a, b) => {
                    return parseFloat(a.getAttribute('data-min-price')) - parseFloat(b.getAttribute('data-min-price'));
                });
            } else {
                // Default order (original DOM order by index)
                visibleCards.sort((a, b) => {
                    return parseInt(a.getAttribute('data-index')) - parseInt(b.getAttribute('data-index'));
                });
            }
            
            // Re-append to grid in sorted order
            visibleCards.forEach(card => grid.appendChild(card));
            
            // Handle empty matched state
            const emptyEl = document.getElementById('noFilterMatch');
            if (emptyEl) {
                if (visibleCards.length === 0) {
                    emptyEl.style.display = 'block';
                } else {
                    emptyEl.style.display = 'none';
                }
            }
        }
    </script>

</body>
</html>