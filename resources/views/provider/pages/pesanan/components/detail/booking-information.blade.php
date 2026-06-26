@php
    $category = $booking->subServices->first()?->providerService?->category;
@endphp
<div class="booking-card">

    <h3 style="margin-top:0; margin-bottom:20px; font-weight: 800; font-size: 20px; color: #0F172A;">
        Detail Pelanggan & Layanan
    </h3>

    <div class="info-row">

        <span>ID Order</span>

        <strong style="color: #F08A28;">#{{ $booking->formatted_id }}</strong>

    </div>

    <div class="info-row">

        <span>Pelanggan</span>

        <strong>{{ $booking->customer->name }}</strong>

    </div>

    <div class="info-row">

        <span>Layanan</span>

        <strong>{{ $category->name ?? '-' }}</strong>

    </div>

    <div class="info-row">

        <span>Sub Layanan</span>

        <strong>
            @foreach($booking->subServices as $sub)
                {{ $sub->name }}{{ !$loop->last ? ', ' : '' }}
            @endforeach
        </strong>

    </div>

</div>

<style>

.booking-card{

    margin:20px;

    padding:20px;

    background:white;

    border-radius:24px;

    box-shadow:
        0 4px 12px rgba(0,0,0,.05);
}

.booking-card h3{

    margin-top:0;

    margin-bottom:20px;
}

.info-row{

    display:flex;

    justify-content:space-between;

    margin-bottom:15px;
}

.info-row span{

    color:#777;
}

.info-row strong{

    color:#222;
}

</style>