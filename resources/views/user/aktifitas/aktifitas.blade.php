<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitas - Servio</title>
    <meta name="description" content="Pantau pesanan dan aktivitas perbaikan perangkat Anda di Servio.">

    <link rel="stylesheet" href="{{ asset('css/servio-design-system.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    @include('user.navigation.navigation')

    @include('user.aktifitas.components.header')

    @include('user.aktifitas.components.tab-navigation')

    <!-- SEKSI AKTIF -->
    <div id="aktif-section" class="tab-content-section" style="display: {{ $activeTab === 'aktif' ? 'block' : 'none' }};">
        @if($activeBookings->isEmpty())
            <div class="empty-state">
                <div class="empty-icon"><i class='bx bx-package' style="font-size:56px; color:#9CA3AF;"></i></div>
                <h2>Belum Ada Aktivitas</h2>
                <p>Kamu belum memiliki pesanan atau aktivitas aktif saat ini.</p>
            </div>
        @else
            @include('user.aktifitas.components.activity-card', ['bookings' => $activeBookings])
        @endif
    </div>

    <!-- SEKSI RIWAYAT -->
    <div id="riwayat-section" class="tab-content-section" style="display: {{ $activeTab === 'riwayat' ? 'block' : 'none' }};">
        <!-- Sub Filter Bar -->
        <div class="sub-filters">
            <button type="button" class="filter-btn active" onclick="filterHistory('all', this)">Semua</button>
            <button type="button" class="filter-btn" onclick="filterHistory('completed', this)">Selesai</button>
            <button type="button" class="filter-btn" onclick="filterHistory('rejected', this)">Reject</button>
        </div>

        @if($historyBookings->isEmpty())
            <div class="empty-state">
                <div class="empty-icon"><i class='bx bx-folder-open' style="font-size:56px; color:#9CA3AF;"></i></div>
                <h2>Belum Ada Riwayat</h2>
                <p>Pesanan yang selesai atau dibatalkan akan muncul di sini.</p>
            </div>
        @else
            <div id="history-cards-container">
                @include('user.aktifitas.components.history-card', ['bookings' => $historyBookings])
            </div>
            
            <div class="empty-state" id="no-history-match" style="display: none;">
                <div class="empty-icon"><i class='bx bx-search-alt' style="font-size:56px; color:#9CA3AF;"></i></div>
                <h2>Tidak Ada Riwayat</h2>
                <p>Tidak ada riwayat pemesanan yang sesuai dengan filter ini.</p>
            </div>
        @endif
    </div>

</body>
</html>

<script>
    function switchTab(tab) {
        document.querySelectorAll('.activity-tabs .tab-btn').forEach(btn => btn.classList.remove('active'));
        const activeBtn = document.getElementById('tab-btn-' + tab);
        if (activeBtn) activeBtn.classList.add('active');

        document.getElementById('aktif-section').style.display = tab === 'aktif' ? 'block' : 'none';
        document.getElementById('riwayat-section').style.display = tab === 'riwayat' ? 'block' : 'none';

        const url = new URL(window.location);
        url.searchParams.set('tab', tab);
        window.history.replaceState({}, '', url);
    }

    function filterHistory(filter, btn) {
        const buttons = document.querySelectorAll('.sub-filters .filter-btn');
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const rows = document.querySelectorAll('.history-card-item');
        let matchCount = 0;

        rows.forEach(row => {
            if (row.classList.contains('empty-card')) return;

            const status = row.getAttribute('data-status');
            if (filter === 'all' || status === filter) {
                row.style.display = 'block';
                matchCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const noMatchState = document.getElementById('no-history-match');
        if (noMatchState) {
            if (matchCount === 0) {
                noMatchState.style.display = 'block';
            } else {
                noMatchState.style.display = 'none';
            }
        }
    }

    window.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab');
        if (tabParam === 'riwayat' || tabParam === 'aktif') {
            switchTab(tabParam);
        }
    });
</script>

<style>

.empty-state{

    background:var(--white);

    margin:16px;

    padding:60px 24px;

    border-radius:16px;

    text-align:center;

    border:1px solid var(--border);

    box-shadow:var(--shadow-sm);
}

.empty-icon{
    margin-bottom:16px;
}

.empty-state h2{
    color:#000;
    font-size:18px;
    font-weight:700;
    margin-bottom:8px;
}

.empty-state p{
    color:#626B7A;
    font-size:14px;
    line-height:1.6;
    max-width:400px;
    margin:auto;
}

/* =========================
   SUB FILTERS STYLE
========================= */
.sub-filters {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin: 0 auto 20px;
    max-width: 500px;
    padding: 0 16px;
}
.filter-btn {
    flex: 1;
    padding: 10px 18px;
    border: 1px solid var(--border);
    background: var(--white);
    color: #626B7A;
    font-size: 13px;
    font-weight: 600;
    border-radius: 999px;
    cursor: pointer;
    transition: var(--transition);
    text-align: center;
    font-family: inherit;
    outline: none;
}
.filter-btn:hover {
    background: var(--primary-light);
    color: var(--primary);
    border-color: var(--primary);
}
.filter-btn.active {
    background: var(--primary);
    color: #FFFFFF;
    border-color: var(--primary);
    box-shadow: 0 4px 12px var(--primary-glow);
}

@media(max-width:768px){

    .empty-state{
        margin:12px;
        padding:48px 16px;
    }

    .empty-state h2{
        font-size:16px;
    }

    .sub-filters {
        margin: 0 12px 16px;
        gap: 6px;
    }
    .filter-btn {
        padding: 8px 12px;
        font-size: 12px;
    }

}

</style>