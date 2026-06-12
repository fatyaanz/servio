<div id="editSubModal" class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <div>

                <h2>
                    Edit Sub Layanan
                </h2>

                <p>
                    Perbarui informasi sub layanan.
                </p>

            </div>

            <button
                type="button"
                class="close-btn"
                onclick="closeEditModal()"
            >
                ✕
            </button>

        </div>

        <form
            id="editSubForm"
            method="POST"
        >

            @csrf

            @method('PUT')

            <div class="form-group">

                <label>
                    Nama Sub Layanan
                </label>

                <input
                    type="text"
                    id="edit_name"
                    name="name"
                    required
                >

            </div>

            <div class="price-grid">

                <div class="form-group">

                    <label>
                        Harga Minimum
                    </label>

                    <input
                        type="number"
                        id="edit_price_min"
                        name="price_min"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>
                        Harga Maksimum
                    </label>

                    <input
                        type="number"
                        id="edit_price_max"
                        name="price_max"
                        required
                    >

                </div>

            </div>

            <div class="form-group">

                <label>
                    Deskripsi
                </label>

                <textarea
                    id="edit_description"
                    name="description"
                    rows="4"
                ></textarea>

            </div>

            <button
                type="submit"
                class="submit-btn"
            >
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>

<style>

.price-grid{

    display:grid;

    grid-template-columns:
        repeat(2,1fr);

    gap:16px;

}

textarea{

    width:100%;

    padding:14px;

    border:1px solid #E5E7EB;

    border-radius:14px;

    resize:none;

    font-size:14px;

}

@media(max-width:768px){

    .price-grid{

        grid-template-columns:1fr;

    }

}

</style>