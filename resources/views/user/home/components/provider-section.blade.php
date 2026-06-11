<div class="provider-section">

    <div class="section-header">

        <h2>
            Penyedia Terdekat
        </h2>

        <a href="#">
            Lihat Semua
        </a>

    </div>

    <div class="provider-grid">

        <!-- CARD 1 -->
        <div class="provider-card">

            <div class="provider-cover">

                <img
                    src="{{ asset('assets/images/provider-logo.png') }}"
                    alt="Provider"
                >

                <span class="provider-badge top-rated">
                    Top Rated
                </span>

            </div>

            <div class="provider-content">

                <div class="provider-header">

                    <h3>
                        Service AC Berkah
                    </h3>

                    <span class="provider-rating">
                        ⭐ 4.9
                    </span>

                </div>

                <div class="provider-address">
                    📌 Jl. Sukabirus No. 12, Dayeuhkolot, Kabupaten Bandung, Jawa Barat
                </div>

                <div class="provider-price">

                    Mulai dari

                    <strong>
                        Rp100.000
                    </strong>

                </div>

                <div class="provider-features">

                    <span>✅ Garansi</span>

                    <span>⚡ Cepat</span>

                    <span>🔧 Profesional</span>

                </div>

                <a href="#" class="provider-btn">
                    Lihat Detail
                </a>

            </div>

        </div>

        <!-- CARD 2 -->
        <div class="provider-card">

            <div class="provider-cover">

                <img
                    src="{{ asset('assets/images/provider-logo.png') }}"
                    alt="Provider"
                >

                <span class="provider-badge">
                    Tepat Waktu
                </span>

            </div>

            <div class="provider-content">

                <div class="provider-header">

                    <h3>
                        Service Mesin Cuci Jaya
                    </h3>

                    <span class="provider-rating">
                        ⭐ 4.8
                    </span>

                </div>

                <div class="provider-address">
                    📌 Jl. Telekomunikasi No. 1, Bojongsoang, Bandung
                </div>

                <div class="provider-price">

                    Mulai dari

                    <strong>
                        Rp80.000
                    </strong>

                </div>

                <div class="provider-features">

                    <span>✅ Garansi</span>

                    <span>⚡ Cepat</span>

                </div>

                <a href="#" class="provider-btn">
                    Lihat Detail
                </a>

            </div>

        </div>

        <!-- CARD 3 -->
        <div class="provider-card">

            <div class="provider-cover">

                <img
                    src="{{ asset('assets/images/provider-logo.png') }}"
                    alt="Provider"
                >

                <span class="provider-badge">
                    Recommended
                </span>

            </div>

            <div class="provider-content">

                <div class="provider-header">

                    <h3>
                        Tukang Listrik Amanah
                    </h3>

                    <span class="provider-rating">
                        ⭐ 4.7
                    </span>

                </div>

                <div class="provider-address">
                    📌 Jl. Soekarno Hatta No. 100, Bandung
                </div>

                <div class="provider-price">

                    Mulai dari

                    <strong>
                        Rp120.000
                    </strong>

                </div>

                <div class="provider-features">

                    <span>⚡ Cepat</span>

                    <span>🔧 Profesional</span>

                </div>

                <a href="#" class="provider-btn">
                    Lihat Detail
                </a>

            </div>

        </div>

        <!-- CARD 4 -->
        <div class="provider-card">

            <div class="provider-cover">

                <img
                    src="{{ asset('assets/images/provider-logo.png') }}"
                    alt="Provider"
                >

                <span class="provider-badge">
                    Top Rated
                </span>

            </div>

            <div class="provider-content">

                <div class="provider-header">

                    <h3>
                        Cleaning Service Bersih
                    </h3>

                    <span class="provider-rating">
                        ⭐ 5.0
                    </span>

                </div>

                <div class="provider-address">
                    📌 Jl. Asia Afrika No. 88, Bandung, Jawa Barat
                </div>

                <div class="provider-price">

                    Mulai dari

                    <strong>
                        Rp150.000
                    </strong>

                </div>

                <div class="provider-features">

                    <span>✅ Garansi</span>

                    <span>⚡ Cepat</span>

                    <span>🔧 Profesional</span>

                </div>

                <a href="#" class="provider-btn">
                    Lihat Detail
                </a>

            </div>

        </div>

    </div>

</div>
<style>
    /* =========================
   PROVIDER SECTION
========================= */

.provider-section{

    margin-bottom:30px;

}

.provider-grid{

    display:grid;

    grid-template-columns:
    repeat(auto-fill,minmax(280px,1fr));

    gap:20px;

}

/* =========================
   CARD
========================= */

.provider-card{

    background:white;

    border-radius:20px;

    overflow:hidden;

    border:1px solid var(--border);

    box-shadow:var(--shadow-sm);

    transition:.3s;

}

.provider-card:hover{

    transform:translateY(-4px);

    box-shadow:var(--shadow-md);

}

/* =========================
   COVER
========================= */

.provider-cover{

    position:relative;

    height:180px;

    background:#fafafa;

}

.provider-cover img{

    width:100%;
    height:100%;

    object-fit:contain;

    padding:20px;

}

/* =========================
   BADGE
========================= */

.provider-badge{

    position:absolute;

    top:14px;
    right:14px;

    padding:6px 12px;

    border-radius:999px;

    font-size:12px;

    font-weight:600;

}

.top-rated{

    background:#FFF4E6;

    color:var(--primary);

}

/* =========================
   CONTENT
========================= */

.provider-content{

    padding:18px;

}

/* HEADER */

.provider-header{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:10px;

    margin-bottom:8px;

}

.provider-header h3{

    font-size:16px;

    font-weight:700;

    color:var(--text-dark);

    line-height:1.4;

}

.provider-rating{

    font-size:13px;

    font-weight:600;

    white-space:nowrap;

}

/* LOCATION */

.provider-location{

    font-size:13px;

    color:var(--text-secondary);

    margin-bottom:14px;

}
.provider-address{

    font-size:13px;

    color:var(--text-secondary);

    margin-bottom:14px;

    overflow:hidden;

    text-overflow:ellipsis;

    white-space:nowrap;

}

/* PRICE */

.provider-price{

    font-size:13px;

    color:var(--text-secondary);

    margin-bottom:16px;

}

.provider-price strong{

    display:block;

    margin-top:4px;

    color:var(--primary);

    font-size:18px;

}

/* FEATURES */

.provider-features{

    display:flex;

    flex-wrap:wrap;

    gap:8px;

    margin-bottom:18px;

}

.provider-features span{

    padding:6px 10px;

    border-radius:999px;

    background:#fafafa;

    border:1px solid var(--border);

    font-size:11px;

    color:var(--text-dark);

}

/* BUTTON */

.provider-btn{

    width:100%;

    display:flex;

    align-items:center;

    justify-content:center;

    text-decoration:none;

    padding:12px;

    border-radius:12px;

    background:var(--primary);

    color:white;

    font-size:14px;

    font-weight:600;

    transition:.3s;

}

.provider-btn:hover{

    opacity:.9;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .provider-grid{

        grid-template-columns:1fr;

    }

}
</style>