@extends('admin.Layouts.app')

@section('content')

<div class="profile-page">

    <div class="page-header">
        <h1>Profile Admin</h1>
        <p>Kelola informasi akun administrator Servio.</p>
    </div>

    <div class="profile-container">

        <!-- FOTO PROFIL -->
        <div class="profile-card">

            <div class="profile-photo-section">

                <div class="profile-photo-wrapper">

                    <img
                    id="preview-image"
                    src="{{ Auth::user()->profile_photo
                        ? asset('storage/' . Auth::user()->profile_photo)
                        : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=ff8a00&color=fff' }}"
                    alt="Profile">

                </div>

                <input
                    type="file"
                    name="profile_photo"
                    id="profile-photo"
                    accept="image/*"
                    hidden>

                <button
                    type="button"
                    class="upload-btn"
                    onclick="document.getElementById('profile-photo').click()">

                    Upload Foto

                </button>

            </div>

        </div>

        <!-- FORM PROFIL -->
        <div class="profile-card">

            <form
            action="{{ route('admin.profile.update') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input
                        type="text"
                        value="Admin Servio">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        value="admin@servio.com">
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input
                        type="text"
                        value="081234567890">
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <input
                        type="text"
                        value="Administrator"
                        readonly>
                </div>

                <hr>

                <h3 class="section-title">
                    Ubah Password
                </h3>

                <div class="form-group">
                    <label>Password Lama</label>
                    <input
                        type="password"
                        placeholder="Masukkan password lama">
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input
                        type="password"
                        placeholder="Masukkan password baru">
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input
                        type="password"
                        placeholder="Konfirmasi password baru">
                </div>

                <div class="button-group">

                    <button
                        type="submit"
                        class="save-btn">

                        Simpan Perubahan

                    </button>

                    <button
                        type="reset"
                        class="cancel-btn">

                        Batal

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<style>

.profile-page{
    padding:30px;
}

.page-header h1{
    color:#ff7b00;
    font-size:42px;
    font-weight:700;
}

.page-header p{
    color:#7b8497;
    margin-top:8px;
    margin-bottom:30px;
}

.profile-container{
    display:grid;
    grid-template-columns:320px 1fr;
    gap:25px;
}

.profile-card{
    background:#fff;
    border-radius:25px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.profile-photo-section{
    display:flex;
    flex-direction:column;
    align-items:center;
}

.profile-photo-wrapper{
    width:180px;
    height:180px;
    border-radius:50%;
    overflow:hidden;
    border:6px solid #fff3e5;
}

.profile-photo-wrapper img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.upload-btn{
    margin-top:20px;
    border:none;
    background:#ff8a00;
    color:white;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
}

.upload-btn:hover{
    background:#ff7400;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#1e293b;
}

.form-group input{
    width:100%;
    padding:14px;
    border:1px solid #e5e7eb;
    border-radius:12px;
    font-size:15px;
}

.form-group input:focus{
    outline:none;
    border-color:#ff8a00;
}

.section-title{
    margin-top:25px;
    margin-bottom:20px;
    color:#1e293b;
}

.button-group{
    margin-top:25px;
    display:flex;
    gap:15px;
}

.save-btn{
    background:#ff8a00;
    color:white;
    border:none;
    padding:14px 24px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
}

.save-btn:hover{
    background:#ff7400;
}

.cancel-btn{
    background:#f1f5f9;
    border:none;
    padding:14px 24px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
}

.cancel-btn:hover{
    background:#e2e8f0;
}

hr{
    margin:25px 0;
    border:none;
    border-top:1px solid #e5e7eb;
}

@media(max-width:900px){

    .profile-container{
        grid-template-columns:1fr;
    }

}

</style>

<script>

document
.getElementById('profile-photo')
.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        document
        .getElementById('preview-image')
        .src = URL.createObjectURL(file);

    }

});

</script>

@endsection