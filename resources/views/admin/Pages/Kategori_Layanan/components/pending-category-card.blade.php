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
                    <strong>{{ $request->category->name }}</strong>
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

            <i class='bx bx-file'></i>

            Sertifikat Keahlian

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

    border:1px solid var(--border);

    border-radius:20px;

    padding:20px;

    box-shadow:var(--shadow-sm);

    transition:.3s;

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

    gap:16px;

    margin-bottom:18px;

}

.provider-info{

    display:flex;

    align-items:center;

    gap:14px;

}

/* =========================
    AVATAR
========================= */

.provider-avatar{

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    display:flex;

    align-items:center;
    justify-content:center;

    color:white;

    font-size:16px;

    font-weight:700;

    flex-shrink:0;

}

/* =========================
    TEXT
========================= */

.provider-info h3{

    font-size:16px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:4px;

}

.provider-info p{

    font-size:13px;

    color:var(--text-secondary);

    line-height:1.5;

}

/* =========================
    BADGE
========================= */

.pending-badge{

    padding:6px 12px;

    border-radius:999px;

    background:#FFF4E6;

    color:var(--primary);

    font-size:12px;

    font-weight:600;

}

/* =========================
    CERTIFICATE
========================= */

.certificate-box{

    background:#FAFAFA;

    border:1px solid #F3F4F6;

    border-radius:16px;

    padding:16px;

    margin-bottom:16px;

}

.certificate-title{

    display:flex;

    align-items:center;

    gap:8px;

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:12px;

}

.certificate-file{

    background:white;

    border:1px solid #F3F4F6;

    border-radius:12px;

    padding:12px;

    font-size:13px;

}

.certificate-file a{

    color:var(--primary);

    text-decoration:none;

    font-weight:600;

}

/* =========================
    DATE
========================= */

.request-date{

    font-size:12px;

    color:var(--text-secondary);

    margin-bottom:18px;

}

/* =========================
    ACTIONS
========================= */

.action-buttons{

    display:flex;

    gap:12px;

}

.action-buttons form{

    flex:1;

}

/* =========================
    APPROVE
========================= */

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

    font-size:14px;

    font-weight:600;

    cursor:pointer;

}

/* =========================
    REJECT
========================= */

.reject-btn{

    width:100%;

    padding:12px;

    border-radius:12px;

    border:1px solid #fecaca;

    background:white;

    color:#ef4444;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

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

    .action-buttons{

        flex-direction:column;

    }

}

</style>