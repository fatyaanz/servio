<div class="pending-category-card">

    <div class="pending-top">

        <div class="provider-info">

            <div class="provider-avatar">

                {{ strtoupper(substr($request->provider->name,0,2)) }}

            </div>

            <div>

                <h3>
                    {{ $request->provider->name }}
                </h3>

                <p>
                    Mengajukan kategori layanan
                    {{ $request->category->name }}
                </p>

            </div>

        </div>

        <div class="pending-badge">

            Pending

        </div>

    </div>

    <!-- CERTIFICATE -->
    <div class="certificate-box">

        <div class="certificate-title">

            📄 Sertifikat Keahlian

        </div>

        <div class="certificate-file">

            <a
                href="{{ asset('storage/'.$request->certificate_file) }}"
                target="_blank"
            >
                Lihat Sertifikat
            </a>

        </div>

    </div>

    <!-- DATE -->
    <div class="request-date">

        Diajukan
        {{ $request->created_at->diffForHumans() }}

    </div>

    <!-- ACTION -->
    <div class="action-buttons">

        <form
            action="{{ route('categories.approve', $request->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <button
                type="submit"
                class="approve-btn"
            >
                Approve
            </button>

        </form>
        <form
            action="{{ route('categories.reject', $request->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <input
                type="hidden"
                name="reason"
                value="Dokumen tidak sesuai"
            >

            <button
                type="submit"
                class="reject-btn"
            >
                Tolak
            </button>

        </form>

    </div>

</div>

<style>

/* =========================
    CARD
========================= */

.pending-category-card{

    background:white;

    border-radius:28px;

    padding:28px;

    border:1px solid #eef2f7;

    box-shadow:
    0 10px 28px rgba(15,23,42,0.05);

    transition:0.25s ease;

}

.pending-category-card:hover{

    transform:translateY(-3px);

}

/* =========================
    TOP
========================= */

.pending-top{

    display:flex;

    justify-content:space-between;
    align-items:flex-start;

    gap:20px;

    margin-bottom:24px;

    flex-wrap:wrap;

}

/* =========================
    PROVIDER
========================= */

.provider-info{

    display:flex;

    align-items:center;

    gap:18px;

}

/* AVATAR */

.provider-avatar{

    width:74px;
    height:74px;

    border-radius:22px;

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    display:flex;

    align-items:center;
    justify-content:center;

    color:white;

    font-size:24px;

    font-weight:700;

    flex-shrink:0;

}

/* TEXT */

.provider-info h3{

    font-size:24px;

    font-weight:800;

    color:#111827;

    margin-bottom:8px;

}

.provider-info p{

    color:#6b7280;

    font-size:15px;

    line-height:1.7;

}

/* =========================
    BADGE
========================= */

.pending-badge{

    padding:12px 20px;

    border-radius:999px;

    background:#fff7ed;

    color:#ff7a00;

    font-size:14px;

    font-weight:700;

}

/* =========================
    CERTIFICATE
========================= */

.certificate-box{

    background:#fafafa;

    border:1px solid #eef2f7;

    border-radius:20px;

    padding:20px;

    margin-bottom:20px;

}

/* TITLE */

.certificate-title{

    font-size:15px;

    font-weight:700;

    color:#111827;

    margin-bottom:14px;

}

/* FILE */

.certificate-file{

    background:white;

    border:1px solid #f1f5f9;

    padding:14px 16px;

    border-radius:14px;

    font-size:14px;

    color:#475569;

}

/* =========================
    DATE
========================= */

.request-date{

    font-size:14px;

    color:#94a3b8;

    margin-bottom:24px;

}

/* =========================
    ACTIONS
========================= */

.action-buttons{

    display:flex;

    align-items:center;

    gap:14px;

    flex-wrap:wrap;

}

/* APPROVE */

.approve-btn{

    border:none;

    padding:14px 22px;

    border-radius:16px;

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:14px;

    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

    box-shadow:
    0 10px 20px rgba(255,122,0,0.18);

}

/* REJECT */

.reject-btn{

    border:none;

    padding:14px 22px;

    border-radius:16px;

    background:#fff1f2;

    color:#ef4444;

    font-size:14px;

    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

}

/* HOVER */

.approve-btn:hover,
.reject-btn:hover{

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .provider-info h3{

        font-size:20px;

    }

}

</style>