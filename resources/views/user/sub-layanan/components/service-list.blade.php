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

        @if($subService->photo)
            <div class="service-image" style="width: 100%; height: 140px; border-radius: 16px; overflow: hidden; margin-bottom: 15px; border: 1px solid #F3F4F6;">
                <img src="{{ asset('storage/' . $subService->photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        @endif

        <span class="service-badge">
            Populer
        </span>

        <div class="service-content">

            <h3 style="font-size: 17px; font-weight: 800; color: #1E293B; margin-bottom: 8px;">
                {{ $subService->name }}
            </h3>

            <p style="font-size: 13px; color: #64748B; margin-top: 5px; line-height: 1.6; min-height: 60px;">
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

        </div>

    </div>

        @empty

        <div class="empty-service">

            <i class='bx bx-package'></i>

            <h3>

                Belum Ada Sub Layanan

            </h3>

            <p>

                Provider belum menambahkan layanan.

            </p>

        </div>

        @endforelse

    </div>

<style>

/* =========================
   SERVICE LIST
========================= */

/* =========================
   LIST
========================= */

.service-list{

    max-width:1400px;

    margin:0 auto;

    padding:0 30px;

    display:grid;

    grid-template-columns:
    repeat(4,1fr);

    gap:20px;

}

/* =========================
   CARD
========================= */

.service-card{

    position:relative;

    background:white;

    border-radius:24px;

    padding:22px;

    cursor:pointer;

    border:2px solid transparent;

    box-shadow:
    0 8px 24px rgba(15,23,42,.05);

    transition:.3s ease;

}

.service-card:hover{

    transform:translateY(-4px);

    border-color:#F08A28;

    box-shadow:
    0 15px 35px rgba(240,138,40,.12);

}

.service-card.selected{

    border-color:#F08A28;

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

}

/* =========================
   CONTENT
========================= */

.service-content h3{

    margin:0;

    color:#222;

    font-size:18px;

    font-weight:800;

    line-height:1.4;

}

.service-content p{

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

}

/* =========================
   TABLET
========================= */

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

    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .service-list{

        grid-template-columns:1fr;

        padding:0 15px;

    }

}

</style>