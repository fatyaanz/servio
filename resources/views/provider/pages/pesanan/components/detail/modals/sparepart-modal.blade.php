<div id="sparepartModal" class="modal-overlay">

    <div class="modal-content large">

        <div class="modal-header">

            <h3>
                Pilih Produk
            </h3>

            <button
                class="close-btn"
                onclick="closeSparepartModal()"
            >
                ✕
            </button>

        </div>

        {{-- SEARCH --}}

        <div class="search-box">

            <input
                type="text"
                placeholder="Cari produk..."
            >

        </div>

        {{-- PRODUCT LIST --}}

        <div class="product-list">

            @forelse($produks as $produk)

                <div class="product-item">

                    <img
                        src="{{ $produk->foto
                            ? asset('storage/' . $produk->foto)
                            : 'https://via.placeholder.com/100'
                        }}"
                        alt="{{ $produk->nama_produk }}"
                        class="product-image"
                    >

                    <div class="product-info">

                        <h4>
                            {{ $produk->nama_produk }}
                        </h4>

                        <p>
                            Stok :
                            {{ $produk->stok }}
                            {{ $produk->satuan }}
                        </p>

                        <span>
                            Rp{{ number_format(
                                $produk->harga,
                                0,
                                ',',
                                '.'
                            ) }}
                        </span>

                    </div>

                    <form
                        action="{{ route('provider.diagnosis-produk.store') }}"
                        method="POST"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="booking_id"
                            value="{{ $booking->id }}"
                        >

                        <input
                            type="hidden"
                            name="produk_id"
                            value="{{ $produk->id }}"
                        >

                        <input
                            type="hidden"
                            name="qty"
                            value="1"
                        >

                        <button
                            type="submit"
                            class="add-btn-product"
                        >
                            Tambah
                        </button>

                    </form>

                </div>

            @empty

                <div class="empty-product">

                    <h4>
                        Belum Ada Produk
                    </h4>

                    <p>
                        Tambahkan produk terlebih dahulu
                        pada menu Produk.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

<style>

.large{
    max-width:800px !important;
}

.search-box{
    margin-bottom:20px;
}

.search-box input{
    width:100%;
    height:52px;
    border:1px solid #E5E7EB;
    border-radius:14px;
    padding:0 16px;
    outline:none;
}

.search-box input:focus{
    border-color:#F08A28;
}

.product-list{
    display:flex;
    flex-direction:column;
    gap:14px;
    max-height:500px;
    overflow-y:auto;
}

.product-item{
    display:flex;
    align-items:center;
    gap:16px;
    padding:15px;
    border:1px solid #E5E7EB;
    border-radius:18px;
}

.product-image{
    width:80px;
    height:80px;
    border-radius:14px;
    object-fit:cover;
    background:#F5F5F5;
}

.product-info{
    flex:1;
}

.product-info h4{
    margin:0;
    color:#222;
}

.product-info p{
    margin-top:5px;
    color:#777;
    font-size:13px;
}

.product-info span{
    display:block;
    margin-top:8px;
    color:#16A34A;
    font-weight:700;
}

.add-btn-product{
    border:none;
    background:#F08A28;
    color:white;
    padding:10px 18px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
}

.empty-product{
    text-align:center;
    padding:40px 20px;
}

.empty-product h4{
    margin:0;
    color:#222;
}

.empty-product p{
    margin-top:8px;
    color:#777;
}

@media(max-width:768px){

    .product-item{
        flex-direction:column;
        align-items:flex-start;
    }

    .add-btn-product{
        width:100%;
    }

}

</style>

<script>

function openSparepartModal()
{
    document
        .getElementById('sparepartModal')
        .style.display='flex';
}

function closeSparepartModal()
{
    document
        .getElementById('sparepartModal')
        .style.display='none';
}

</script>