<div id="rejectModal" class="reject-modal">

    <div class="reject-box">

        <div class="reject-header">

            <div class="reject-icon">
                <i class='bx bx-error-circle'></i>
            </div>

            <div>

                <h3>
                    Tolak Pengajuan Provider
                </h3>

                <p>
                    Berikan alasan penolakan agar provider dapat melakukan perbaikan data.
                </p>

            </div>

        </div>

        <form
            id="rejectForm"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>
                    Alasan Penolakan
                </label>

                <textarea
                    name="reason"
                    placeholder="Masukkan alasan penolakan..."
                    required
                ></textarea>

            </div>

            <div class="reject-actions">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeRejectModal()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="submit-reject-btn"
                >
                    Tolak Pengajuan
                </button>

            </div>

        </form>

    </div>

</div>

<style>

/* =========================
    MODAL
========================= */

.reject-modal{

    position:fixed;

    inset:0;

    background:rgba(15,23,42,.45);

    display:none;

    justify-content:center;
    align-items:center;

    z-index:1000;

    padding:20px;

}

/* =========================
    BOX
========================= */

.reject-box{

    width:100%;
    max-width:520px;

    background:white;

    border-radius:20px;

    padding:24px;

    border:1px solid var(--border);

    box-shadow:var(--shadow-md);

    animation:modalFade .25s ease;

}

@keyframes modalFade{

    from{
        opacity:0;
        transform:translateY(15px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

/* =========================
    HEADER
========================= */

.reject-header{

    display:flex;

    align-items:flex-start;

    gap:16px;

    margin-bottom:20px;

}

.reject-icon{

    width:52px;
    height:52px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:14px;

    background:#FEF2F2;

    color:#EF4444;

    font-size:24px;

    flex-shrink:0;

}

.reject-header h3{

    font-size:20px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:6px;

}

.reject-header p{

    font-size:14px;

    color:var(--text-secondary);

    line-height:1.6;

}

/* =========================
    FORM
========================= */

.form-group{

    margin-bottom:20px;

}

.form-group label{

    display:block;

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:8px;

}

.form-group textarea{

    width:100%;

    min-height:140px;

    border:1px solid var(--border);

    border-radius:12px;

    padding:14px;

    resize:none;

    font-size:14px;

    font-family:'Poppins',sans-serif;

    outline:none;

    transition:.3s;

}

.form-group textarea:focus{

    border-color:var(--primary);

}

/* =========================
    ACTIONS
========================= */

.reject-actions{

    display:flex;

    justify-content:flex-end;

    gap:12px;

}

.cancel-btn{

    padding:12px 20px;

    border:1px solid var(--border);

    border-radius:12px;

    background:white;

    color:var(--text-dark);

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.cancel-btn:hover{

    background:#F8FAFC;

}

.submit-reject-btn{

    padding:12px 20px;

    border:none;

    border-radius:12px;

    background:#EF4444;

    color:white;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.submit-reject-btn:hover{

    background:#DC2626;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .reject-header{
        flex-direction:column;
    }

    .reject-actions{
        flex-direction:column;
    }

    .cancel-btn,
    .submit-reject-btn{
        width:100%;
    }

}

</style>

<script>

function openRejectModal(providerId)
{
    document
        .getElementById('rejectModal')
        .style.display = 'flex';

    document
        .getElementById('rejectForm')
        .action =
        '/admin/providers/' +
        providerId +
        '/reject';
}

function closeRejectModal()
{
    document
        .getElementById('rejectModal')
        .style.display = 'none';
}

window.addEventListener('click', function(e)
{
    const modal =
        document.getElementById('rejectModal');

    if(e.target === modal)
    {
        closeRejectModal();
    }
});

</script>