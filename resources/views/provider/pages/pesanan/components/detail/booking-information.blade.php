@php
    $category = $booking->subServices->first()?->providerService?->category;
@endphp
<div class="booking-card">

    <h3>

        Informasi Booking

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

    <div class="info-row">

        <span>Jadwal</span>

        <strong>
            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') }} - {{ substr($booking->booking_time, 0, 5) }}
        </strong>

    </div>

    <div class="info-row" style="flex-direction: column; align-items: flex-start; gap: 5px;">

        <span>Alamat</span>

        <strong style="text-align: left; line-height: 1.5; font-weight: 600;">{{ $booking->address }}</strong>

    </div>

    @if($booking->location_note)
        <div class="info-row" style="flex-direction: column; align-items: flex-start; gap: 5px;">

            <span>Catatan Lokasi</span>

            <strong style="text-align: left; font-weight: 500;">{{ $booking->location_note }}</strong>

        </div>
    @endif

    @if($booking->damage_description)
        <div class="info-row" style="flex-direction: column; align-items: flex-start; gap: 5px; margin-top: 10px; padding-top: 10px; border-top: 1px dashed #E5E5E5;">

            <span style="font-weight: 700; color: #333;">Deskripsi Kerusakan</span>

            <strong style="text-align: left; font-weight: 500; color: #555; line-height: 1.5;">{{ $booking->damage_description }}</strong>

        </div>
    @endif

    @php
        $photos = [];
        if ($booking->damage_photo) {
            if (is_array($booking->damage_photo)) {
                $photos = $booking->damage_photo;
            } else {
                $decoded = json_decode($booking->damage_photo, true);
                if (is_array($decoded)) {
                    $photos = $decoded;
                } else {
                    $photos = [$booking->damage_photo];
                }
            }
        }
    @endphp

    @if(count($photos) > 0)
        <div class="info-row" style="flex-direction: column; align-items: flex-start; gap: 5px; margin-top: 10px; padding-top: 10px;">

            <span style="font-weight: 700; color: #333;">Foto Kerusakan</span>

            <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 5px; width: 100%;">
                @foreach($photos as $photo)
                    <div style="width: 100px; height: 100px; border-radius: 14px; overflow: hidden; border: 1px solid #ECECEC; box-shadow: 0 4px 10px rgba(0,0,0,0.03);">
                        <a href="{{ asset('storage/' . $photo) }}" target="_blank">
                            <img src="{{ asset('storage/' . $photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    @endif

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