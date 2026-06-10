<div class="menu-card">

    <h3>
        Akun Saya
    </h3>

    <button class="menu-item">

        <div class="menu-left">

            <div class="menu-icon">
                ✏️
            </div>

            <div class="menu-text">

                <span class="menu-title">
                    Edit Profil
                </span>

                <small>
                    Ubah data akun dan foto profil
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

    <button
    class="menu-item"
    onclick="openAddressModal()">

        <div class="menu-left">

            <div class="menu-icon">
                📍
            </div>

            <div class="menu-text">

                <span class="menu-title"
                >
                    Alamat Tersimpan
                </span>

                <small>
                    Kelola alamat pemesanan
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

    <button
    class="menu-item"
    onclick="openPaymentModal()">

        <div class="menu-left">

            <div class="menu-icon">
                💳
            </div>

            <div class="menu-text">

                <span class="menu-title">
                    Metode Pembayaran
                </span>

                <small>
                    Kelola rekening dan e-wallet
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

</div>

<style>
    .menu-card{

    max-width:1200px;

    margin:20px auto;

    padding:28px;

    background:white;

    border-radius:28px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 8px 25px rgba(0,0,0,.04);
}

.menu-card h3{

    margin:0 0 20px;

    font-size:22px;

    font-weight:800;

    color:#222;
}

.menu-item{

    width:100%;

    display:flex;

    align-items:center;

    justify-content:space-between;

    padding:18px;

    border:none;

    background:transparent;

    border-radius:18px;

    cursor:pointer;

    transition:.3s ease;
}

.menu-item:hover{

    background:#FFF8F1;

    transform:translateX(4px);
}

.menu-left{

    display:flex;

    align-items:center;

    gap:15px;
}

.menu-icon{

    width:48px;
    height:48px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:14px;

    background:#FFF5EA;

    font-size:20px;
}

.menu-text{

    display:flex;

    flex-direction:column;

    align-items:flex-start;
}

.menu-title{

    font-size:16px;

    font-weight:700;

    color:#222;
}

.menu-text small{

    margin-top:4px;

    color:#888;

    font-size:13px;
}

.menu-arrow{

    font-size:28px;

    color:#C5C5C5;

    transition:.3s;
}

.menu-item:hover .menu-arrow{

    color:#F08A28;

    transform:translateX(4px);
}

.menu-item + .menu-item{

    margin-top:8px;
}
</style>