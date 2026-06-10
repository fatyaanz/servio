<div class="request-card">

    <div class="request-top">

        <div>

            <h3>

                {{ $request->category->name }}

            </h3>

            <p>

                Diajukan :

                {{ $request->created_at->format('d M Y') }}

            </p>

        </div>

        @if($request->status == 'pending')

            <span class="status pending">

                Menunggu Review

            </span>

        @elseif($request->status == 'rejected')

            <span class="status rejected">

                Ditolak

            </span>

        @endif

    </div>

    @if($request->status == 'pending')

        <div class="info-box">

            Pengajuan sedang diperiksa admin
            sebelum diaktifkan.

        </div>

    @endif

    @if(
        $request->status == 'rejected'
        &&
        $request->rejection_reason
    )

        <div class="reject-box">

            <h4>

                Alasan Penolakan

            </h4>

            <p>

                {{ $request->rejection_reason }}

            </p>

        </div>

    @endif

</div>

<style>

.request-card{

    background:white;

    border-radius:24px;

    padding:24px;

    box-shadow:
        0 4px 16px
        rgba(0,0,0,.04);

}

.request-top{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:18px;

}

.request-top h3{

    font-size:24px;

    color:#111827;

    margin-bottom:6px;

}

.request-top p{

    color:#6B7280;

}

.status{

    padding:10px 16px;

    border-radius:999px;

    font-size:13px;

    font-weight:700;

}

.pending{

    background:#FFF3E8;

    color:#FF8A00;

}

.rejected{

    background:#FEE2E2;

    color:#DC2626;

}

.info-box{

    background:#FFF7ED;

    padding:18px;

    border-radius:14px;

    color:#9A3412;

}

.reject-box{

    background:#FEF2F2;

    padding:18px;

    border-radius:14px;

}

.reject-box h4{

    color:#DC2626;

    margin-bottom:10px;

}

.reject-box p{

    color:#7F1D1D;

}

</style>