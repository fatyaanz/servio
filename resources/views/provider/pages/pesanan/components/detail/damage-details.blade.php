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

@if($booking->damage_description || count($photos) > 0)
<div class="initial-damage-card">
    <div class="card-header" style="display: flex; align-items: center; gap: 15px; border-bottom: 1px solid #F1F5F9; padding-bottom: 18px; margin-bottom: 18px;">
        <div class="header-icon" style="background: #FEF2F2; color: #EF4444; width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px;">
            <i class='bx bx-error'></i>
        </div>
        <div>
            <h3 style="margin: 0; color: #0F172A; font-size: 20px; font-weight: 800;">Detail Kerusakan Awal</h3>
            <p style="margin-top: 4px; color: #64748B; font-size: 13px; margin-bottom: 0;">Deskripsi masalah dan foto yang diunggah oleh pelanggan</p>
        </div>
    </div>

    <div class="damage-content-body">
        @if($booking->damage_description)
            <div style="font-size: 12px; font-weight: 700; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">📝 Deskripsi Kerusakan</div>
            <div style="font-size: 14px; color: #334155; font-weight: 500; line-height: 1.7; background: #F8FAFC; padding: 15px 20px; border-radius: 16px; border: 1px solid #E2E8F0; margin-bottom: 18px;">
                {{ $booking->damage_description }}
            </div>
        @endif

        @if(count($photos) > 0)
            <div style="font-size: 12px; font-weight: 700; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;"><i class='bx bx-camera'></i> Foto Lampiran</div>
            <div style="display: flex; gap: 12px; flex-wrap: wrap; width: 100%;">
                @foreach($photos as $photo)
                    <div style="width: 120px; height: 120px; border-radius: 16px; overflow: hidden; border: 1px solid #E2E8F0; box-shadow: 0 4px 12px rgba(0,0,0,0.03); cursor: pointer;">
                        <a href="{{ asset('storage/' . $photo) }}" target="_blank">
                            <img src="{{ asset('storage/' . $photo) }}" style="width: 100%; height: 100%; object-fit: cover; transition: 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endif

<style>
.initial-damage-card {
    margin: 20px;
    padding: 24px;
    background: #ffffff;
    border-radius: 24px;
    border: 1px solid #E2E8F0;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
}
@media(max-width: 768px) {
    .initial-damage-card {
        margin: 15px;
        padding: 20px;
    }
}
</style>
