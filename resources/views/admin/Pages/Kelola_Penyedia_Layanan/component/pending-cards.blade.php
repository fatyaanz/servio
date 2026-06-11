<div class="pending-wrapper">

    @if($pendingProviders->isEmpty())

        <div class="empty-card">

            <i class='bx bx-check-shield'></i>

            <h3>
                Tidak Ada Provider Pending
            </h3>

            <p>
                Semua penyedia layanan sudah diverifikasi.
            </p>

        </div>

    @else

        @foreach($pendingProviders as $provider)

        <div class="pending-card">

            <div class="pending-top">

                <div class="pending-provider">

                    <div class="pending-avatar">
                        {{ strtoupper(substr($provider->name,0,2)) }}
                    </div>

                    <div>

                        <h3>
                            {{ $provider->name }}
                        </h3>

                        <p>
                            Provider Servio
                        </p>

                        <span>
                            Diajukan {{ $provider->created_at->diffForHumans() }}
                        </span>

                    </div>

                </div>

                <div class="pending-badge">
                    Menunggu Review
                </div>

            </div>

            <div class="pending-content">

                Penyedia layanan sedang menunggu
                persetujuan admin sebelum tampil
                kepada pelanggan.

            </div>

            <div class="document-box">

                <div class="document-title">
                    Informasi Provider
                </div>

                <div class="document-list">

                    <div class="document-item">

                        <strong>KTP</strong>

                        @if($provider->ktp_file)

                            <a
                                href="{{ asset('storage/' . $provider->ktp_file) }}"
                                target="_blank"
                            >
                                Lihat Dokumen
                            </a>

                        @else

                            <span>Tidak ada dokumen</span>

                        @endif

                    </div>

                    <div class="document-item">

                        <strong>Foto Usaha</strong>

                        @if($provider->business_photo)

                            <a
                                href="{{ asset('storage/' . $provider->business_photo) }}"
                                target="_blank"
                            >
                                Lihat Foto
                            </a>

                        @else

                            <span>Tidak ada foto</span>

                        @endif

                    </div>

                    <div class="document-item">

                        <strong>Sertifikat</strong>

                        @if($provider->business_certificate)

                            <a
                                href="{{ asset('storage/' . $provider->business_certificate) }}"
                                target="_blank"
                            >
                                Lihat Sertifikat
                            </a>

                        @else

                            <span>Tidak ada sertifikat</span>

                        @endif

                    </div>

                </div>

            </div>

            <div class="pending-actions">

                <form
                    action="{{ route('admin.providers.approve', $provider->id) }}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    <button
                        type="submit"
                        class="approve-btn"
                    >
                        Approve Provider
                    </button>

                </form>

                <button
                    class="reject-btn"
                    onclick="openRejectModal({{ $provider->id }})"
                >
                    Tolak
                </button>

            </div>

        </div>

        @endforeach

    @endif

</div>

<style>

/* =========================
    EMPTY STATE
========================= */

.empty-card{

    grid-column:1 / -1;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:80px 24px;

    text-align:center;

    box-shadow:var(--shadow-sm);

}

.empty-card i{

    font-size:72px;

    color:#22c55e;

    margin-bottom:16px;

}

.empty-card h3{

    font-size:20px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:8px;

}

.empty-card p{

    color:var(--text-secondary);

}

/* =========================
    WRAPPER
========================= */

.pending-wrapper{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(340px,1fr));

    gap:24px;

    margin-top:20px;

}

/* =========================
    CARD
========================= */

.pending-card{

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:20px;

    box-shadow:var(--shadow-sm);

    transition:.3s;

}

.pending-card:hover{

    transform:translateY(-3px);

}

/* =========================
    TOP
========================= */

.pending-top{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:16px;

    margin-bottom:18px;

}

.pending-provider{

    display:flex;

    align-items:center;

    gap:14px;

}

/* =========================
    AVATAR
========================= */

.pending-avatar{

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    display:flex;

    justify-content:center;
    align-items:center;

    color:white;

    font-size:16px;
    font-weight:700;

    flex-shrink:0;

}

/* =========================
    PROVIDER INFO
========================= */

.pending-provider h3{

    font-size:16px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:4px;

}

.pending-provider p{

    font-size:13px;

    color:var(--text-secondary);

    margin-bottom:4px;

}

.pending-provider span{

    font-size:12px;

    color:var(--text-secondary);

}

/* =========================
    BADGE
========================= */

.pending-badge{

    background:#FFF4E6;

    color:var(--primary);

    padding:6px 12px;

    border-radius:999px;

    font-size:12px;
    font-weight:600;

}

/* =========================
    CONTENT
========================= */

.pending-content{

    background:#FAFAFA;

    border:1px solid #F3F4F6;

    border-radius:16px;

    padding:14px;

    font-size:14px;

    color:var(--text-secondary);

    line-height:1.6;

    margin-bottom:18px;

}

/* =========================
    DOCUMENT BOX
========================= */

.document-box{

    background:#FAFAFA;

    border:1px solid #F3F4F6;

    border-radius:16px;

    padding:16px;

    margin-bottom:20px;

}

.document-title{

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:12px;

}

.document-list{

    display:flex;

    flex-direction:column;

    gap:10px;

}

.document-item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    background:white;

    border:1px solid #F3F4F6;

    border-radius:12px;

    padding:12px;

    font-size:13px;

}

.document-item a{

    color:var(--primary);

    font-weight:600;

    text-decoration:none;

}

/* =========================
    ACTIONS
========================= */

.pending-actions{

    display:flex;

    gap:12px;

}

.pending-actions form{

    flex:1;

    margin:0;

}

.approve-btn{

    width:100%;

    padding:12px;

    border:none;

    border-radius:12px;

    background:linear-gradient(
        135deg,
        #22c55e,
        #16a34a
    );

    color:white;

    font-weight:600;

    cursor:pointer;

}

.reject-btn{

    flex:1;

    padding:12px;

    border-radius:12px;

    border:1px solid #fecaca;

    background:white;

    color:#ef4444;

    font-weight:600;

    cursor:pointer;

}

.reject-btn:hover{

    background:#ef4444;

    color:white;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .pending-top{
        flex-direction:column;
    }

    .pending-actions{
        flex-direction:column;
    }

}

</style>