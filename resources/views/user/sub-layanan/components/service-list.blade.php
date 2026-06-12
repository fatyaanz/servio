<div class="service-list">

    @forelse($subServices as $subService)

    <div
        class="service-card"
        data-id="{{ $subService->id }}"
    >
<<<<<<< HEAD

=======
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
        <input
            type="checkbox"
            name="sub_services[]"
            value="{{ $subService->id }}"
            hidden
        >

        <div class="service-check">
            ✓
        </div>

<<<<<<< HEAD
        <span class="service-badge">
            Populer
        </span>
=======

>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c

        <div class="service-content">

            <h3>

                {{ $subService->name }}

            </h3>

            <p>

<<<<<<< HEAD
                {{ $subService->description ?? 'Tidak ada deskripsi layanan.' }}

            </p>

            <div class="price-box">
                @if($subService->price_max && $subService->price_max > $subService->price_min)
                    <span class="price-range">
                        Rp{{ number_format($subService->price_min, 0, ',', '.') }} - Rp{{ number_format($subService->price_max, 0, ',', '.') }}
                    </span>
                @else
                    Rp{{ number_format($subService->price_min, 0, ',', '.') }}
                @endif
            </div>
=======
                {{ $subService->description ?? 'Tidak ada deskripsi' }}

            </p>

            <strong>

                Rp{{ number_format($subService->price_min,0,',','.') }}
                -
                Rp{{ number_format($subService->price_max,0,',','.') }}

            </strong>
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c

        </div>

    </div>

<<<<<<< HEAD
        @empty

        <div class="empty-service">

            <i class='bx bx-package'></i>
=======
    @empty

    <div class="service-card">

        <div class="service-content">
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c

            <h3>

                Belum Ada Sub Layanan

            </h3>

            <p>

                Provider belum menambahkan layanan.

            </p>

        </div>

<<<<<<< HEAD
        @endforelse

    </div>

=======
    </div>

    @endforelse

</div>

>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
<style>

/* =========================
   SERVICE LIST
========================= */

<<<<<<< HEAD
/* =========================
   LIST
========================= */

.service-list{

=======
.service-list{
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
    max-width:1400px;

    margin:0 auto;

    padding:0 30px;
<<<<<<< HEAD

    display:grid;

    grid-template-columns:
    repeat(4,1fr);

    gap:20px;

=======
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
}

/* =========================
   CARD
========================= */

.service-card{

    position:relative;

<<<<<<< HEAD
    background:white;

    border-radius:24px;

    padding:22px;

    cursor:pointer;
=======
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
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c

    border:2px solid transparent;

    box-shadow:
<<<<<<< HEAD
    0 8px 24px rgba(15,23,42,.05);

    transition:.3s ease;

=======
        0 10px 25px rgba(0,0,0,.04);

    transition:.3s ease;
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
}

.service-card:hover{

<<<<<<< HEAD
    transform:translateY(-4px);
=======
    transform:translateY(-3px);
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c

    border-color:#F08A28;

    box-shadow:
<<<<<<< HEAD
    0 15px 35px rgba(240,138,40,.12);

=======
        0 15px 30px rgba(240,138,40,.10);
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
}

.service-card.selected{

    border-color:#F08A28;

<<<<<<< HEAD
    background:#FFF8F2;

}

/* =========================
   BADGE
========================= */

.service-badge{

    display:inline-flex;

    padding:7px 12px;

    border-radius:999px;

    background:#FFF4E8;

    color:#F08A28;

    font-size:11px;

    font-weight:700;

    margin-bottom:16px;

=======
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
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
}

/* =========================
   CONTENT
========================= */

<<<<<<< HEAD
=======
.service-content{

    flex:1;
}

>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
.service-content h3{

    margin:0;

    color:#222;

<<<<<<< HEAD
    font-size:18px;

    font-weight:800;

    line-height:1.4;

=======
    font-size:20px;
    font-weight:800;
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
}

.service-content p{

<<<<<<< HEAD
    margin-top:10px;

    color:#777;

    font-size:13px;

    line-height:1.7;

    min-height:65px;

}

/* =========================
   PRICE
========================= */

/* =========================
   PRICE
========================= */

.price-box {
    margin-top: 18px;
    padding-top: 18px;
    border-top: 1px solid #f1f5f9;
    color: #F08A28;
    font-size: 20px; /* 💡 Diturunkan sedikit dari 24px agar muat format range */
    font-weight: 800;
    white-space: nowrap; /* Menjaga agar tulisan tetap satu baris */
    overflow: hidden;
    text-overflow: ellipsis; /* Jaga-jaga kalau layar super kecil, teks sisa jadi titik-titik (...) */
}

.price-range {
    font-size: 18px; /* 💡 Ukuran font khusus jika berbentuk rentang harga agar manis dilihat */
}

/* Penyesuaian tambahan untuk layar mobile kecil */
@media(max-width: 480px) {
    .price-box {
        font-size: 16px;
    }
    .price-range {
        font-size: 15px;
    }
}

/* =========================
   CHECK
========================= */

.service-check{

    position:absolute;

    top:18px;

    right:18px;

    width:30px;

    height:30px;

    border-radius:50%;

    background:#E5E7EB;

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:12px;

    font-weight:700;

    transition:.3s ease;

}

.service-card.selected .service-check{

    background:#22C55E;

=======
    margin-top:8px;

    color:#777;

    font-size:14px;

    line-height:1.7;
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
}

/* =========================
   TABLET
========================= */

<<<<<<< HEAD
@media(max-width:1200px){

    .service-list{

        grid-template-columns:
        repeat(3,1fr);

    }

}

@media(max-width:992px){

    .service-list{

        grid-template-columns:
        repeat(2,1fr);

        padding:0 20px;

=======
@media(max-width:1024px){

    .service-list{
        padding:0 20px;
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .service-list{
<<<<<<< HEAD

        grid-template-columns:1fr;

        padding:0 15px;

=======
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
>>>>>>> 90255ac1f636f41656c0c3977bcb05e2bd35c16c
    }

}

</style>