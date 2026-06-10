<div class="logout-card">

    <div class="logout-info">

        <div class="logout-icon">

            🚪

        </div>

        <div>

            <h3>
                Keluar dari Akun
            </h3>

            <p>
                Anda akan keluar dari akun Servio pada perangkat ini.
            </p>

        </div>

    </div>

    <button class="logout-btn">

        Logout

    </button>

</div>

<style>
    /* =========================
   LOGOUT CARD
========================= */

.logout-card{

    max-width:1200px;

    margin:20px auto 80px;

    padding:24px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:25px;

    background:white;

    border-radius:28px;

    border:1px solid rgba(239,68,68,.12);

    box-shadow:
        0 8px 25px rgba(0,0,0,.04);
}

/* =========================
   INFO
========================= */

.logout-info{

    display:flex;

    align-items:center;

    gap:18px;
}

.logout-icon{

    width:60px;
    height:60px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:18px;

    background:#FEF2F2;

    font-size:28px;
}

.logout-info h3{

    margin:0;

    font-size:20px;

    font-weight:700;

    color:#222;
}

.logout-info p{

    margin-top:6px;

    color:#777;

    font-size:14px;
}

/* =========================
   BUTTON
========================= */

.logout-btn{

    min-width:180px;

    height:54px;

    border:none;

    border-radius:16px;

    background:#EF4444;

    color:white;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    transition:.3s ease;
}

.logout-btn:hover{

    background:#DC2626;

    transform:translateY(-2px);
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .logout-card{

        margin:15px;

        flex-direction:column;

        align-items:stretch;
    }

    .logout-info{

        align-items:flex-start;
    }

    .logout-btn{

        width:100%;
    }

}
</style>