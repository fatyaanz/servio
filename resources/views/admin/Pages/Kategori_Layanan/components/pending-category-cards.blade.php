<div class="pending-category-wrapper">

    @forelse($pendingRequests as $request)

        @include(
            'admin.Pages.Kategori_Layanan.components.pending-category-card',
            ['request' => $request]
        )

    @empty

        <div class="empty-request">

            <i class='bx bx-check-shield'></i>

            <h3>
                Tidak Ada Pengajuan Kategori
            </h3>

            <p>
                Saat ini belum ada provider yang mengajukan kategori layanan baru.
            </p>

        </div>

    @endforelse

</div>

<style>

/* =========================
    WRAPPER
========================= */

.pending-category-wrapper{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(380px,1fr));

    gap:20px;

    margin-top:20px;

}

/* =========================
    EMPTY STATE
========================= */

.empty-request{

    grid-column:1 / -1;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:60px 24px;

    text-align:center;

    box-shadow:var(--shadow-sm);

}

.empty-request i{

    font-size:64px;

    color:#22c55e;

    margin-bottom:16px;

}

.empty-request h3{

    font-size:20px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:8px;

}

.empty-request p{

    font-size:14px;

    color:var(--text-secondary);

    max-width:420px;

    margin:auto;

    line-height:1.6;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .pending-category-wrapper{

        grid-template-columns:1fr;

    }

}

</style>