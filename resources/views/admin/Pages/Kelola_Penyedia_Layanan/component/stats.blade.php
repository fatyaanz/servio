<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-icon orange">
            👥
        </div>

        <div class="stat-info">
            <span class="stat-title">Total Penyedia</span>
            <h2>{{ $totalProviders }}</h2>
            <small>Semua penyedia terdaftar</small>
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon yellow">
            ⏱
        </div>

        <div class="stat-info">
            <span class="stat-title">Menunggu Verifikasi</span>
            <h2>{{ $pendingCount }}</h2>
            <small>Perlu tindakan verifikasi</small>
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon green">
            ✓
        </div>

        <div class="stat-info">
            <span class="stat-title">Aktif</span>
            <h2>{{ $activeCount }}</h2>
            <small>Penyedia aktif</small>
        </div>

    </div>

</div>


<style>


.stats-grid{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 18px;
    margin-top: 20px;
}

.stat-card{
    display: flex;
    align-items: center;
    gap: 14px;

    background: #fff;
    border-radius: 14px;
    padding: 18px;

    border: 1px solid #f1f1f1;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);

    transition: 0.2s ease;
}

.stat-card:hover{
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.stat-icon{
    width: 52px;
    height: 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;
    font-size: 22px;
    flex-shrink: 0;
}

.orange{
    background: #fff3e8;
}

.yellow{
    background: #fff8db;
}

.green{
    background: #eafaf0;
}

.red{
    background: #ffecec;
}

.stat-info{
    display: flex;
    flex-direction: column;
}

.stat-title{
    font-size: 13px;
    font-weight: 600;
    color: #555;
    margin-bottom: 4px;
}

.stat-info h2{
    font-size: 28px;
    font-weight: 700;
    color: #111;
    margin: 0;
    line-height: 1.1;
}

.stat-info small{
    font-size: 12px;
    color: #888;
    margin-top: 4px;
}
</style>