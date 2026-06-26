<div class="modal-overlay" id="addAddressModal">
    <div class="modal-card" style="max-height: 90vh; overflow-y: auto; max-width: 650px;">
        <div class="modal-header">
            <h2 id="addressModalTitle">Tambah Alamat Baru</h2>
            <button class="close-modal" onclick="closeAddAddressModal()">✕</button>
        </div>

        <form id="addressForm" action="{{ route('profile.address.store') }}" method="POST" class="add-address-form">
            @csrf
            
            <!-- Label Alamat -->
            <div class="form-group">
                <label for="address_label">Label Alamat <span style="color: #DC2626;">*</span></label>
                <input type="text" id="address_label" name="label" required placeholder="Contoh: Rumah, Kantor, Toko">
            </div>

            <!-- Nama Penerima -->
            <div class="form-group">
                <label for="address_receiver_name">Nama Penerima <span style="color: #DC2626;">*</span></label>
                <input type="text" id="address_receiver_name" name="receiver_name" required placeholder="Masukkan nama penerima">
            </div>

            <!-- Nomor Telepon -->
            <div class="form-group">
                <label for="address_phone">Nomor Telepon <span style="color: #DC2626;">*</span></label>
                <input type="text" id="address_phone" name="phone" required placeholder="Contoh: 08xxxxxxxxxx">
            </div>

            <!-- Search Address on Map -->
            <div class="form-group">
                <label for="address_map_search">Cari Alamat di Peta</label>
                <div style="display: flex; gap: 8px;">
                    <input type="text" id="address_map_search" placeholder="Cari jalan, gedung, kota..." style="flex: 1; height: 44px; border: 1px solid #E5E7EB; border-radius: 12px; padding: 0 14px; font-size: 13px; font-weight: 500; outline: none; box-sizing: border-box;">
                    <button type="button" onclick="searchAddressOnMap()" style="background: #F08A28; color: white; border: none; border-radius: 12px; padding: 0 18px; font-weight: 700; cursor: pointer; transition: 0.2s; font-size: 13px;">Cari</button>
                </div>
            </div>

            <!-- Coordinates Picker (Map) -->
            <div style="margin-bottom: 18px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <label style="font-size: 14px; font-weight: 700; color: #333; margin: 0;">Lokasi Peta <span style="color: #DC2626;">*</span></label>
                    <button type="button" onclick="getCurrentGPSLocation()" style="background: #E8F4FF; color: #2196F3; border: 1px solid #C4E3FF; padding: 6px 12px; border-radius: 10px; font-weight: 600; cursor: pointer; font-size: 11px; display: inline-flex; align-items: center; gap: 4px;">
                        📍 GPS Saat Ini
                    </button>
                </div>
                <p style="margin: 0 0 8px; font-size: 12px; color: #888;">Klik peta atau geser penanda (marker) untuk menyesuaikan koordinat Anda.</p>
                <div id="profile-address-map" style="height: 230px; border-radius: 14px; border: 1px solid #E5E7EB; z-index: 5;"></div>
            </div>

            <!-- Hidden Inputs for Lat/Lon -->
            <input type="hidden" name="latitude" id="address_latitude">
            <input type="hidden" name="longitude" id="address_longitude">

            <!-- Alamat Lengkap (Textarea) -->
            <div class="form-group">
                <label for="address_text">Alamat Lengkap & Detail <span style="color: #DC2626;">*</span></label>
                <textarea id="address_text" name="address_text" required placeholder="Masukkan alamat lengkap (jalan, nomor rumah, RT/RW, kelurahan/kecamatan)"></textarea>
            </div>

            <!-- Primary Switch -->
            <div class="form-group checkbox-group" style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
                <input type="checkbox" name="is_primary" id="address_is_primary" value="1" style="width: 18px; height: 18px; accent-color: #F08A28; cursor: pointer; margin: 0;">
                <label for="address_is_primary" style="font-weight: 600; color: #444; font-size: 13px; cursor: pointer; margin: 0; user-select: none;">Jadikan Alamat Utama</label>
            </div>

            <div class="modal-actions">
                <button type="button" class="cancel-btn" onclick="closeAddAddressModal()">Batal</button>
                <button type="submit" class="save-btn" id="addressSubmitButton">Simpan Alamat</button>
            </div>
        </form>
    </div>
</div>

<style>
.add-address-form .form-group {
    margin-bottom: 16px;
    text-align: left;
}

.add-address-form .form-group label {
    display: block;
    font-size: 14px;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
}

.add-address-form .form-group input[type="text"] {
    width: 100%;
    height: 48px;
    border: 1px solid #E5E7EB;
    border-radius: 14px;
    padding: 0 16px;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    box-sizing: border-box;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
}

.add-address-form .form-group input[type="text"]:focus {
    border-color: #F08A28;
    box-shadow: 0 0 0 4px rgba(240, 138, 40, 0.08);
}

