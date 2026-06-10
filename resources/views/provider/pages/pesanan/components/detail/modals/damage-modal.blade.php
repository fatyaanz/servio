<div id="damageModal" class="modal-overlay">

    <div class="modal-content">

        <div class="modal-header">

            <h3>

                Tambah Kerusakan

            </h3>

            <button
                class="close-btn"
                onclick="closeDamageModal()"
            >

                ✕

            </button>

        </div>
        <form
            action="{{ route('provider.damage.store') }}"
            method="POST"
        >

            @csrf

            <input
                type="hidden"
                name="booking_id"
                value="{{ $booking->id }}"
            >

            <div class="form-group">

                <label>

                    Nama Kerusakan

                </label>

                <input
                    type="text"
                    name="title"
                    required
                >

            </div>

            <div class="form-group">

                <label>

                    Deskripsi Kerusakan

                </label>

                <textarea
                    name="description"
                    required
                ></textarea>

            </div>

            <div class="modal-actions">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeDamageModal()"
                >

                    Batal

                </button>

                <button
                    type="submit"
                    class="save-btn"
                >

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

<style>

.modal-overlay{

    position:fixed;

    top:0;
    left:0;

    width:100%;
    height:100%;

    background:rgba(0,0,0,.45);

    display:none;

    align-items:center;

    justify-content:center;

    z-index:9999;
}

.modal-content{

    width:100%;

    max-width:520px;

    background:white;

    border-radius:24px;

    padding:24px;
}

.modal-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:20px;
}

.modal-header h3{

    margin:0;
}

.close-btn{

    width:38px;

    height:38px;

    border:none;

    border-radius:10px;

    cursor:pointer;

    background:#F3F4F6;
}

.form-group{

    margin-bottom:18px;
}

.form-group label{

    display:block;

    margin-bottom:8px;

    font-weight:600;
}

.form-group input,
.form-group textarea{

    width:100%;

    border:1px solid #E5E7EB;

    border-radius:14px;

    padding:14px;

    outline:none;
}

.form-group textarea{

    resize:none;

    min-height:120px;
}

.modal-actions{

    display:flex;

    gap:12px;

    margin-top:25px;
}

.cancel-btn{

    flex:1;

    height:50px;

    border:none;

    border-radius:14px;

    background:#F3F4F6;

    cursor:pointer;
}

.save-btn{

    flex:1;

    height:50px;

    border:none;

    border-radius:14px;

    background:#F08A28;

    color:white;

    font-weight:700;

    cursor:pointer;
}

</style>

<script>

function openDamageModal(){

    document.getElementById('damageModal').style.display='flex';

}

function closeDamageModal(){

    document.getElementById('damageModal').style.display='none';

}

</script>