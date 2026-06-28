<div class="layanan-tab-wrapper">

    <!-- LAYANAN AKTIF -->

    <button
        class="tab-btn active"
        data-tab="layananAktif"
    >

        <div class="tab-icon">

            <i class='bx bx-cog'></i>

        </div>

        <span class="tab-label">

            Layanan Aktif

        </span>

        @if($activeCount > 0)

            <span class="tab-badge">

                {{ $activeCount }}

            </span>

        @endif

    </button>

    <!-- PENGAJUAN -->

    <button
        class="tab-btn"
        data-tab="pengajuanLayanan"
    >

        <div class="tab-icon">

            <i class='bx bx-file'></i>

        </div>

        <span class="tab-label">

            Pengajuan Layanan

        </span>

        @if($requestCount > 0)

            <span class="tab-badge">

                {{ $requestCount }}

            </span>

        @endif

    </button>

</div>

<style>

/* =========================
   WRAPPER
========================= */

.layanan-tab-wrapper{

    display:flex;

    align-items:center;

    gap:16px;

    margin-top:40px;
    margin-bottom:30px;

}

/* =========================
   BUTTON
========================= */

.tab-btn{

    border:none;

    background:#FFFFFF;

    padding:16px 22px;

    border-radius:18px;

    display:flex;

    align-items:center;

    gap:12px;

    cursor:pointer;

    transition:.3s ease;

    color:#6B7280;

    font-size:15px;

    font-weight:700;

    box-shadow:
        0 4px 12px
        rgba(0,0,0,.05);

}

/* ICON */

.tab-icon{

    width:38px;
    height:38px;

    border-radius:12px;

    display:flex;

    align-items:center;
    justify-content:center;

    background:#FFF3E8;

    font-size:16px;

}

/* BADGE */

.tab-badge{

    min-width:28px;
    height:28px;

    border-radius:999px;

    display:flex;

    align-items:center;
    justify-content:center;

    background:#FFF3E8;

    color:#FF8A00;

    font-size:12px;

    font-weight:800;

    padding:0 8px;

}

/* ACTIVE */

.tab-btn.active{

    background:linear-gradient(
        135deg,
        #FFA63D,
        #FF8A00
    );

    color:white;

    box-shadow:
        0 12px 24px
        rgba(255,138,0,.25);

}

/* ACTIVE ICON */

.tab-btn.active .tab-icon{

    background:
        rgba(255,255,255,.18);

}

/* ACTIVE BADGE */

.tab-btn.active .tab-badge{

    background:
        rgba(255,255,255,.18);

    color:white;

}

/* HOVER */

.tab-btn:hover{

    transform:translateY(-2px);

}

/* RESPONSIVE */

@media(max-width:768px){

    .layanan-tab-wrapper{

        overflow-x:auto;

        width:100%;

        padding-bottom:6px;

    }

    .tab-btn{

        min-width:max-content;

    }

}

</style>