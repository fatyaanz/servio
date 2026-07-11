<div class="home-header">

    <div class="logo-section">

        <img src="{{ asset('assets/images/logo.png') }}" alt="Servio Logo">

        <div class="brand-text">
            ervio
        </div>

    </div>

    <div class="header-right">

        <div class="location">

            <i class='bx bx-map' style="font-size:16px; color:var(--primary);"></i>

            <span class="location-text">
                {{ auth()->check() && auth()->user()->city ? auth()->user()->city : 'Bandung' }}
            </span>

            <i class='bx bx-chevron-down' style="font-size:14px; color:#9CA3AF;"></i>

        </div>

        <a href="{{ route('notifications.index') }}" class="notification-btn" style="text-decoration: none; position: relative;">
            <i class='bx bx-bell' style="font-size:20px; color:#626B7A;"></i>
            @php
                $unreadNotifCount = auth()->check() ? \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count() : 0;
            @endphp
            @if($unreadNotifCount > 0)
                <span class="notif-badge">
                    {{ $unreadNotifCount }}
                </span>
            @endif
        </a>

    </div>

</div>

<style>

/* =========================
   HEADER
========================= */

.home-header{

    display:flex;

    justify-content:space-between;
    align-items:center;

    margin-bottom:24px;

}

/* =========================
   LOGO
========================= */

.logo-section{

    display:flex;

    align-items:center;

    gap:6px;

}

.logo-section img{

    width:38px;
    height:38px;

    object-fit:contain;

}

.brand-text{

    font-family:var(--font-heading);

    font-size:24px;

    font-weight:800;

    color:var(--primary);

    margin-left:-2px;

}

/* =========================
   RIGHT
========================= */

.header-right{

    display:flex;

    align-items:center;

    gap:10px;

}

/* =========================
   LOCATION
========================= */

.location{

    display:flex;

    align-items:center;

    gap:6px;

    padding:8px 14px;

    background:var(--white);

    border:1px solid var(--border);

    border-radius:var(--radius-md);

    box-shadow:var(--shadow-sm);

    cursor:pointer;

    transition:var(--transition);
}

.location:hover{
    border-color:var(--primary);
}

.location-text{

    font-size:13px;

    font-weight:600;

    color:#000;

}

/* =========================
   NOTIFICATION
========================= */

.notification-btn{

    width:40px;
    height:40px;

    display:flex;

    justify-content:center;
    align-items:center;

    background:var(--white);

    border:1px solid var(--border);

    border-radius:var(--radius-md);

    box-shadow:var(--shadow-sm);

    cursor:pointer;

    transition:var(--transition);
}

.notification-btn:hover{
    border-color:var(--primary);
}

.notif-badge{
    position: absolute;
    top: -4px;
    right: -4px;
    background: #D9534F;
    color: white;
    border-radius: 50%;
    font-size: 10px;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    line-height: 1;
    border: 2px solid white;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .brand-text{

        font-size:20px;

    }

    .location{

        padding:6px 10px;

    }

    .location-text{
        font-size:12px;
    }

}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function getMyLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                async function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    
                    try {
                        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`);
                        const data = await response.json();
                        if (data && data.address) {
                            const city = data.address.city || data.address.town || data.address.municipality || data.address.village || data.address.suburb || "Bandung";
                            const fullAddress = data.display_name;
                            
                            const locationEl = document.querySelector('.location-text');
                            if (locationEl) {
                                locationEl.textContent = city;
                            }
                            
                            await fetch("{{ route('user.update-location') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    latitude: lat,
                                    longitude: lon,
                                    address: fullAddress,
                                    city: city
                                })
                            });
                        }
                    } catch (error) {
                        console.error("Gagal mendapatkan info lokasi:", error);
                    }
                },
                function(error) {
                    console.log("Izin lokasi tidak diberikan atau gagal:", error.message);
                }
            );
        }
    }
    
    getMyLocation();

    const locationBtn = document.querySelector('.location');
    if (locationBtn) {
        locationBtn.addEventListener('click', function() {
            getMyLocation();
        });
    }
});
</script>