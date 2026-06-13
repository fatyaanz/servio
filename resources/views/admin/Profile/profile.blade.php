@extends('admin.Layouts.app')

@section('content')

<div class="profile-page">

    <div class="page-header">
        <h1>Profile Admin</h1>
        <p>Kelola informasi akun administrator Servio.</p>
    </div>

    {{-- SUCCESS / ERROR ALERTS --}}
    @if(session('success'))
        <div class="alert-success">✅ {{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert-error">❌ {{ $errors->first() }}</div>
    @endif

    <div class="profile-container">

        {{-- FOTO PROFIL --}}
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

                <div class="admin-info-summary">
                    <h3>{{ Auth::user()->name }}</h3>
                    <p>{{ Auth::user()->email }}</p>
                    <span class="role-badge">Administrator</span>

                    {{-- SALDO ADMIN --}}
                    <div class="balance-card">
                        <span class="balance-label">💰 Total Revenue ServioPay</span>
                        <h2 class="balance-amount">Rp{{ number_format(Auth::user()->balance ?? 0, 0, ',', '.') }}</h2>
                        <a href="{{ route('admin.revenue') }}" class="view-ledger-btn">📊 Lihat Ledger</a>
                    </div>
                </div>

            </div>

        </div>

        {{-- FORM PROFIL --}}
        <div class="profile-card">

            <form
                action="{{ route('admin.profile.update') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                {{-- UPLOAD FOTO (hidden, attached to form) --}}
                <input
                    type="file"
                    name="profile_photo"
                    id="profile-photo"
                    accept="image/*"
                    hidden
                    onchange="previewAdminPhoto(event)">

                <div style="text-align:center; margin-bottom:25px;">
                    <button type="button" class="upload-btn" onclick="document.getElementById('profile-photo').click()">
                        📷 Ubah Foto Profil
                    </button>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ Auth::user()->name }}"
                        required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        value="{{ Auth::user()->email }}"
                        readonly
                        style="background:#f9f9f9; color:#999;">
                    <small style="color:#aaa; font-size:12px;">Email tidak dapat diubah.</small>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ Auth::user()->phone }}"
                        placeholder="Masukkan nomor telepon">
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <input
                        type="text"
                        value="Administrator"
                        readonly
                        style="background:#f9f9f9; color:#999;">
                </div>

                <hr>

                <h3 class="section-title">🔒 Ubah Password</h3>

                <div class="form-group">
                    <label>Password Lama</label>
                    <input
                        type="password"
                        name="current_password"
                        placeholder="Masukkan password lama (kosongkan jika tidak ingin ubah)">
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password baru">
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Konfirmasi password baru">
                </div>

                <div class="button-group">

                    <button type="submit" class="save-btn">
                        💾 Simpan Perubahan
                    </button>

                    <button type="reset" class="cancel-btn">
                        Batal
                    </button>

                </div>

            </form>

            {{-- LOGOUT --}}
            <hr style="margin-top:30px;">
            <form action="{{ route('logout') }}" method="POST" style="margin-top:20px;">
                @csrf
                <button type="submit" class="logout-admin-btn">🚪 Logout dari Akun Admin</button>
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

.alert-success{
    background:#DCFCE7;
    color:#15803D;
    padding:14px 20px;
    border-radius:14px;
    font-weight:600;
    margin-bottom:20px;
}

.alert-error{
    background:#FEE2E2;
    color:#DC2626;
    padding:14px 20px;
    border-radius:14px;
    font-weight:600;
    margin-bottom:20px;
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
    gap:20px;
}

.profile-photo-wrapper{
    width:140px;
    height:140px;
    border-radius:50%;
    overflow:hidden;
    border:5px solid #fff3e5;
    box-shadow:0 8px 20px rgba(255,138,0,0.15);
}

.profile-photo-wrapper img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.admin-info-summary{
    text-align:center;
    width:100%;
}

.admin-info-summary h3{
    font-size:20px;
    font-weight:800;
    color:#222;
    margin:0 0 5px;
}

.admin-info-summary p{
    color:#888;
    font-size:14px;
    margin:0 0 12px;
}

.role-badge{
    display:inline-block;
    background:#FFF3E0;
    color:#ff8a00;
    padding:5px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    border:1px solid rgba(255,138,0,0.15);
}

.balance-card{
    margin-top:20px;
    padding:18px;
    background:linear-gradient(135deg, #fff8f0, #fff3e4);
    border-radius:18px;
    border:1px solid rgba(255,138,0,0.15);
}

.balance-label{
    font-size:12px;
    color:#888;
    font-weight:600;
}

.balance-amount{
    font-size:24px;
    font-weight:800;
    color:#ff8a00;
    margin:8px 0;
}

.view-ledger-btn{
    display:inline-block;
    background:#ff8a00;
    color:white;
    padding:8px 16px;
    border-radius:10px;
    font-size:12px;
    font-weight:700;
    text-decoration:none;
    transition:.2s;
}

.view-ledger-btn:hover{
    background:#ff7400;
}

.upload-btn{
    border:none;
    background:#ff8a00;
    color:white;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
    transition:.2s;
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
    box-sizing:border-box;
    transition:.2s;
}

.form-group input:focus{
    outline:none;
    border-color:#ff8a00;
    box-shadow:0 0 0 3px rgba(255,138,0,0.1);
}

.section-title{
    margin-top:25px;
    margin-bottom:20px;
    color:#1e293b;
    font-size:18px;
}

.button-group{
    margin-top:25px;
    display:flex;
    gap:15px;
}

.save-btn{
    background:linear-gradient(135deg, #ff8a00, #ff6b00);
    color:white;
    border:none;
    padding:14px 24px;
    border-radius:12px;
    cursor:pointer;
    font-weight:700;
    flex:2;
    transition:.2s;
}

.save-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(255,138,0,0.3);
}

.cancel-btn{
    background:#f1f5f9;
    border:none;
    padding:14px 24px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
    flex:1;
}

.cancel-btn:hover{
    background:#e2e8f0;
}

.logout-admin-btn{
    width:100%;
    padding:14px;
    background:#FEE2E2;
    color:#DC2626;
    border:none;
    border-radius:12px;
    font-weight:700;
    cursor:pointer;
    font-size:15px;
    transition:.2s;
}

.logout-admin-btn:hover{
    background:#FECACA;
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
function previewAdminPhoto(event) {
    const file = event.target.files[0];
    if (file) {
        document.getElementById('preview-image').src = URL.createObjectURL(file);
    }
}
</script>

@endsection