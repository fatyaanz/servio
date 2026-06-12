@extends('admin.layouts.app')

@section('content')

<div class="detail-page">

    <div class="page-header">

        <div>
            <h1>Detail Penyedia Layanan</h1>
            <p>Informasi lengkap penyedia layanan.</p>
        </div>

        <a
            href="{{ url('/admin/providers') }}"
            class="back-btn"
        >
            ← Kembali
        </a>

    </div>

    <div class="detail-card">

        <div class="profile-section">

            <div class="avatar">
                {{ strtoupper(substr($provider->name, 0, 2)) }}
            </div>

            <div>

                <h2>{{ $provider->name }}</h2>

                <p>{{ $provider->email }}</p>

                <span class="status">
                    {{ ucfirst($provider->status) }}
                </span>

            </div>

        </div>

        <div class="info-grid">

            <div class="info-box">
                <label>ID Provider</label>
                <span>{{ $provider->id }}</span>
            </div>

            <div class="info-box">
                <label>Tanggal Bergabung</label>
                <span>
                    {{ $provider->created_at ? $provider->created_at->format('d M Y') : '-' }}
                </span>
            </div>

        </div>

    </div>

    <div class="document-card">

        <h3>Dokumen Penyedia Layanan</h3>

        <div class="document-grid">

            @if($provider->ktp_file)
                <div class="document-card">
                    <h4>KTP</h4>

                    <img
                        src="{{ asset('storage/'.$provider->ktp_file) }}"
                        alt="KTP"
                        class="document-image"
                    >
                </div>
            @endif

            @if($provider->business_photo)
                <div class="document-card">
                    <h4>Foto Usaha</h4>

                    <img
                        src="{{ asset('storage/'.$provider->business_photo) }}"
                        alt="Foto Usaha"
                        class="document-image"
                    >
                </div>
            @endif

            @if($provider->business_certificate)
                <div class="document-card">
                    <h4>Sertifikat Usaha</h4>

                    <img
                        src="{{ asset('storage/'.$provider->business_certificate) }}"
                        alt="Sertifikat"
                        class="document-image"
                    >
                </div>
            @endif

        </div>

    </div>

</div>

<style>

.detail-page{
    padding:20px;
}

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:24px;
}

.page-header h1{
    font-size:32px;
    font-weight:700;
    margin-bottom:6px;
}

.page-header p{
    color:#64748b;
}

.back-btn{
    background:#ff7a00;
    color:white;
    text-decoration:none;
    padding:12px 18px;
    border-radius:12px;
    font-weight:600;
}

.detail-card,
.document-card{
    background:white;
    border-radius:24px;
    padding:24px;
    margin-bottom:24px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.profile-section{
    display:flex;
    align-items:center;
    gap:20px;
    margin-bottom:24px;
}

.avatar{
    width:90px;
    height:90px;
    border-radius:24px;
    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:30px;
    font-weight:700;
}

.status{
    display:inline-block;
    margin-top:8px;
    padding:6px 14px;
    border-radius:999px;
    background:#dcfce7;
    color:#16a34a;
    font-size:12px;
    font-weight:700;
}

.info-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:16px;
}

.info-box{
    background:#f8fafc;
    padding:16px;
    border-radius:16px;
}

.info-box label{
    display:block;
    color:#94a3b8;
    font-size:13px;
    margin-bottom:6px;
}

.info-box span{
    font-weight:600;
    color:#0f172a;
}

.document-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:16px;
    margin-top:20px;
}

.document-item{
    background:#fff4e8;
    color:#ff7a00;
    text-decoration:none;
    padding:18px;
    border-radius:16px;
    font-weight:600;
    transition:.3s;
}

.document-item:hover{
    background:#ff7a00;
    color:white;
}

.document-card{
    background:#fff;
    border-radius:16px;
    padding:16px;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
}

.document-image{
    width:100%;
    height:250px;
    object-fit:cover;
    border-radius:12px;
    margin-top:10px;
}

</style>

@endsection