.add-address-form textarea {
    width: 100%;
    min-height: 80px;
    padding: 14px;
    border-radius: 14px;
    border: 1px solid #E5E7EB;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    box-sizing: border-box;
    outline: none;
    resize: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.add-address-form textarea:focus {
    border-color: #F08A28;
    box-shadow: 0 0 0 4px rgba(240, 138, 40, 0.08);
}
</style>

<script>
let profileMap = null;
let profileMarker = null;

// Telkom University coordinates as default
const defaultLat = -6.9740;
const defaultLon = 107.6303;

function initProfileMap() {
    if (profileMap) return;

    // Initialize Leaflet Map
    profileMap = L.map('profile-address-map').setView([defaultLat, defaultLon], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(profileMap);

    // Create dragable marker
    profileMarker = L.marker([defaultLat, defaultLon], {
        draggable: true
    }).addTo(profileMap);

    // Drag event
    profileMarker.on('dragend', function() {
        const position = profileMarker.getLatLng();
        updateFormCoords(position.lat, position.lng, true);
    });

    // Map click event
    profileMap.on('click', function(e) {
        updateFormCoords(e.latlng.lat, e.latlng.lng, true);
    });
}

function updateFormCoords(lat, lon, fetchAddress = true) {
    document.getElementById('address_latitude').value = lat.toFixed(8);
    document.getElementById('address_longitude').value = lon.toFixed(8);
    
    if (profileMarker) {
        profileMarker.setLatLng([lat, lon]);
    }
    
    if (profileMap) {
        profileMap.panTo([lat, lon]);
    }

    if (fetchAddress) {
        reverseGeocodeAddress(lat, lon);
    }
}

async function reverseGeocodeAddress(lat, lon) {
    try {
        const res = await fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`);
        const data = await res.json();
        if (data && data.display_name) {
            document.getElementById('address_text').value = data.display_name;
        }
    } catch (error) {
        console.error("Gagal mendapatkan alamat dari koordinat:", error);
    }
}

async function searchAddressOnMap() {
    const query = document.getElementById('address_map_search').value;
    if (!query) {
        alert("Silakan masukkan kata kunci pencarian alamat.");
        return;
    }

    try {
        const res = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`);
        const results = await res.json();
        if (results && results.length > 0) {
            const firstResult = results[0];
            const lat = parseFloat(firstResult.lat);
            const lon = parseFloat(firstResult.lon);
            
            updateFormCoords(lat, lon, false);
            document.getElementById('address_text').value = firstResult.display_name;
            
            if (profileMap) {
                profileMap.setView([lat, lon], 16);
            }
        } else {
            alert("Alamat tidak ditemukan. Silakan masukkan kata kunci yang lebih spesifik.");
        }
    } catch (error) {
        console.error("Gagal mencari alamat:", error);
        alert("Terjadi kesalahan saat mencari alamat.");
    }
}

function getCurrentGPSLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                updateFormCoords(lat, lon, true);
                if (profileMap) {
                    profileMap.setView([lat, lon], 16);
                }
            },
            function(error) {
                alert("Gagal mendapatkan koordinat GPS. Pastikan izin lokasi browser Anda aktif.");
            }
        );
    } else {
        alert("Browser Anda tidak mendukung Geolocation.");
    }
}

function openAddAddressModal() {
    // Hide parent address modal if open
    closeAddressModal();

    // Reset Form to defaults
    document.getElementById('addressForm').reset();
    document.getElementById('addressForm').action = "{{ route('profile.address.store') }}";
    document.getElementById('addressModalTitle').innerText = "Tambah Alamat Baru";
    document.getElementById('addressSubmitButton').innerText = "Simpan Alamat";
    
    // Set default coordinates
    document.getElementById('address_latitude').value = defaultLat;
    document.getElementById('address_longitude').value = defaultLon;

    // Show modal
    document.getElementById('addAddressModal').classList.add('active');

    // Init & reset map
    setTimeout(function() {
        initProfileMap();
        if (profileMap) {
            profileMap.invalidateSize();
            updateFormCoords(defaultLat, defaultLon, false);
        }
    }, 100);
}

function closeAddAddressModal() {
    document.getElementById('addAddressModal').classList.remove('active');
    openAddressModal();
}

function prepareEditAddress(addr) {
    // Close lists modal
    closeAddressModal();

    // Populate Fields
    document.getElementById('address_label').value = addr.label;
    document.getElementById('address_receiver_name').value = addr.receiver_name;
    document.getElementById('address_phone').value = addr.phone;
    document.getElementById('address_text').value = addr.address_text;
    
    const lat = parseFloat(addr.latitude) || defaultLat;
    const lon = parseFloat(addr.longitude) || defaultLon;
    document.getElementById('address_latitude').value = lat;
    document.getElementById('address_longitude').value = lon;

    document.getElementById('address_is_primary').checked = addr.is_primary ? true : false;

    // Set edit route dynamically
    const editUrl = "{{ url('/profile/address') }}/" + addr.id + "/update";
    document.getElementById('addressForm').action = editUrl;
    document.getElementById('addressModalTitle').innerText = "Edit Alamat";
    document.getElementById('addressSubmitButton').innerText = "Perbarui Alamat";

    // Show modal
    document.getElementById('addAddressModal').classList.add('active');

    // Init and adjust map
    setTimeout(function() {
        initProfileMap();
        if (profileMap) {
            profileMap.invalidateSize();
            updateFormCoords(lat, lon, false);
            profileMap.setView([lat, lon], 16);
        }
    }, 100);
}
</script>