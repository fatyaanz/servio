<div id="profileModal" class="profile-modal">

    <div class="profile-modal-content">

        <button
            class="close-profile"
            onclick="closeProfileModal()">
            ✕
        </button>

        <form
            action="{{ route('provider.profile.update') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="profile-header">

                <div class="profile-avatar">

                    <img
                        id="previewPhoto"
                        src="{{ Auth::user()->profile_photo
                            ? asset('storage/' . Auth::user()->profile_photo)
                            : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name)
                        }}">

                </div>

                <label class="upload-btn">

                    Ganti Foto

                    <input
                        type="file"
                        name="profile_photo"
                        accept="image/*"
                        onchange="previewProfile(event)"
                        hidden>

                </label>

            </div>

            <div class="profile-grid">

                <div class="form-group">

                    <label>Nama</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ Auth::user()->name }}">

                </div>

                <div class="form-group">

                    <label>Email</label>

                    <input
                        type="email"
                        value="{{ Auth::user()->email }}"
                        readonly>

                </div>

                <div class="form-group">

                    <label>No HP</label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ Auth::user()->phone }}">

                </div>

                <div class="form-group">

                    <label>Kota</label>

                    <input
                        type="text"
                        name="city"
                        value="{{ Auth::user()->city }}">

                </div>

            </div>

            <div class="profile-grid">

                <div class="form-group">

                    <label>Garansi</label>

                    <input
                        type="text"
                        name="warranty"
                        value="{{ Auth::user()->warranty }}"
                        placeholder="Contoh: 2 Bulan">

                </div>

                <div class="form-group">

                    <label>Pengalaman (Tahun)</label>

                    <input
                        type="number"
                        name="experience"
                        value="{{ Auth::user()->experience }}"
                        placeholder="Contoh: 5">

                </div>

            </div>

            <div class="form-group">

                <label>Lokasi Koordinat (Latitude, Longitude)</label>

                <div style="display: flex; gap: 10px; margin-bottom: 8px;">
                    <input
                        type="text"
                        name="latitude"
                        id="provider_latitude"
                        value="{{ Auth::user()->latitude }}"
                        placeholder="Latitude"
                        style="flex: 1;">
                    <input
                        type="text"
                        name="longitude"
                        id="provider_longitude"
                        value="{{ Auth::user()->longitude }}"
                        placeholder="Longitude"
                        style="flex: 1;">
                </div>

                <button
                    type="button"
                    class="location-btn"
                    onclick="getProviderLocation()"
                    style="background: #EEF4FF; color: #2563EB; border: none; padding: 12px; border-radius: 12px; cursor: pointer; font-weight: 600; width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px; transition: .25s ease;">
                    📍 Dapatkan Lokasi Saat Ini
                </button>

            </div>

            <div class="form-group">

                <label>Alamat</label>

                <textarea
                    name="address"
                    rows="3">{{ Auth::user()->address }}</textarea>

            </div>

            <div class="form-group">

                <label>Deskripsi Toko</label>

                <textarea
                    name="description"
                    rows="3"
                    placeholder="Masukkan deskripsi toko Anda...">{{ Auth::user()->description }}</textarea>

            </div>

            <button
                type="submit"
                class="save-profile-btn">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

<style>

.profile-modal{

    position:fixed;
    inset:0;

    background:rgba(0,0,0,.45);

    display:none;

    justify-content:center;
    align-items:flex-start;

    z-index:99999;

    backdrop-filter:blur(5px);

    overflow-y:auto;

    padding:40px 10px;

}

.profile-modal.show{
    display:flex;
}

.profile-modal-content{

    width:700px;
    max-width:95%;

    background:white;

    border-radius:28px;

    padding:30px;

    position:relative;

    margin:auto;

    max-height:calc(100vh - 80px);

    overflow-y:auto;

    animation:pop .25s ease;

}

@keyframes pop{

    from{
        transform:scale(.9);
        opacity:0;
    }

    to{
        transform:scale(1);
        opacity:1;
    }

}

.close-profile{

    position:absolute;

    right:20px;
    top:20px;

    border:none;

    width:35px;
    height:35px;

    border-radius:50%;

    cursor:pointer;

}

.profile-header{

    text-align:center;

    margin-bottom:30px;

}

.profile-avatar img{

    width:120px;
    height:120px;

    border-radius:50%;

    object-fit:cover;

    border:5px solid #fff7ed;

}

.upload-btn{

    display:inline-block;

    margin-top:15px;

    background:#ff7a00;

    color:white;

    padding:10px 20px;

    border-radius:12px;

    cursor:pointer;

}

.profile-grid{

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:18px;

}

.form-group{

    display:flex;
    flex-direction:column;

    margin-bottom:16px;

}

.form-group label{

    margin-bottom:8px;

    font-weight:600;

}

.form-group input,
.form-group textarea{

    padding:13px;

    border:1px solid #ddd;

    border-radius:12px;

}

.save-profile-btn{

    width:100%;

    margin-top:15px;

    border:none;

    background:#ff7a00;

    color:white;

    padding:15px;

    border-radius:14px;

    font-weight:700;

    cursor:pointer;

}

</style>
<script>

function openProfileModal() {

    const modal =
        document.getElementById('profileModal');

    modal.classList.add('show');

}

function closeProfileModal() {

    const modal =
        document.getElementById('profileModal');

    modal.classList.remove('show');

}

window.onclick = function(event) {

    const modal =
        document.getElementById('profileModal');

    if(event.target === modal){

        modal.classList.remove('show');

    }

}

function previewProfile(event) {

    const file =
        event.target.files[0];

    if(!file) return;

    const reader =
        new FileReader();

    reader.onload = function(e){

        document
            .getElementById('previewPhoto')
            .src = e.target.result;

    }

    reader.readAsDataURL(file);

}

function getProviderLocation() {
    if (navigator.geolocation) {
        const btn = document.querySelector('.profile-modal-content .location-btn');
        const originalText = btn.innerHTML;
        btn.innerHTML = '🔄 Mengambil Lokasi...';
        btn.disabled = true;

        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById('provider_latitude').value = position.coords.latitude.toFixed(8);
            document.getElementById('provider_longitude').value = position.coords.longitude.toFixed(8);
            btn.innerHTML = originalText;
            btn.disabled = false;
            alert('Lokasi berhasil didapatkan: ' + position.coords.latitude + ', ' + position.coords.longitude);
        }, function(error) {
            btn.innerHTML = originalText;
            btn.disabled = false;
            alert('Gagal mengambil lokasi: ' + error.message);
        }, {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        });
    } else {
        alert('Geolocation tidak didukung oleh browser ini.');
    }
}

</script>