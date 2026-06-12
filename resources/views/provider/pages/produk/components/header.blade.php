<div class="produk-header">

    <!-- LEFT -->

    <div class="produk-header-left">

        <h1>
            Produk / barang kamu
        </h1>

        <p>
            Kelola produk atau barang yang anda miliki
        </p>

    </div>

    <!-- RIGHT -->

    <div class="produk-header-right">

      <button 
            type="button"
            class="add-product-btn"
        >

            <span>
                ＋
            </span>

            Tambah Produk

        </button>

    </div>

</div>

<style>

/* =========================
    PRODUK HEADER
========================== */

.produk-header{

    position:fixed;

    top:20px;

    left:270px;

    width:calc(100% - 320px);

    z-index:999;

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:18px 24px;

    background:
    rgba(255,255,255,0.82);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border-radius:24px;

    border:
    1px solid rgba(255,255,255,0.4);

    box-shadow:
    0 10px 28px rgba(15,23,42,0.05);

}

/* =========================
    LEFT
========================== */

.produk-header-left h1{

    font-size:18px;
    font-weight:700;

    color:#111827;

    margin-bottom:4px;

    letter-spacing:-0.4px;

}

.produk-header-left p{

    font-size:12px;

    color:#6b7280;

    font-weight:500;

}

/* =========================
    RIGHT
========================== */

.add-product-btn{

    display:flex;
    align-items:center;
    justify-content:center;

    gap:8px;

    padding:13px 22px;

    border:none;
    outline:none;

    border-radius:16px;

    background:
    linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:13px;
    font-weight:700;

    cursor:pointer;

    box-shadow:
    0 10px 22px rgba(255,122,0,0.18);

    transition:0.3s ease;

}

.add-product-btn:hover{

    transform:translateY(-2px);

    box-shadow:
    0 14px 28px rgba(255,122,0,0.22);

}

.add-product-btn span{

    font-size:16px;
    font-weight:700;

}

/* =========================
    RESPONSIVE
========================== */

@media(max-width:992px){

    .produk-header{

        left:20px;

        width:calc(100% - 40px);

        padding:16px 18px;

    }

}

@media(max-width:576px){

    .produk-header{

        flex-direction:column;
        align-items:flex-start;

        gap:16px;

    }

    .add-product-btn{

        width:100%;

    }

}

</style>

<script>

    const addProductBtn = document.querySelector(".add-product-btn");
    const modalTambah = document.getElementById("modalTambah");

    addProductBtn.onclick = function () {

        console.log("BUTTON KEKLIK");

        modalTambah.classList.add("active");

    };

</script>