<div class="layanan-tab-wrapper">

    <!-- AKTIF -->

    <a
        href="{{ url('/admin/providers?status=approved') }}"
        class="tab-btn
        {{ request('status') == 'approved'
            || request('status') == null
            ? 'active'
            : '' }}"
    >
        <i class='bx bx-check-circle'></i>
        Penyedia Aktif

        <span>
            {{ $activeCount }}
        </span>

    </a>

    <!-- PENDING -->

    <a
        href="{{ url('/admin/providers?status=pending') }}"
        class="tab-btn
        {{ request('status') == 'pending'
            ? 'active'
            : '' }}"
    >
        <i class='bx bx-time-five'></i>
        Pending

        <span>
            {{ $pendingCount }}
        </span>

    </a>

</div>

<style>

/* =========================
   TAB WRAPPER
========================= */

.layanan-tab-wrapper{
    display: flex;
    align-items: center;
    gap: 16px;

    margin-top: 20px;
    margin-bottom: 28px;

    position: relative;
    z-index: 1;
}
.tab-btn i{
    font-size:18px;
}

/* =========================
   TAB BUTTON
========================= */

.tab-btn{
    border: none;
    text-decoration: none;
    background:white;

    padding: 14px 24px;

    border-radius: 14px;

    font-size: 15px;
    font-weight: 600;

    color: #6B7280;

    cursor: pointer;

    display: flex;
    align-items: center;
    gap: 12px;

    transition: 0.3s ease;

    border:1px solid var(--border);
    box-shadow:none;
}

/* ACTIVE */

.tab-btn.active{
    background:linear-gradient(
    135deg,
    var(--primary),
    #ffb347
);

    color: white;

    box-shadow: 0 8px 20px rgba(255,138,0,0.18);
}

/* BADGE */

.tab-btn span{

    padding:4px 10px;

    border-radius:999px;

    font-size:12px;
    font-weight:600;

    background:#FFF4E6;

    color:var(--primary);
}

/* HOVER */

.tab-btn:hover{

    transform:translateY(-2px);

    border-color:var(--primary);
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width: 768px){

    .layanan-tab-wrapper{
        width: 100%;
        overflow-x: auto;
        padding-bottom: 4px;
    }

    .tab-btn{
        min-width: max-content;
    }

}

</style>