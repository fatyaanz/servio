@php

$category =
    $booking->subServices
        ->first()
        ?->providerService
        ?->category;

$totalMin =
    $booking->subServices->sum('price_min');

$totalMax =
    $booking->subServices->sum('price_max');

@endphp
<div class="order-card">

    <div class="card-header">

        <div class="status-badge
            {{ $booking->status }}
        ">
            {{ ucfirst(str_replace('_',' ',$booking->status)) }}
        </div>

        <div class="booking-id">
            #{{ $booking->booking_code ?? $booking->id }}
        </div>

    </div>

    <div class="order-body">

        <div class="order-image">

            @if($category && $category->icon)

                <img
                    src="{{ asset('storage/' . $category->icon) }}"
                    alt="{{ $category->name }}"
                >

            @else

                🛠️

            @endif

        </div>

        <div class="order-info">

            <h3>
                {{ $category->name ?? 'Layanan' }}
            </h3>

            <p class="customer-name">
                {{ $booking->customer->name }}
            </p>

            <div class="order-meta">

                <span>
                    📅
                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                </span>

                <span>
                    🕐
                    {{ substr($booking->booking_time,0,5) }}
                </span>

            </div>

            <p class="order-address">
                📍 {{ $booking->address }}
            </p>

            <div class="order-tags">

                <span class="tag diagnosis">

                    {{ $booking->subServices->count() }}
                    Sub Layanan

                </span>

                <span class="tag price">

                    Rp{{ number_format($totalMin,0,',','.') }}
                    -
                    Rp{{ number_format($totalMax,0,',','.') }}

                </span>

            </div>

        </div>

    </div>

    <div class="card-footer">

        <div class="order-summary">

            <span>
                👨‍🔧 {{ $booking->subServices->count() }} layanan dipilih
            </span>

        </div>

        <div class="order-actions" style="flex: 1; display: flex; justify-content: flex-end;">

            {{-- 
               Hapus semua kode @if @else yang lama. 
               Cukup sisakan satu tombol ini aja supaya semua status (pending/approved) 
               mempunyai tombol yang sama, yaitu masuk ke halaman detail dulu.
            --}}
            <a 
                href="{{ route('provider.detail-pesanan', $booking->id) }}" 
                class="accept-btn"
                style="width: 100%; max-width: 200px;"
            >
                Lihat Detail →
            </a>

        </div>

    </div>

</div>

<style>

.order-card{

    background:#fff;

    border-radius:24px;

    padding:22px;

    margin:0 20px 18px;

    border:1px solid #F1F5F9;

    box-shadow:
        0 4px 20px rgba(15,23,42,.05);

    transition:.3s ease;
}

.order-card:hover{

    transform:translateY(-4px);

    box-shadow:
        0 12px 30px rgba(15,23,42,.08);
}

.card-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:18px;
}

.booking-id{

    font-size:13px;

    color:#94A3B8;

    font-weight:600;
}

.order-status{

    background:#FFF7E8;

    color:#F59E0B;

    padding:8px 14px;

    border-radius:999px;

    font-size:13px;

    font-weight:700;
}

.order-body{

    display:flex;

    gap:18px;
}

.order-image{

    width:90px;

    height:90px;

    border-radius:18px;

    background:#FFF7ED;

    overflow:hidden;

    display:flex;

    justify-content:center;

    align-items:center;

    flex-shrink:0;

    font-size:34px;
}

.order-image img{

    width:100%;

    height:100%;

    object-fit:cover;
}

.order-info{

    flex:1;
}

.order-info h3{

    font-size:20px;

    font-weight:700;

    color:#0F172A;

    margin-bottom:4px;
}

.customer-name{

    color:#475569;

    font-size:15px;

    font-weight:600;

    margin-bottom:10px;
}

.order-meta{

    display:flex;

    gap:16px;

    margin-bottom:10px;

    color:#64748B;

    font-size:14px;
}

.order-address{

    color:#64748B;

    font-size:14px;

    line-height:1.6;

    margin-bottom:12px;
}

.order-tags{

    display:flex;

    gap:10px;

    flex-wrap:wrap;
}

.tag{

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;
}

.diagnosis{

    background:#EEF2FF;

    color:#4F46E5;
}

.price{

    background:#ECFDF5;

    color:#16A34A;
}

.card-footer{

    margin-top:20px;

    padding-top:18px;

    border-top:1px solid #F1F5F9;

    display:flex;

    justify-content:space-between;

    align-items:center;
}

.order-summary{

    font-size:14px;

    color:#64748B;

    font-weight:500;
}

.order-actions{

    display:flex;

    gap:12px;
}

.reject-btn{

    border:none;

    background:#FEE2E2;

    color:#DC2626;

    height:46px;

    padding:0 22px;

    border-radius:14px;

    font-weight:700;

    cursor:pointer;
}

.accept-btn{

    height:46px;

    padding:0 24px;

    background:#F08A28;

    color:white;

    text-decoration:none;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:14px;

    font-weight:700;

    transition:.3s;
}

.accept-btn:hover{

    background:#E67700;
}

.status-badge.pending{
    background:#FEF3C7;
    color:#D97706;
}

.status-badge.accepted{
    background:#DBEAFE;
    color:#2563EB;
}

.status-badge.on_the_way{
    background:#E0F2FE;
    color:#0284C7;
}

.status-badge.diagnosis{
    background:#F3E8FF;
    color:#9333EA;
}

.status-badge.waiting_approval{
    background:#FFF7ED;
    color:#EA580C;
}

.status-badge.approved{
    background:#DCFCE7;
    color:#16A34A;
}

.status-badge.working{
    background:#D1FAE5;
    color:#059669;
}

.status-badge.payment{
    background:#CFFAFE;
    color:#0891B2;
}

.status-badge.completed{
    background:#DCFCE7;
    color:#15803D;
}

.status-badge.cancelled{
    background:#FEE2E2;
    color:#DC2626;
}

.status-badge.rejected{
    background:#FFF7ED;
    color:#D97706;
}

@media(max-width:768px){

    .order-body{

        flex-direction:column;
    }

    .card-footer{

        flex-direction:column;

        gap:15px;

        align-items:stretch;
    }

    .order-actions{

        flex-direction:column;
    }
}

</style>