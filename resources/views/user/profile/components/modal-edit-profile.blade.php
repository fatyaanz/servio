<!-- =========================
    EDIT PROFILE MODAL
========================= -->

<div class="modal-overlay" id="editProfileModal">

    <div class="modal-card">

        <!-- HEADER -->

        <div class="modal-header">

            <h2>Edit Profil</h2>

            <button
                class="close-modal"
                onclick="closeEditProfileModal()">

                ✕

            </button>

        </div>

        <!-- PHOTO -->

        <div class="profile-photo">

            👤

        </div>

        <button class="change-photo-btn">

            Ubah Foto Profil

        </button>

        <!-- FORM -->

        <form>

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    value="Muhammad Nabil">

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    value="muhammad@email.com">

            </div>

            <div class="form-group">

                <label>Nomor HP</label>

                <input
                    type="text"
                    value="081234567890">

            </div>

            <!-- BUTTON ACTION -->

            <div class="modal-actions">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeEditProfileModal()">

                    Batal

                </button>

                <button
                    type="submit"
                    class="save-btn">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

<style>

/* =========================
   OVERLAY
========================= */

.modal-overlay{

    position:fixed;
    inset:0;

    display:none;
    align-items:center;
    justify-content:center;

    padding:20px;

    background:rgba(0,0,0,.55);

    backdrop-filter:blur(8px);

    z-index:9999;
}

.modal-overlay.active{

    display:flex;

    animation:fadeIn .25s ease;
}

/* =========================
   ANIMATION
========================= */

@keyframes fadeIn{

    from{
        opacity:0;
    }

    to{
        opacity:1;
    }
}

@keyframes slideUp{

    from{
        opacity:0;
        transform:translateY(30px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* =========================
   CARD
========================= */

.modal-card{

    width:100%;
    max-width:560px;

    background:#FFFFFF;

    border-radius:28px;

    padding:35px;

    box-shadow:
        0 25px 60px rgba(0,0,0,.18);

    animation:slideUp .3s ease;
}

/* =========================
   HEADER
========================= */

.modal-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;
}

.modal-header h2{

    font-size:26px;

    font-weight:700;

    color:#1F2937;
}

.close-modal{

    width:42px;

    height:42px;

    border:none;

    border-radius:12px;

    background:#F3F4F6;

    cursor:pointer;

    font-size:18px;

    transition:.25s;
}

.close-modal:hover{

    background:#E5E7EB;

    transform:rotate(90deg);
}

/* =========================
   PHOTO
========================= */

.profile-photo{

    width:120px;

    height:120px;

    margin:auto;

    border-radius:50%;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB347
    );

    display:flex;

    align-items:center;

    justify-content:center;

    color:white;

    font-size:52px;

    box-shadow:
        0 12px 25px rgba(240,138,40,.3);
}

.change-photo-btn{

    display:block;

    margin:18px auto 35px;

    border:none;

    background:none;

    color:#F08A28;

    font-weight:700;

    cursor:pointer;

    transition:.25s;
}

.change-photo-btn:hover{

    opacity:.8;
}

/* =========================
   FORM
========================= */

.form-group{

    margin-bottom:20px;
}

.form-group label{

    display:block;

    margin-bottom:8px;

    color:#374151;

    font-size:14px;

    font-weight:600;
}

.form-group input{

    width:100%;

    height:56px;

    padding:0 18px;

    border:1px solid #E5E7EB;

    border-radius:16px;

    font-size:15px;

    box-sizing:border-box;
}

.form-group input:focus{

    outline:none;

    border-color:#F08A28;

    box-shadow:
        0 0 0 4px rgba(240,138,40,.15);
}

/* =========================
   BUTTONS
========================= */

.modal-actions{

    display:flex;

    gap:12px;

    margin-top:30px;
}

.cancel-btn{

    flex:1;

    height:58px;

    border:none;

    border-radius:16px;

    background:#F3F4F6;

    color:#374151;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    transition:.25s;
}

.cancel-btn:hover{

    background:#E5E7EB;
}

.save-btn{

    flex:2;

    height:58px;

    border:none;

    border-radius:16px;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FF9F43
    );

    color:white;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    transition:.25s;
}

.save-btn:hover{

    transform:translateY(-2px);

    box-shadow:
        0 12px 25px rgba(240,138,40,.35);
}

.save-btn:active{

    transform:scale(.98);
}

/* =========================
   RESPONSIVE TABLET
========================= */

@media(max-width:768px){

    .modal-card{

        padding:28px 24px;
    }

    .profile-photo{

        width:100px;
        height:100px;

        font-size:45px;
    }

    .modal-header h2{

        font-size:22px;
    }
}

/* =========================
   RESPONSIVE MOBILE
========================= */

@media(max-width:480px){

    .modal-overlay{

        padding:15px;
    }

    .modal-card{

        padding:22px 18px;

        border-radius:22px;
    }

    .modal-header{

        margin-bottom:22px;
    }

    .modal-header h2{

        font-size:20px;
    }

    .profile-photo{

        width:90px;
        height:90px;

        font-size:40px;
    }

    .form-group input{

        height:52px;
    }

    .modal-actions{

        flex-direction:column;
    }

    .cancel-btn,
    .save-btn{

        width:100%;
        height:54px;
    }
}

</style>

<script>

function openEditProfileModal(){

    document
        .getElementById('editProfileModal')
        .classList.add('active');
}

function closeEditProfileModal(){

    document
        .getElementById('editProfileModal')
        .classList.remove('active');
}

/* Klik area gelap untuk menutup */

document
.getElementById('editProfileModal')
.addEventListener('click', function(e){

    if(e.target === this){

        closeEditProfileModal();
    }

});

</script>