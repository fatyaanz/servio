<div id="rejectModal" class="reject-modal">

    <div class="reject-box">

        <div class="modal-header">

            <div>

                <h3>
                    Alasan Penolakan
                </h3>

                <p>
                    Berikan alasan mengapa pengajuan kategori layanan ditolak.
                </p>

            </div>

            <button
                type="button"
                class="close-btn"
                onclick="closeRejectModal()"
            >
                <i class='bx bx-x'></i>
            </button>

        </div>

        <form id="rejectForm" method="POST">
            @csrf
            @method('PUT')

            <textarea
                name="reason"
                placeholder="Masukkan alasan penolakan..."
                required
            ></textarea>

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

    padding:20px;

    z-index:1000;

}

/* =========================
    BOX
========================= */

.reject-box{

    width:100%;
    max-width:520px;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:24px;

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

.modal-header{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:16px;

    margin-bottom:20px;

}

.modal-header h3{

    font-size:20px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:6px;

}

.modal-header p{

    font-size:14px;

    color:var(--text-secondary);

    line-height:1.6;

}

/* =========================
    CLOSE BUTTON
========================= */

.close-btn{

    width:40px;
    height:40px;

    border:none;

    border-radius:12px;

    background:#F8FAFC;

    color:var(--text-secondary);

    cursor:pointer;

    transition:.3s;

    display:flex;

    justify-content:center;
    align-items:center;

    font-size:20px;

}

.close-btn:hover{

    background:#EEF2F7;

}

/* =========================
    TEXTAREA
========================= */

.reject-box textarea{

    width:100%;

    min-height:140px;

    padding:14px;

    border:1px solid var(--border);

    border-radius:12px;

    resize:none;

    outline:none;

    font-size:14px;

    transition:.3s;

    margin-bottom:20px;

}

.reject-box textarea:focus{

    border-color:var(--primary);

}

/* =========================
    ACTIONS
========================= */

.reject-actions{

    display:flex;

    justify-content:flex-end;

    gap:12px;

    flex-wrap:wrap;

}

/* =========================
    CANCEL
========================= */

.cancel-btn{

    border:none;

    padding:12px 18px;

    border-radius:12px;

    background:#F3F4F6;

    color:var(--text-dark);

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.cancel-btn:hover{

    background:#E5E7EB;

}

/* =========================
    SUBMIT
========================= */

.submit-reject-btn{

    border:none;

    padding:12px 18px;

    border-radius:12px;

    background:#EF4444;

    color:white;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.submit-reject-btn:hover{

    background:#DC2626;

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .reject-box{

        padding:20px;

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

function openRejectModal(id)
{
    document.getElementById('rejectForm').action = '/admin/category-request/' + id + '/reject';
    document
        .getElementById('rejectModal')
        .style.display = 'flex';
}

function closeRejectModal()
{
    document
        .getElementById('rejectModal')
        .style.display = 'none';
}

window.onclick = function(e)
{
    const modal =
        document.getElementById('rejectModal');

    if(e.target === modal)
    {
        closeRejectModal();
    }
}

</script>