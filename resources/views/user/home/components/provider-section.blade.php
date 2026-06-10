<div class="provider-section">

    <div class="provider-grid">

        <!-- CARD 1 -->
        <div class="provider-card">

            <div class="badge badge-red">
                Tepat Waktu
            </div>

            <div class="provider-image">
                <img src="{{ asset('assets/images/provider-logo.png') }}" alt="Provider">
            </div>

            <div class="provider-content">

                <div class="provider-meta">
                    0.5 km • 10 min
                </div>

                <h3>Service AC Berkah</h3>

                <div class="provider-rating">
                    ⭐ 4.9
                </div>

                <div class="provider-price">

                    <span class="price-label">
                        Estimasi
                    </span>

                    <span class="price-value">
                        💰 100k-200k
                    </span>

                </div>

                <hr>

                <div class="provider-guarantee">
                    ✅ Garansi 1 Bulan
                </div>

            </div>

        </div>

        <!-- CARD 2 -->
        <div class="provider-card">

            <div class="badge badge-purple">
                Top Rated
            </div>

            <div class="provider-image">
                <img src="{{ asset('assets/images/provider-logo.png') }}" alt="Provider">
            </div>

            <div class="provider-content">

                <div class="provider-meta">
                    0.5 km • 10 min
                </div>

                <h3>Service AC Berkah</h3>

                <div class="provider-rating">
                    ⭐ 4.9
                </div>

                <div class="provider-price">

                    <span class="price-label">
                        Estimasi
                    </span>

                    <span class="price-value">
                        💰 100k-200k
                    </span>

                </div>

                <hr>

                <div class="provider-guarantee">
                    ✅ Garansi 1 Bulan
                </div>

            </div>

        </div>

        <!-- CARD 3 -->
        <div class="provider-card">

            <div class="badge badge-red">
                Tepat Waktu
            </div>

            <div class="provider-image">
                <img src="{{ asset('assets/images/provider-logo.png') }}" alt="Provider">
            </div>

            <div class="provider-content">

                <div class="provider-meta">
                    0.5 km • 10 min
                </div>

                <h3>Service AC Berkah</h3>

                <div class="provider-rating">
                    ⭐ 4.9
                </div>

                <div class="provider-price">

                    <span class="price-label">
                        Estimasi
                    </span>

                    <span class="price-value">
                        💰 100k-200k
                    </span>

                </div>

                <hr>

                <div class="provider-guarantee">
                    ✅ Garansi 1 Bulan
                </div>

            </div>

        </div>

        <!-- CARD 4 -->
        <div class="provider-card">

            <div class="badge badge-purple">
                Top Rated
            </div>

            <div class="provider-image">
                <img src="{{ asset('assets/images/provider-logo.png') }}" alt="Provider">
            </div>

            <div class="provider-content">

                <div class="provider-meta">
                    0.5 km • 10 min
                </div>

                <h3>Service AC Berkah</h3>

                <div class="provider-rating">
                    ⭐ 4.9
                </div>

                <div class="provider-price">

                    <span class="price-label">
                        Estimasi
                    </span>

                    <span class="price-value">
                        💰 100k-200k
                    </span>

                </div>

                <hr>

                <div class="provider-guarantee">
                    ✅ Garansi 1 Bulan
                </div>

            </div>

        </div>

    </div>

</div>
<style>

.provider-section{
    max-width:1400px;
    margin:30px auto;
    padding:0 30px 120px;
}

.provider-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.provider-card{
    position:relative;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);

    border-radius:24px;

    overflow:hidden;

    box-shadow:
        0 10px 25px rgba(0,0,0,.06);

    transition:.3s ease;
}

.provider-card:hover{
    transform:translateY(-6px);

    box-shadow:
        0 15px 30px rgba(240,138,40,.15);
}

.provider-image{
    height:140px;

    display:flex;
    justify-content:center;
    align-items:center;

    background:#F9F9F9;
}

.provider-image img{
    width:100px;
    height:auto;
    object-fit:contain;
}

.provider-content{
    padding:16px;
}

.provider-meta{
    color:#A0A0A0;
    font-size:13px;
    margin-bottom:8px;
}

.provider-content h3{
    margin:0;

    font-size:16px;
    font-weight:700;

    color:#2F2534;

    line-height:1.4;
}

.provider-rating{
    margin-top:10px;

    text-align:right;

    font-size:14px;
    font-weight:700;
}

.provider-price{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-top:12px;
}

.price-label{
    color:#34736A;

    font-size:13px;
    font-weight:700;
}

.price-value{
    font-size:14px;
    font-weight:700;
}

.provider-content hr{
    margin:12px 0;

    border:none;
    border-top:1px solid #ECECEC;
}

.provider-guarantee{
    color:#92C44C;

    font-size:13px;
    font-weight:700;
}

.badge{
    position:absolute;

    top:12px;
    left:0;

    color:white;

    padding:8px 14px;

    font-size:11px;
    font-weight:700;

    border-radius:0 10px 10px 0;

    z-index:10;
}

.badge-red{
    background:#E53935;
}

.badge-purple{
    background:#7E57C2;
}

/* TABLET */

@media(max-width:1024px){

    .provider-grid{
        grid-template-columns:repeat(2,1fr);
    }

}

/* MOBILE */

@media(max-width:768px){

    .provider-section{
        padding:0 15px 100px;
    }

    .provider-grid{
        grid-template-columns:1fr;
    }

}

</style>