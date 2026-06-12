<div class="menu-card">

    <h3>
        Bantuan
    </h3>

    <button class="menu-item">

        <div class="menu-left">

            <div class="menu-icon">
                ❓
            </div>

            <div class="menu-text">

                <span class="menu-title">
                    Pusat Bantuan
                </span>

                <small>
                    FAQ dan panduan penggunaan Servio
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

    <button class="menu-item">

        <div class="menu-left">

            <div class="menu-icon">
                💬
            </div>

            <div class="menu-text">

                <span class="menu-title">
                    Hubungi Customer Service
                </span>

                <small>
                    Bantuan langsung dari tim Servio
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

    <button class="menu-item">

        <div class="menu-left">

            <div class="menu-icon">
                📄
            </div>

            <div class="menu-text">

                <span class="menu-title">
                    Syarat & Ketentuan
                </span>

                <small>
                    Ketentuan penggunaan layanan Servio
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

    <button class="menu-item">

        <div class="menu-left">

            <div class="menu-icon">
                ℹ️
            </div>

            <div class="menu-text">

                <span class="menu-title">
                    Tentang Servio
                </span>

                <small>
                    Informasi aplikasi dan versi terbaru
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

    margin:0 auto 20px;

    padding:28px;

    background:white;

    border-radius:28px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 8px 25px rgba(0,0,0,.04);
}

.menu-card h3{

    margin:0 0 20px;

    color:#222;

    font-size:22px;

    font-weight:800;
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

    transition:.3s ease;
}

.menu-item:hover .menu-arrow{

    color:#F08A28;

    transform:translateX(4px);
}

.menu-item + .menu-item{

    margin-top:8px;
}

/* MOBILE */

@media(max-width:768px){

    .menu-card{

        margin:15px;

        padding:22px;
    }

    .menu-item{

        padding:15px;
    }

    .menu-icon{

        width:42px;
        height:42px;

        font-size:18px;
    }

    .menu-title{

        font-size:15px;
    }

}
</style>