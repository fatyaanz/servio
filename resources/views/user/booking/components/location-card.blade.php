<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<div class="booking-card">

    <div class="card-title">
        Lokasi Pengerjaan
    </div>

    <div style="display: flex; gap: 10px; margin-bottom: 15px; flex-wrap: wrap;">
        <button type="button" id="btnUseProfileAddress" style="background: #FFF7EE; color: #F08A28; border: 1px solid #FFE0BE; padding: 10px 18px; border-radius: 12px; font-weight: 600; cursor: pointer; font-size: 13px; transition: 0.2s;">
            📋 Gunakan Alamat Profil
        </button>
        <button type="button" id="btnUseGPS" style="background: #E8F4FF; color: #2196F3; border: 1px solid #C4E3FF; padding: 10px 18px; border-radius: 12px; font-weight: 600; cursor: pointer; font-size: 13px; transition: 0.2s;">
            📍 Gunakan GPS Saat Ini
        </button>
    </div>

    <div class="form-group">

        <label>
            Alamat Lengkap <span style="color: red;">*</span>
        </label>

        <textarea
            id="booking_address"
            name="address"
            rows="4"
            class="booking-input"
            placeholder="Masukkan alamat lengkap lokasi pengerjaan"
            required
        ></textarea>

    </div>

    <input type="hidden" name="latitude" id="booking_latitude" value="{{ old('latitude') }}">
    <input type="hidden" name="longitude" id="booking_longitude" value="{{ old('longitude') }}">

    <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 700; color: #333;">
            Pilih Lokasi di Peta
        </label>
        <p style="margin: 0 0 10px; font-size: 12px; color: #888;">Geser penanda (marker) atau klik peta untuk menetapkan koordinat lokasi Anda secara presisi.</p>
        <div id="booking-map" style="height: 280px; border-radius: 18px; border: 1px solid #E5E5E5; z-index: 5;"></div>
    </div>

    <div class="form-group">

        <label>
            Catatan Lokasi (Opsional)
        </label>

        <textarea
            name="location_note"
            rows="3"
            class="booking-input"
            placeholder="Contoh: pagar hitam, rumah cat putih, dekat minimarket"
        ></textarea>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Coords values
    const latInput = document.getElementById('booking_latitude');
    const lonInput = document.getElementById('booking_longitude');
    const addressInput = document.getElementById('booking_address');

    // Default coords (Telkom University / Sukapura area)
    let defaultLat = -6.9740;
    let defaultLon = 107.6303;

    // Use auth user's coords if available
    const userLat = parseFloat("{{ auth()->user()->latitude }}");
    const userLon = parseFloat("{{ auth()->user()->longitude }}");
    const userAddress = `{!! addslashes(auth()->user()->address) !!}`;

    if (!isNaN(userLat) && !isNaN(userLon) && userLat !== 0 && userLon !== 0) {
        defaultLat = userLat;
        defaultLon = userLon;
        latInput.value = userLat;
        lonInput.value = userLon;
    }

    // Initialize map
    const map = L.map('booking-map').setView([defaultLat, defaultLon], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Create marker
    const marker = L.marker([defaultLat, defaultLon], {
        draggable: true
    }).addTo(map);

    // Function to handle reverse geocoding
    async function reverseGeocode(lat, lon) {
        try {
            const res = await fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`);
            const data = await res.json();
            if (data && data.display_name) {
                addressInput.value = data.display_name;
            }
        } catch (error) {
            console.error("Gagal mendapatkan alamat:", error);
        }
    }

    // Function to update coordinates on form and move marker
    function updateCoords(lat, lon, fetchAddress = true) {
        latInput.value = lat.toFixed(8);
        lonInput.value = lon.toFixed(8);
        marker.setLatLng([lat, lon]);
        map.panTo([lat, lon]);
        if (fetchAddress) {
            reverseGeocode(lat, lon);
        }
    }

    // Drag marker event
    marker.on('dragend', function(e) {
        const latLng = marker.getLatLng();
        updateCoords(latLng.lat, latLng.lng, true);
    });

    // Click map event
    map.on('click', function(e) {
        updateCoords(e.latlng.lat, e.latlng.lng, true);
    });

    // Gunakan Alamat Profil button
    document.getElementById('btnUseProfileAddress').addEventListener('click', function() {
        if (userAddress) {
            addressInput.value = userAddress;
            if (!isNaN(userLat) && !isNaN(userLon) && userLat !== 0 && userLon !== 0) {
                updateCoords(userLat, userLon, false);
            }
        } else {
            alert("Alamat profil Anda masih kosong. Silakan lengkapi profil terlebih dahulu.");
        }
    });

    // Gunakan GPS button
    document.getElementById('btnUseGPS').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    updateCoords(lat, lon, true);
                },
                function(error) {
                    alert("Gagal mendapatkan lokasi Anda. Pastikan izin lokasi browser aktif.");
                }
            );
        } else {
            alert("Browser Anda tidak mendukung Geolocation.");
        }
    });
});
</script>

<style>

.booking-card{

    max-width:1000px;

    margin:0 auto 25px;

    padding:25px;

    background:white;

    border-radius:24px;

    box-shadow:
        0 8px 20px rgba(0,0,0,.05);
}

/* =========================
   TITLE
========================= */

.card-title{

    font-size:22px;
    font-weight:700;

    color:#222;

    margin-bottom:20px;
}

/* =========================
   LOCATION
========================= */

.location-content{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;
}

.location-left{

    display:flex;

    align-items:flex-start;

    gap:15px;
}

.location-icon{

    font-size:24px;
}

.location-detail h4{

    margin:0;

    font-size:18px;
    font-weight:600;

    color:#222;
}

.location-detail p{

    margin-top:6px;

    color:#777;

    line-height:1.6;

    font-size:14px;
}

/* =========================
   BUTTON
========================= */

.edit-btn{

    border:none;

    background:#F08A28;

    color:white;

    padding:10px 20px;

    border-radius:999px;

    cursor:pointer;

    font-weight:600;
}

.edit-btn:hover{

    background:#E67C14;
}

/* =========================
   NOTE
========================= */

.note-box{

    margin-top:20px;

    background:#F8F8F8;

    border-radius:14px;

    padding:15px;
}

.note-title{

    display:block;

    font-size:12px;

    color:#888;

    margin-bottom:8px;
}

.note-box p{

    margin:0;

    color:#444;

    font-size:14px;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{

    display:block;

    margin-bottom:10px;

    font-size:14px;
    font-weight:700;

    color:#333;
}

.booking-input{

    width:100%;

    padding:14px;

    border:1px solid #E5E5E5;

    border-radius:14px;

    resize:none;

    font-size:14px;

    outline:none;

    transition:.3s;
}

.booking-input:focus{

    border-color:#F08A28;

    box-shadow:
        0 0 0 4px rgba(240,138,40,.08);
}
/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .location-content{

        flex-direction:column;

        align-items:flex-start;
    }

    .edit-btn{

        width:100%;
    }

}

</style>