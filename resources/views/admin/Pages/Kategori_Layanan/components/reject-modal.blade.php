<div id="rejectModal" class="reject-modal">

    <div class="reject-box">

        <h3>
            Alasan Penolakan
        </h3>

        <p>
            Berikan alasan kenapa pengajuan
            penyedia layanan ditolak.
        </p>

        <form id="rejectForm">

            <textarea
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

    background:rgba(15,23,42,0.45);

    display:none;

    justify-content:center;
    align-items:center;

    z-index:9999;

    padding:20px;

}

/* =========================
    BOX
========================= */

.reject-box{

    width:100%;
    max-width:500px;

    background:white;

    border-radius:28px;

    padding:30px;

    box-shadow:
    0 20px 50px rgba(0,0,0,0.15);

    animation:modalFade 0.25s ease;

}

@keyframes modalFade{

    from{
        transform:translateY(20px);
        opacity:0;
    }

    to{
        transform:translateY(0);
        opacity:1;
    }

}

/* =========================
    TEXT
========================= */

.reject-box h3{

    font-size:28px;
    font-weight:800;

    color:#111827;

    margin-bottom:10px;

}

.reject-box p{

    color:#6b7280;

    line-height:1.7;

    margin-bottom:22px;

}

/* =========================
    TEXTAREA
========================= */

.reject-box textarea{

    width:100%;

    height:140px;

    border:1px solid #e5e7eb;

    border-radius:18px;

    padding:16px;

    resize:none;

    font-size:14px;

    outline:none;

    transition:0.25s ease;

    margin-bottom:22px;

}

.reject-box textarea:focus{

    border-color:#ff9a3d;

}

/* =========================
    ACTIONS
========================= */

.reject-actions{

    display:flex;

    justify-content:flex-end;

    gap:14px;

    flex-wrap:wrap;

}

/* CANCEL */

.cancel-btn{

    padding:14px 24px;

    border:none;

    border-radius:14px;

    background:#f3f4f6;

    color:#475569;

    font-weight:700;

    cursor:pointer;

}

/* SUBMIT */

.submit-reject-btn{

    padding:14px 24px;

    border:none;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        #ef4444,
        #dc2626
    );

    color:white;

    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

}

.submit-reject-btn:hover,
.cancel-btn:hover{

    transform:translateY(-2px);

}

</style>

<script>

function openRejectModal()
{
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
    let modal =
        document.getElementById('rejectModal');

    if(e.target == modal)
    {
        closeRejectModal();
    }
}

</script>