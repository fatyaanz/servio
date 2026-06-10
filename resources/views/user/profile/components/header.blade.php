<div class="profile-header">

    <div class="profile-header-content">

        <div class="header-badge">

            👤 Akun Saya

        </div>

        <h1>

            Profile

        </h1>

        <p>

            Kelola informasi akun, alamat, metode pembayaran,
            dan pengaturan akun Servio Anda.

        </p>

    </div>

    <div class="profile-header-icon">

        👤

    </div>

</div>

<style>
    /* =========================
   PROFILE HEADER
========================= */

.profile-header{

    max-width:1200px;

    margin:20px auto;

    padding:40px;

    border-radius:30px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:30px;

    background:
        linear-gradient(
            135deg,
            rgba(240,138,40,.08),
            rgba(255,255,255,.96)
        );

    backdrop-filter:blur(15px);

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 30px rgba(0,0,0,.04);
}

/* =========================
   CONTENT
========================= */

.profile-header-content{

    flex:1;
}

.header-badge{

    width:fit-content;

    display:flex;

    align-items:center;

    gap:8px;

    padding:8px 16px;

    border-radius:999px;

    background:#FFF6EE;

    color:#F08A28;

    border:1px solid rgba(240,138,40,.12);

    font-size:12px;

    font-weight:700;
}

.profile-header h1{

    margin:18px 0 10px;

    font-size:48px;

    font-weight:800;

    color:#222;

    line-height:1.1;
}

.profile-header p{

    max-width:550px;

    color:#777;

    font-size:15px;

    line-height:1.8;
}

/* =========================
   ICON
========================= */

.profile-header-icon{

    width:110px;
    height:110px;

    display:flex;

    align-items:center;
    justify-content:center;

    flex-shrink:0;

    border-radius:28px;

    background:white;

    font-size:48px;

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .profile-header{

        margin:20px;

    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .profile-header{

        flex-direction:column;

        align-items:flex-start;

        padding:25px;
    }

    .profile-header-icon{

        width:80px;
        height:80px;

        font-size:36px;
    }

    .profile-header h1{

        font-size:34px;
    }

}

</style>