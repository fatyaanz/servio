<div class="home-header">

    <div class="logo-section">

        <img src="{{ asset('assets/images/logo.png') }}" alt="Servio Logo">

        <div class="brand-text">
            ervio
        </div>

    </div>

    <div class="header-right">

        <div class="location">

            <span class="location-icon">📍</span>

            <span class="location-text">
                {{ auth()->check() && auth()->user()->city ? auth()->user()->city : 'Bandung' }}
            </span>

            <svg class="dropdown-icon"
                 width="12"
                 height="12"
                 viewBox="0 0 24 24"
                 fill="none">

                <path
                    d="M6 9L12 15L18 9"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>

            </svg>

        </div>

        <a href="{{ route('notifications.index') }}" class="notification" style="text-decoration: none; position: relative;">
            🔔
            @php
                $unreadNotifCount = auth()->check() ? \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count() : 0;
            @endphp
            @if($unreadNotifCount > 0)
                <span class="notif-badge" style="position: absolute; top: -5px; right: -5px; background: #EF4444; color: white; border-radius: 50%; font-size: 10px; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; font-weight: bold; line-height: 1;">
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

    gap:8px;

}

.logo-section img{

    width:42px;
    height:42px;

    object-fit:contain;

}

.brand-text{

    font-size:28px;

    font-weight:700;

    color:var(--primary);

    margin-left:-4px;

}

/* =========================
   RIGHT
========================= */

.header-right{

    display:flex;

    align-items:center;

    gap:12px;

}

/* =========================
   LOCATION
========================= */

.location{

    display:flex;

    align-items:center;

    gap:8px;

    padding:10px 14px;

    background:white;

    border:1px solid var(--border);

    border-radius:12px;

    box-shadow:var(--shadow-sm);

    cursor:pointer;

}

.location-icon{

    font-size:14px;

}

.location-text{

    font-size:13px;

    font-weight:600;

    color:var(--text-dark);

}

.dropdown-icon{

    color:var(--text-secondary);

}

/* =========================
   NOTIFICATION
========================= */

.notification{

    width:42px;
    height:42px;

    display:flex;

    justify-content:center;
    align-items:center;

    background:white;

    border:1px solid var(--border);

    border-radius:12px;

    box-shadow:var(--shadow-sm);

    cursor:pointer;

    font-size:18px;

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .brand-text{

        font-size:24px;

    }

    .location{

        padding:8px 12px;

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
                            
                            // Send coordinates to backend to make it connect (nyambung)
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
    
    // Automatically trigger on load
    getMyLocation();

    // Trigger on clicking location badge too
    const locationBtn = document.querySelector('.location');
    if (locationBtn) {
        locationBtn.addEventListener('click', function() {
            getMyLocation();
        });
    }
});
</script>