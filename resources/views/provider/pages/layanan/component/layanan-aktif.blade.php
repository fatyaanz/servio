<div class="layanan-grid">

    @forelse($services as $service)

        @include(
            'provider.pages.layanan.component.service-card',
            ['service' => $service]
        )

    @empty

        <div class="empty-service">

            <div class="empty-icon">
                📦
            </div>

            <h3>
                Belum Ada Layanan Aktif
            </h3>

            <p>
                Ajukan kategori layanan terlebih dahulu.
            </p>

        </div>

    @endforelse

</div>

<style>

.layanan-grid{

    display:flex;

    flex-direction:column;

    gap:24px;

    width:100%;

}

.empty-service{

    background:white;

    border-radius:24px;

    padding:60px;

    text-align:center;

}

.empty-icon{

    font-size:60px;

    margin-bottom:16px;

}

</style>