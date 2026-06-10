@foreach($produks as $produk)

<div
    class="modal-overlay editModal"
    id="editModal{{ $produk->id }}"
>

    <div class="tambahproduk-container">

        <!-- HEADER -->

        <div class="page-header">

            <div>

                <h1>
                    Edit Produk
                </h1>

                <p>
                    Ubah data produk kamu
                </p>

            </div>

            <button
                class="close-modal"
                onclick="closeEditModal({{ $produk->id }})"
            >
                ✕
            </button>

        </div>

        <!-- FORM -->

        <form
            class="product-form"
            action="/provider/produk/update/{{ $produk->id }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <!-- TOP -->

            <div class="form-top-grid">

                <!-- FOTO -->

                <div class="upload-wrapper">

                    <label>
                        Foto Produk
                    </label>

                    <div class="upload-box">

                        <img
                            src="{{ $produk->foto
                                ? asset('storage/' . $produk->foto)
                                : 'https://via.placeholder.com/100'
                            }}"
                            style="
                                width:80px;
                                height:80px;
                                object-fit:cover;
                                border-radius:12px;
                                margin-bottom:10px;
                            "
                        >

                        <input
                            type="file"
                            name="foto"
                        >

                    </div>

                </div>

                <!-- RIGHT -->

                <div class="form-right">

                    <div class="input-group">

                        <label>
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="nama_produk"
                            value="{{ $produk->nama_produk }}"
                        >

                    </div>

                </div>

            </div>

            <!-- BOTTOM -->

            <div class="bottom-grid">

                <div class="input-group">

                    <label>
                        Harga
                    </label>

                    <input
                        type="number"
                        name="harga"
                        value="{{ $produk->harga }}"
                    >

                </div>

                <div class="input-group">

                    <label>
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stok"
                        value="{{ $produk->stok }}"
                    >

                </div>

                <div class="input-group">

                    <label>
                        Satuan
                    </label>

                    <select name="satuan">

                        <option
                            value="Pcs"
                            {{ $produk->satuan == 'Pcs' ? 'selected' : '' }}
                        >
                            Pcs
                        </option>

                        <option
                            value="Unit"
                            {{ $produk->satuan == 'Unit' ? 'selected' : '' }}
                        >
                            Unit
                        </option>

                    </select>

                </div>

            </div>

            <!-- DESKRIPSI -->

            <div class="input-group textarea-group">

                <label>
                    Deskripsi Produk
                </label>

                <textarea
                    name="deskripsi"
                >{{ $produk->deskripsi }}</textarea>

            </div>

            <!-- BUTTON -->

            <div class="form-action">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeEditModal({{ $produk->id }})"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="save-btn"
                >
                    Update Produk
                </button>

            </div>

        </form>

    </div>

</div>

@endforeach

<style>

.editModal{

    display:none;

}

.editModal.active{

    display:flex;

}

</style>