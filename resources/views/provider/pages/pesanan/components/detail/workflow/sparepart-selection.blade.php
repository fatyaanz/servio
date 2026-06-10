<div class="sparepart-card">

    <div class="card-header">

        <div>

            <h3>
                Sparepart Terpilih
            </h3>

            <p>
                Pilih sparepart yang akan direkomendasikan ke pelanggan
            </p>

        </div>

        <button
            class="add-product-btn"
            onclick="openSparepartModal()"
        >

            + Tambah Sparepart

        </button>

    </div>

    <div class="sparepart-list">

        @forelse(
            $booking->diagnosis?->produks ?? collect()
            as $produk
        )

        <div class="sparepart-item">

            <div class="sparepart-left">

                <img
                    src="{{ $produk->foto
                        ? asset('storage/' . $produk->foto)
                        : 'https://via.placeholder.com/80'
                    }}"
                    class="sparepart-image"
                >

                <div class="sparepart-info">

                    <h4>

                        {{ $produk->nama_produk }}

                    </h4>

                    <p>

                        Qty :
                        {{ $produk->pivot->qty }}
                        {{ $produk->satuan }}

                    </p>

                </div>

            </div>

            <div class="sparepart-right">

                <span class="product-price">

                    Rp{{ number_format(
                        $produk->harga *
                        $produk->pivot->qty,
                        0,
                        ',',
                        '.'
                    ) }}

                </span>

                <form
                    action="{{ route(
                        'provider.diagnosis-produk.destroy',
                        [
                            $booking->diagnosis->id,
                            $produk->id
                        ]
                    ) }}"
                    method="POST"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="remove-btn"
                    >

                        ✕

                    </button>

                </form>

            </div>

        </div>

        @empty

        <div class="empty-damage">

            <div class="empty-icon">

                📦

            </div>

            <h4>

                Belum Ada Produk

            </h4>

            <p>

                Tambahkan produk yang akan digunakan.

            </p>

        </div>

        @endforelse

    </div>

</div>

<style>

/* =========================
   CARD
========================= */

.sparepart-card{

    margin:20px;

    padding:22px;

    background:white;

    border-radius:24px;

    box-shadow:
        0 4px 12px rgba(0,0,0,.05);
}

/* =========================
   HEADER
========================= */

.card-header{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:15px;

    margin-bottom:22px;
}

.card-header h3{

    margin:0;

    color:#222;

    font-size:20px;

    font-weight:700;
}

.card-header p{

    margin-top:6px;

    color:#777;

    font-size:14px;
}

.add-product-btn{

    border:none;

    background:#F08A28;

    color:white;

    padding:10px 16px;

    border-radius:12px;

    cursor:pointer;

    font-weight:600;

    transition:.3s;
}

.add-product-btn:hover{

    background:#E67C14;
}

/* =========================
   ITEM
========================= */

.sparepart-item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;

    padding:16px;

    border-radius:18px;

    background:#F8FAFC;

    border:1px solid #EDF2F7;

    margin-bottom:14px;

    transition:.3s;
}

.sparepart-item:hover{

    background:#F1F5F9;
}

/* =========================
   LEFT
========================= */

.sparepart-left{

    display:flex;

    align-items:center;

    gap:15px;

    flex:1;
}

.sparepart-image{

    width:72px;

    height:72px;

    border-radius:14px;

    object-fit:cover;

    background:#F5F5F5;

    flex-shrink:0;
}

.sparepart-info h4{

    margin:0;

    color:#222;

    font-size:16px;

    font-weight:700;
}

.sparepart-info p{

    margin-top:6px;

    color:#777;

    font-size:13px;
}

/* =========================
   RIGHT
========================= */

.sparepart-right{

    display:flex;

    align-items:center;

    gap:14px;
}

.product-price{

    font-size:16px;

    font-weight:700;

    color:#16A34A;
}

.remove-btn{

    width:38px;

    height:38px;

    border:none;

    border-radius:10px;

    background:#FEE2E2;

    color:#DC2626;

    cursor:pointer;

    transition:.3s;
}

.remove-btn:hover{

    background:#FECACA;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .card-header{

        flex-direction:column;
    }

    .add-product-btn{

        width:100%;
    }

    .sparepart-item{

        flex-direction:column;

        align-items:flex-start;
    }

    .sparepart-right{

        width:100%;

        justify-content:space-between;
    }

    .sparepart-image{

        width:60px;

        height:60px;
    }

}

</style>

@include('provider.pages.pesanan.components.detail.modals.sparepart-modal')