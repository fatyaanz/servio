<div class="tab-navigation">

    <a
        href="{{ route('provider.pesanan') }}"
        class="tab-link {{ request()->routeIs('provider.pesanan') ? 'active' : '' }}"
    >
        <span>Pesanan Aktif</span>
        <span class="tab-count">
    {{ $activeCount ?? 0 }}
</span>
    </a>

    <a
        href="{{ route('provider.pesanan.riwayat') }}"
        class="tab-link {{ request()->routeIs('provider.pesanan.riwayat') ? 'active' : '' }}"
    >
        Riwayat
       
    </a>

</div>

<style>

/* =========================
   TAB CONTAINER
========================= */

.tab-navigation{

    display:flex;

    gap:10px;

    margin:20px;

    padding:6px;

    background:#F8FAFC;

    border-radius:18px;
}

/* =========================
   TAB ITEM
========================= */

.tab-link{

    flex:1;

    text-align:center;

    text-decoration:none;

    padding:14px 18px;

    border-radius:14px;

    color:#777;

    font-size:15px;

    font-weight:600;

    transition:.3s ease;
}

/* ACTIVE */

.tab-link.active{

    background:rgb(247, 153, 46);

    color:#fefefe;

    box-shadow:
        0 4px 12px rgba(0,0,0,.06);
}

/* HOVER */

.tab-link:hover{

    color:#000000;
}

/* MOBILE */

@media(max-width:768px){

    .tab-navigation{

        margin:15px;
    }

    .tab-link{

        font-size:14px;

        padding:12px;
    }

}

</style>