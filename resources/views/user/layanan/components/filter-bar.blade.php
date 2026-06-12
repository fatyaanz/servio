<div class="filter-section">

    <button class="filter-btn active">
        Semua
    </button>

    <button class="filter-btn">
        Rating Tertinggi
    </button>

    <button class="filter-btn">
        Paling Murah
    </button>

    <button class="filter-btn">
        Terdekat
    </button>

</div>

<style>

/* =========================
   FILTER SECTION
========================= */

.filter-section{

    max-width:1400px;

    margin:0 auto 25px;

    padding:10px 30px;

    display:flex;
    align-items:center;

    gap:14px;

    overflow-x:auto;
    overflow-y:visible;

    scrollbar-width:none;

    -webkit-overflow-scrolling:touch;
}

.filter-section::-webkit-scrollbar{
    display:none;
}

/* =========================
   FILTER BUTTON
========================= */

.filter-btn{

    flex-shrink:0;

    border:none;

    background:#ffffff;

    color:#D98A3A;

    padding:14px 26px;

    border-radius:999px;

    font-size:15px;
    font-weight:700;

    white-space:nowrap;

    cursor:pointer;

    border:1px solid rgba(240,138,40,.18);

    box-shadow:
        0 5px 15px rgba(0,0,0,.04);

    transition:all .3s ease;
}

.filter-btn:hover{

    transform:translateY(-2px);

    border-color:#F08A28;

    color:#F08A28;
}

.filter-btn.active{

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB04D
    );

    color:white;

    border:none;

    box-shadow:
        0 10px 25px rgba(240,138,40,.25);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .filter-section{
        padding:10px 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .filter-section{

        padding:10px 15px;

        gap:10px;
    }

    .filter-btn{

        padding:12px 22px;

        font-size:14px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .filter-btn{

        padding:11px 18px;

        font-size:13px;
    }

}

</style>

<script>

document.querySelectorAll('.filter-btn').forEach(btn => {

    btn.addEventListener('click', function(){

        document.querySelectorAll('.filter-btn')
            .forEach(item => item.classList.remove('active'));

        this.classList.add('active');

    });

});

</script>