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

/* =========================
   TAB BUTTON
========================= */

.tab-btn{
    border: none;
    text-decoration: none;
    background: #FFFFFF;

    padding: 14px 24px;

    border-radius: 16px;

    font-size: 15px;
    font-weight: 600;

    color: #6B7280;

    cursor: pointer;

    display: flex;
    align-items: center;
    gap: 12px;

    transition: 0.3s ease;

    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
}

/* ACTIVE */

.tab-btn.active{
    background: linear-gradient(
        135deg,
        #FFA63D,
        #FF8A00
    );

    color: white;

    box-shadow: 0 8px 20px rgba(255,138,0,0.18);
}

/* BADGE */

.tab-btn span{
    background: rgba(255,255,255,0.2);
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
}

/* HOVER */

.tab-btn:hover{
    transform: translateY(-2px);
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