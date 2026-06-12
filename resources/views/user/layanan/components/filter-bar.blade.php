<div class="filter-wrapper">

    <div class="filter-info">

        <span class="result-count">
            👨‍🔧 {{ count($providers) }} Penyedia Ditemukan
        </span>

    </div>

    <div class="filter-section">

        <button class="filter-btn active">
            ✨ Semua
        </button>

        <button class="filter-btn">
            ⭐ Rating Tertinggi
        </button>

        <button class="filter-btn">
            💰 Paling Murah
        </button>

        <button class="filter-btn">
            📍 Terdekat
        </button>

    </div>

</div>

<style>

/* =========================
   WRAPPER
========================= */

.filter-wrapper{

    position:sticky;

    top:15px;

    z-index:100;

    max-width:1400px;

    margin:0 auto 25px;

    padding:0 30px;

}

/* =========================
   INFO
========================= */

.filter-info{

    margin-bottom:12px;

}

.result-count{

    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:8px 14px;

    border-radius:999px;

    background:#FFF4E8;

    color:#FF8A00;

    font-size:13px;

    font-weight:700;

}

/* =========================
   FILTER CONTAINER
========================= */

.filter-section{

    display:flex;

    align-items:center;

    gap:12px;

    overflow-x:auto;

    scrollbar-width:none;

    -webkit-overflow-scrolling:touch;

    padding:8px;

    border-radius:24px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.6);

    box-shadow:
    0 10px 25px rgba(0,0,0,.05);

}

.filter-section::-webkit-scrollbar{
    display:none;
}

/* =========================
   BUTTON
========================= */

.filter-btn{

    flex-shrink:0;

    border:none;

    background:white;

    color:#64748B;

    padding:12px 20px;

    border-radius:999px;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.25s ease;

    border:1px solid #E5E7EB;

}

/* HOVER */

.filter-btn:hover{

    transform:translateY(-2px);

    border-color:#FF8A00;

    color:#FF8A00;

}

/* ACTIVE */

.filter-btn.active{

    background:linear-gradient(
        135deg,
        #FFA63D,
        #FF8A00
    );

    color:white;

    border:none;

    box-shadow:
    0 8px 20px rgba(255,138,0,.20);

}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .filter-wrapper{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .filter-wrapper{
        padding:0 15px;
    }

    .filter-btn{

        padding:11px 16px;

        font-size:13px;

    }

    .result-count{

        font-size:12px;

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