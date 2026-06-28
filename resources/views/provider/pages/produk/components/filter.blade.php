<form method="GET" action="/provider/produk" class="produk-filter-wrapper">

    <!-- SEARCH -->

    <div class="search-box">
        <input
            type="text"
            name="search"
            placeholder="Cari nama produk..."
            value="{{ request('search') }}"
        >

        <button type="submit">
            <i class='bx bx-search' style="color:#6b7280; font-size:18px;"></i>
        </button>
    </div>

    <!-- STOCK FILTER -->

    <div class="stock-filter">

        <select name="stok" onchange="this.form.submit()">

            <option value="">
                Filter Stok
            </option>

            <option value="aman" {{ request('stok') == 'aman' ? 'selected' : '' }}>
                Aman
            </option>

            <option value="menipis" {{ request('stok') == 'menipis' ? 'selected' : '' }}>
                Menipis
            </option>

            <option value="habis" {{ request('stok') == 'habis' ? 'selected' : '' }}>
                Habis
            </option>

        </select>

    </div>

</form>

<style>

/* =========================
    FILTER WRAPPER
========================== */

.produk-filter-wrapper{

    display:flex;
    justify-content:space-between;
    align-items:center;

    gap:18px;

    flex-wrap:wrap;

}

/* =========================
    SEARCH
========================== */

.search-box{

    flex:1;

    min-width:220px;

    max-width:260px;

    position:relative;

}

.search-box input{

    width:100%;

    height:44px;

    border:none;

    outline:none;

    border-radius:14px;

    padding:
    0 42px 0 14px;

    background:
    rgba(255,255,255,0.85);

    backdrop-filter:blur(12px);

    border:
    1px solid rgba(255,255,255,0.4);

    box-shadow:
    0 4px 12px rgba(15,23,42,0.04);

    font-size:12px;

    color:#111827;

}

.search-box input::placeholder{

    color:#9ca3af;

}

.search-box button{

    position:absolute;

    top:50%;
    right:12px;

    transform:translateY(-50%);

    border:none;

    background:none;

    font-size:15px;

    cursor:pointer;

    color:#9ca3af;

}



/* =========================
    CATEGORY FILTER
========================== */

.category-filter{

    display:flex;
    align-items:center;

    gap:10px;

    flex-wrap:wrap;

}

.filter-chip{

    border:none;

    padding:11px 18px;

    border-radius:999px;

    background:#f3f4f6;

    color:#6b7280;

    font-size:12px;
    font-weight:600;

    cursor:pointer;

    transition:0.3s ease;

}

.filter-chip:hover{

    background:#ffe7cc;

    color:#ff7a00;

}

.filter-chip.active{

    background:
    linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    box-shadow:
    0 6px 16px rgba(255,122,0,0.18);

}

/* =========================
    STOCK FILTER
========================== */

.stock-filter select{

    height:44px;

    border:none;

    outline:none;

    border-radius:14px;

    padding:
    0 38px 0 14px;

    background:
    rgba(255,255,255,0.85);

    backdrop-filter:blur(12px);

    border:
    1px solid rgba(255,255,255,0.4);

    box-shadow:
    0 4px 12px rgba(15,23,42,0.04);

    font-size:12px;
    font-weight:600;

    color:#4b5563;

    cursor:pointer;

    min-width:125px;

    appearance:none;
    -webkit-appearance:none;
    -moz-appearance:none;

    background-image:url("data:image/svg+xml;utf8,<svg fill='%236b7280' height='20' viewBox='0 0 20 20' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 7.5L10 12l4.5-4.5'/></svg>");

    background-repeat:no-repeat;

    background-position:right 12px center;

    background-size:14px;

}

/* =========================
    RESPONSIVE
========================== */

@media(max-width:992px){

    .produk-filter-wrapper{

        flex-direction:column;
        align-items:stretch;

    }

    .search-box{

        max-width:100%;

    }

}

</style>