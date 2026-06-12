<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-icon orange">
            <i class='bx bx-group'></i>
        </div>

        <div class="stat-info">
            <span class="stat-title">Total Penyedia</span>
            <h2>{{ $totalProviders }}</h2>
            <small>Semua penyedia terdaftar</small>
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon yellow">
            <i class='bx bx-time-five'></i>
        </div>

        <div class="stat-info">
            <span class="stat-title">Menunggu Verifikasi</span>
            <h2>{{ $pendingCount }}</h2>
            <small>Perlu tindakan verifikasi</small>
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon green">
            <i class='bx bx-check-circle'></i>
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
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin:24px 0;
}

.stat-card{

    position:relative;

    display:flex;
    align-items:center;
    gap:16px;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:20px;

    box-shadow:var(--shadow-sm);

    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-3px);
}

.stat-icon{

    width:56px;
    height:56px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:16px;

    font-size:24px;

    flex-shrink:0;

    color:var(--primary);

    background:#FFF4E6;
}

.stat-content{
    flex:1;
}

.stat-title{
    display:block;

    font-size:13px;

    color:var(--text-secondary);

    margin-bottom:4px;
}

.stat-content h2{

    font-size:28px;

    font-weight:700;

    color:var(--text-dark);

    margin:0;
}

.stat-content small{

    color:var(--text-secondary);

    font-size:12px;
}

@media(max-width:992px){

    .stats-grid{
        grid-template-columns:1fr;
    }

}
</style>