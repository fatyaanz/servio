<div class="pending-wrapper">

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
                📄 Informasi Provider
            </div>

            <div class="document-list">

                {{-- KTP --}}
                <div class="document-item">

                    KTP :

                    @if($provider->ktp_file)

                        <a
                            href="{{ asset('storage/' . $provider->ktp_file) }}"
                            target="_blank"
                        >
                            Lihat Dokumen
                        </a>

                    @else

                        Tidak ada dokumen

                    @endif

                </div>

                {{-- FOTO USAHA --}}
                <div class="document-item">

                    Foto Usaha :

                    @if($provider->business_photo)

                        <a
                            href="{{ asset('storage/' . $provider->business_photo) }}"
                            target="_blank"
                        >
                            Lihat Foto
                        </a>

                    @else

                        Tidak ada foto

                    @endif

                </div>

                {{-- SERTIFIKAT --}}
                <div class="document-item">

                    Sertifikat :

                    @if($provider->business_certificate)

                        <a
                            href="{{ asset('storage/' . $provider->business_certificate) }}"
                            target="_blank"
                        >
                            Lihat Sertifikat
                        </a>

                    @else

                        Tidak ada sertifikat

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

</div>

<style>
    /* =========================
   PENDING PROVIDER SECTION
========================= */

.pending-wrapper{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(340px,1fr));
    gap: 24px;
    margin-top: 20px;
}

/* CARD */
.pending-card{
    background: #ffffff;
    border-radius: 24px;
    padding: 24px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    border: 1px solid #f1f1f1;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.pending-card::before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(
        90deg,
        #ffb347,
        #ffcc33
    );
}

.pending-card:hover{
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.12);
}

/* TOP */
.pending-top{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 20px;
}

.pending-provider{
    display: flex;
    align-items: center;
    gap: 14px;
}

/* AVATAR */
.pending-avatar{
    width: 62px;
    height: 62px;
    border-radius: 50%;
    background: linear-gradient(
        135deg,
        #ffb347,
        #ffcc33
    );
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    font-weight: 700;
    box-shadow: 0 6px 18px rgba(255, 179, 71, 0.4);
}

/* TEXT */
.pending-provider h3{
    margin: 0;
    font-size: 20px;
    color: #222;
    font-weight: 700;
}

.pending-provider p{
    margin: 4px 0;
    color: #666;
    font-size: 14px;
}

.pending-provider span{
    font-size: 13px;
    color: #999;
}

/* BADGE */
.pending-badge{
    background: rgba(255, 193, 7, 0.15);
    color: #d48b00;
    padding: 8px 14px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    white-space: nowrap;
}

/* CONTENT */
.pending-content{
    background: #fafafa;
    border-radius: 16px;
    padding: 16px;
    color: #555;
    line-height: 1.6;
    font-size: 14px;
    margin-bottom: 20px;
    border: 1px solid #f0f0f0;
}

/* DOCUMENT BOX */
.document-box{
    background: #fffdf7;
    border: 1px solid #ffe6a7;
    border-radius: 18px;
    padding: 18px;
    margin-bottom: 22px;
}

.document-title{
    font-weight: 700;
    color: #c98600;
    margin-bottom: 14px;
    font-size: 15px;
}

.document-list{
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.document-item{
    background: #ffffff;
    padding: 12px 14px;
    border-radius: 12px;
    border: 1px solid #f1f1f1;
    color: #444;
    font-size: 14px;
    transition: 0.2s;
}

.document-item:hover{
    background: #fff8ea;
    transform: translateX(3px);
}

/* ACTIONS */
.pending-actions{
    display: flex;
    gap: 14px;
    margin-top: 10px;
}

.pending-actions form{
    margin: 0;
    flex: 1;
}

.pending-actions button{
    flex: 1;
    border: none;
    border-radius: 14px;
    padding: 14px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s ease;
}

/* APPROVE BUTTON */
.approve-btn{
    background: linear-gradient(
        135deg,
        #22c55e,
        #16a34a
    );
    color: white;
    box-shadow: 0 6px 16px rgba(34,197,94,0.3);
}

.approve-btn:hover{
    transform: translateY(-2px);
    box-shadow: 0 10px 22px rgba(34,197,94,0.4);
}

/* REJECT BUTTON */
.reject-btn{
    background: #fff1f2;
    color: #e11d48;
    border: 1px solid #fecdd3 !important;
}

.reject-btn:hover{
    background: #e11d48;
    color: white;
    transform: translateY(-2px);
}

/* RESPONSIVE */
@media(max-width:768px){

    .pending-top{
        flex-direction: column;
    }

    .pending-actions{
        flex-direction: column;
    }

}
</style>