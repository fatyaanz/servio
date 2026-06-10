<div class="pengajuan-wrapper">

    @forelse($requests as $request)

        @include(
            'provider.pages.layanan.component.pending-card',
            ['request' => $request]
        )

    @empty

        <div class="empty-request">

            <div class="empty-icon">

                📄

            </div>

            <h3>

                Tidak Ada Pengajuan

            </h3>

            <p>

                Semua kategori sudah diproses atau
                belum ada pengajuan layanan.

            </p>

        </div>

    @endforelse

</div>

<style>

.pengajuan-wrapper{

    display:flex;

    flex-direction:column;

    gap:20px;

}

.empty-request{

    background:white;

    border-radius:28px;

    padding:60px;

    text-align:center;

}

.empty-icon{

    font-size:60px;

    margin-bottom:18px;

}

.empty-request h3{

    font-size:24px;

    color:#111827;

    margin-bottom:10px;

}

.empty-request p{

    color:#6B7280;

    line-height:1.7;

}

</style>