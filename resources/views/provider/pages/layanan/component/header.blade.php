<div class="layanan-header">

    <div class="header-left">

        <div class="header-badge">

            <i class='bx bx-cog'></i> Layanan Provider

        </div>

        <h1>
            Kelola Layanan
        </h1>

        <p>
            Atur kategori layanan, kelola sub layanan, dan pantau status pengajuan Anda.
        </p>

    </div>

    <div class="header-right">

        <button
            class="add-service-btn"
            onclick="
                document
                .getElementById('tambahModal')
                .classList.add('active')
            "
        >

            <span>+</span>

            Ajukan Kategori

        </button>

    </div>

</div>

<style>

/* =========================
   HEADER
========================= */

.layanan-header{

    width:100%;

    display:flex;

    justify-content:space-between;
    align-items:flex-end;

    gap:20px;

    margin-bottom:20px;

}

/* LEFT */

.header-left{

    max-width:650px;

}

/* BADGE */

.header-badge{

    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:10px 16px;

    background:#FFF3E8;

    color:#FF8A00;

    border-radius:999px;

    font-size:13px;

    font-weight:700;

    margin-bottom:18px;

}

/* TITLE */

.header-left h1{

    font-size:48px;

    font-weight:800;

    color:#111827;

    line-height:1.1;

    margin-bottom:10px;

}

/* DESC */

.header-left p{

    font-size:16px;

    color:#6B7280;

    line-height:1.8;

}

/* BUTTON */

.add-service-btn{

    border:none;

    background:linear-gradient(
        135deg,
        #FFA63D,
        #FF8A00
    );

    color:white;

    padding:16px 24px;

    border-radius:18px;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    display:flex;

    align-items:center;

    gap:10px;

    box-shadow:
        0 12px 24px
        rgba(255,138,0,.25);

    transition:.3s ease;

}

.add-service-btn span{

    font-size:18px;

    font-weight:800;

}

.add-service-btn:hover{

    transform:translateY(-3px);

}

/* RESPONSIVE */

@media(max-width:768px){

    .layanan-header{

        flex-direction:column;

        align-items:flex-start;

    }

    .header-left h1{

        font-size:38px;

    }

}

</style>