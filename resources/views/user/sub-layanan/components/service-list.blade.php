<div class="service-list">

    @forelse($subServices as $subService)

    <div
        class="service-card"
        data-id="{{ $subService->id }}"
    >
        <input
            type="checkbox"
            name="sub_services[]"
            value="{{ $subService->id }}"
            hidden
        >

        <div class="service-check">
            ✓
        </div>



        <div class="service-content">

            <h3>

                {{ $subService->name }}

            </h3>

            <p>

                {{ $subService->description ?? 'Tidak ada deskripsi' }}

            </p>

            <strong>

                Rp{{ number_format($subService->price_min,0,',','.') }}
                -
                Rp{{ number_format($subService->price_max,0,',','.') }}

            </strong>

        </div>

    </div>

    @empty

    <div class="service-card">

        <div class="service-content">

            <h3>

                Belum Ada Sub Layanan

            </h3>

            <p>

                Provider belum menambahkan layanan.

            </p>

        </div>

    </div>

    @endforelse

</div>

<style>

/* =========================
   SERVICE LIST
========================= */

.service-list{
    max-width:1400px;

    margin:0 auto;

    padding:0 30px;
}

/* =========================
   CARD
========================= */

.service-card{

    position:relative;

    display:flex;
    align-items:center;

    gap:18px;

    padding:18px;

    margin-bottom:16px;

    cursor:pointer;

    border-radius:24px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:2px solid transparent;

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);

    transition:.3s ease;
}

.service-card:hover{

    transform:translateY(-3px);

    border-color:#F08A28;

    box-shadow:
        0 15px 30px rgba(240,138,40,.10);
}

.service-card.selected{

    border-color:#F08A28;

    background:rgba(255,249,243,.95);
}

/* =========================
   CHECKMARK
========================= */

.service-check{

    position:absolute;

    top:15px;
    right:15px;

    width:26px;
    height:26px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#EAEAEA;

    color:white;

    font-size:13px;
    font-weight:700;

    transition:.3s ease;
}

.service-card.selected .service-check{

    background:#F08A28;
}

/* =========================
   IMAGE
========================= */

.service-image{

    width:95px;
    height:95px;

    flex-shrink:0;

    overflow:hidden;

    border-radius:18px;

    border:1px solid rgba(240,138,40,.15);
}

.service-image img{

    width:100%;
    height:100%;

    object-fit:cover;
}

/* =========================
   CONTENT
========================= */

.service-content{

    flex:1;
}

.service-content h3{

    margin:0;

    color:#222;

    font-size:20px;
    font-weight:800;
}

.service-content p{

    margin-top:8px;

    color:#777;

    font-size:14px;

    line-height:1.7;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .service-list{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .service-list{
        padding:0 15px;
    }

    .service-card{

        gap:14px;

        padding:14px;
    }

    .service-image{

        width:75px;
        height:75px;
    }

    .service-content h3{

        font-size:17px;
    }

    .service-content p{

        font-size:13px;
    }

    .service-check{

        width:22px;
        height:22px;

        font-size:11px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .service-content h3{

        font-size:15px;
    }

    .service-content p{

        font-size:12px;
    }

}

</style>