<div class="search-container">

    <div class="search-box">

        <i class='bx bx-search search-icon'></i>

        <input
            type="text"
            placeholder="Cari layanan atau jelaskan masalah Anda..."
        >

    </div>

</div>

<style>

/* =========================
   SEARCH
========================= */

.search-container{

    margin-bottom:24px;

}

/* =========================
   SEARCH BOX
========================= */

.search-box{

    display:flex;

    align-items:center;

    gap:12px;

    height:56px;

    padding:0 18px;

    background:white;

    border:1px solid var(--border);

    border-radius:16px;

    box-shadow:var(--shadow-sm);

    transition:.3s;

}

.search-box:focus-within{

    border-color:var(--primary);

}

/* =========================
   ICON
========================= */

.search-icon{

    font-size:20px;

    color:var(--text-secondary);

    flex-shrink:0;

}

/* =========================
   INPUT
========================= */

.search-box input{

    flex:1;

    border:none;

    outline:none;

    background:transparent;

    font-size:14px;

    color:var(--text-dark);

}

.search-box input::placeholder{

    color:var(--text-secondary);

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .search-box{

        height:52px;

        padding:0 16px;

    }

}

</style>