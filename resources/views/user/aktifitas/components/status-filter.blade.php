<div class="status-filter">

    <button class="status-chip active">
        Semua
    </button>

    <button class="status-chip">
        Menunggu Konfirmasi
    </button>

    <button class="status-chip">
        Sedang Dikerjakan
    </button>

</div>

<style>

.status-filter{

    display:flex;

    gap:10px;

    overflow-x:auto;

    padding:0 20px 20px;
}

.status-chip{

    border:none;

    padding:10px 18px;

    border-radius:999px;

    background:#F3F3F3;

    color:#666;

    white-space:nowrap;

    cursor:pointer;
}

.status-chip.active{

    background:#F08A28;

    color:white;
}

</style>