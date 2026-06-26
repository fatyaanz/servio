<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitas</title>
</head>
<body>

    @include('user.navigation.navigation')

    @include('user.aktifitas.components.header')

    @include('user.aktifitas.components.tab-navigation')

    <!-- SEKSI AKTIF -->
    <div id="aktif-section" class="tab-content-section" style="display: {{ $activeTab === 'aktif' ? 'block' : 'none' }};">
        @if($activeBookings->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">📦</div>
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
                <div class="empty-icon">📂</div>
                <h2>Belum Ada Riwayat</h2>
                <p>Pesanan yang selesai atau dibatalkan akan muncul di sini.</p>
            </div>
        @else
            <div id="history-cards-container">
                @include('user.aktifitas.components.history-card', ['bookings' => $historyBookings])
            </div>
            
            <div class="empty-state" id="no-history-match" style="display: none;">
                <div class="empty-icon">🔍</div>
                <h2>Tidak Ada Riwayat</h2>
                <p>Tidak ada riwayat pemesanan yang sesuai dengan filter ini.</p>
            </div>
        @endif
    </div>

</body>
</html>

<script>
    function switchTab(tab) {
        // Update active state on tab buttons
        document.querySelectorAll('.activity-tabs .tab-btn').forEach(btn => btn.classList.remove('active'));
        const activeBtn = document.getElementById('tab-btn-' + tab);
        if (activeBtn) activeBtn.classList.add('active');

        // Show corresponding section
        document.getElementById('aktif-section').style.display = tab === 'aktif' ? 'block' : 'none';
        document.getElementById('riwayat-section').style.display = tab === 'riwayat' ? 'block' : 'none';

        // Update URL without page reload
        const url = new URL(window.location);
        url.searchParams.set('tab', tab);
        window.history.replaceState({}, '', url);
    }

    function filterHistory(filter, btn) {
        // Manage Active Sub-Filter Button highlight
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

        // Handle empty matched state
        const noMatchState = document.getElementById('no-history-match');
        if (noMatchState) {
            if (matchCount === 0) {
                noMatchState.style.display = 'block';
            } else {
                noMatchState.style.display = 'none';
            }
        }
    }

    // Initialize state on load based on controller variable
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

    background:#fff;

    margin:20px;

    padding:80px 30px;

    border-radius:24px;

    text-align:center;

    border:1px solid #F1F5F9;

    box-shadow:
        0 4px 20px rgba(15,23,42,.05);

}

.empty-icon{

    font-size:72px;

    margin-bottom:20px;

}

.empty-state h2{

    color:#0F172A;

    font-size:28px;

    font-weight:700;

    margin-bottom:12px;

}

.empty-state p{

    color:#64748B;

    font-size:15px;

    line-height:1.8;

    max-width:450px;

    margin:auto;

}

/* =========================
   SUB FILTERS STYLE
========================= */
.sub-filters {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin: 0 auto 25px;
    max-width: 500px;
    padding: 0 15px;
}
.filter-btn {
    flex: 1;
    padding: 12px 20px;
    border: 1px solid #F3E8DB;
    background: #FFFFFF;
    color: #64748B;
    font-size: 14px;
    font-weight: 600;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    font-family: inherit;
    outline: none;
}
.filter-btn:hover {
    background: #FFF7EF;
    color: #F08A28;
    border-color: #F08A28;
}
.filter-btn.active {
    background: #F08A28;
    color: #FFFFFF;
    border-color: #F08A28;
    box-shadow: 0 4px 12px rgba(240, 138, 40, 0.2);
}

@media(max-width:768px){

    .empty-state{

        margin:15px;

        padding:60px 20px;

    }

    .empty-icon{

        font-size:56px;

    }

    .empty-state h2{

        font-size:22px;

    }

    .sub-filters {
        margin: 0 15px 20px;
        gap: 8px;
    }
    .filter-btn {
        padding: 10px 14px;
        font-size: 13px;
    }

}

</style>