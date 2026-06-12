<div id="tambahModal" class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <div>

                <h2>
                    Ajukan Kategori Layanan
                </h2>

                <p>
                    Upload sertifikat sebagai bukti
                    kompetensi pada kategori yang dipilih.
                </p>

            </div>

            <button
                class="close-btn"
                onclick="closeTambahModal()"
            >
                ✕
            </button>

        </div>

        <form
            action="{{ route('provider.category.submit') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <!-- KATEGORI -->

            <div class="form-group">

                <label>
                    Pilih Kategori
                </label>

                <select
                    name="category_id"
                    required
                >

                    <option value="">

                        Pilih kategori

                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                        >

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- FILE -->

            <div class="form-group">

                <label>
                    Sertifikat Kompetensi
                </label>

                <input
                    type="file"
                    name="certificate_file"
                    accept=".pdf,.jpg,.jpeg,.png"
                    required
                >

                <small>

                    Format: PDF, JPG, PNG

                </small>

            </div>

            <button
                type="submit"
                class="submit-btn"
            >

                Kirim Pengajuan

            </button>

        </form>

    </div>

</div>

<style>

/* MODAL */

.modal{

    display:none;

    position:fixed;

    top:0;
    left:0;

    width:100%;
    height:100%;

    background:
        rgba(0,0,0,.45);

    z-index:9999;

    align-items:center;
    justify-content:center;

}

.modal.active{

    display:flex;

}

/* CONTENT */

.modal-content{

    width:100%;
    max-width:600px;

    background:white;

    border-radius:28px;

    padding:30px;

    box-shadow:
        0 20px 40px
        rgba(0,0,0,.15);

}

/* HEADER */

.modal-header{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    margin-bottom:30px;

}

.modal-header h2{

    font-size:30px;

    color:#111827;

    margin-bottom:8px;

}

.modal-header p{

    color:#6B7280;

}

/* CLOSE */

.close-btn{

    border:none;

    width:40px;
    height:40px;

    border-radius:50%;

    cursor:pointer;

    background:#F3F4F6;

}

/* FORM */

.form-group{

    margin-bottom:20px;

}

.form-group label{

    display:block;

    margin-bottom:10px;

    font-weight:700;

    color:#374151;

}

.form-group select,
.form-group input{

    width:100%;

    padding:14px 16px;

    border:1px solid #E5E7EB;

    border-radius:14px;

    font-size:14px;

}

.form-group small{

    display:block;

    margin-top:8px;

    color:#9CA3AF;

}

/* BUTTON */

.submit-btn{

    width:100%;

    border:none;

    background:linear-gradient(
        135deg,
        #FFA63D,
        #FF8A00
    );

    color:white;

    padding:16px;

    border-radius:16px;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    margin-top:10px;

}

.submit-btn:hover{

    opacity:.95;

}

</style>

<script>

function closeTambahModal()
{
    document
        .getElementById(
            'tambahModal'
        )
        .classList.remove(
            'active'
        );
}

window.addEventListener(
    'click',
    function(event)
    {
        let modal =
            document.getElementById(
                'tambahModal'
            );

        if(event.target === modal)
        {
            closeTambahModal();
        }
    }
);

</script>