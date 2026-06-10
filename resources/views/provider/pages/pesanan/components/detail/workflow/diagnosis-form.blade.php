<div class="diagnosis-card">

    <div class="card-header">

        <h3>

            Detail Kerusakan

        </h3>

        <button
            class="add-btn"
            onclick="openDamageModal()"
        >

            + Tambah Kerusakan

        </button>

    </div>

   @forelse(
        $booking->diagnosis?->damageReports ?? collect()
        as $damage
    )

        <div class="damage-item">

            <div class="damage-info">

                <h4>

                    {{ $damage->title }}

                </h4>

                <p>

                    {{ $damage->description }}

                </p>

            </div>

            <form
                action="{{ route('provider.damage.destroy', $damage->id) }}"
                method="POST"
                onsubmit="return confirm('Hapus kerusakan ini?')"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="delete-btn"
                >
                    ✕
                </button>
            </form>

        </div>

        @empty

        <div class="empty-damage">

            <div class="empty-icon">

                🔍

            </div>

            <h4>

                Belum Ada Kerusakan

            </h4>

            <p>

                Tambahkan hasil inspeksi terlebih dahulu.

            </p>

        </div>

        @endforelse

</div>


<style>

.diagnosis-card{

    margin:20px;

    padding:20px;

    background:white;

    border-radius:24px;

    box-shadow:
        0 4px 12px rgba(0,0,0,.05);
}

.card-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:20px;
}

.card-header h3{

    margin:0;

    color:#222;
}

.add-btn{

    border:none;

    background:#F08A28;

    color:white;

    padding:10px 16px;

    border-radius:12px;

    cursor:pointer;

    font-weight:600;
}

.damage-item{

    display:flex;

    justify-content:space-between;

    gap:15px;

    padding:15px;

    border-radius:16px;

    background:#F8FAFC;

    margin-bottom:12px;
}

.damage-info h4{

    margin:0;

    color:#222;
}

.damage-info p{

    margin-top:6px;

    color:#777;

    font-size:14px;
}

.delete-btn{

    border:none;

    background:#FEE2E2;

    color:#DC2626;

    width:36px;

    height:36px;

    border-radius:10px;

    cursor:pointer;
}

.empty-damage{

    padding:40px 20px;

    text-align:center;

    border-radius:18px;

    background:#F8FAFC;
}

.empty-icon{

    font-size:40px;

    margin-bottom:12px;
}

.empty-damage h4{

    margin:0;

    color:#222;

    font-size:18px;

    font-weight:700;
}

.empty-damage p{

    margin-top:8px;

    color:#777;

    font-size:14px;
}

</style>

@include('provider.pages.pesanan.components.detail.modals.damage-modal')