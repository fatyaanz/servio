<div class="pending-category-wrapper">

    @forelse($pendingRequests as $request)

        @include(
            'admin.Pages.Kategori_Layanan.components.pending-category-card',
            ['request' => $request]
        )

    @empty

        <div class="empty-request">

            <h3>
                Tidak Ada Pengajuan
            </h3>

            <p>
                Saat ini belum ada provider yang mengajukan kategori layanan.
            </p>

        </div>

    @endforelse

</div>

<style>

/* =========================
    WRAPPER
========================= */

.pending-category-wrapper{

    display:flex;

    flex-direction:column;

    gap:24px;

    margin-top:10px;

}

.empty-request{

    background:white;

    padding:50px;

    border-radius:24px;

    text-align:center;

    border:1px solid #eef2f7;

}

.empty-request h3{

    color:#111827;

    margin-bottom:10px;

}

.empty-request p{

    color:#64748b;

}

</style>