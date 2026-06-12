<div
    class="provider-modal-overlay"
    id="providerModal"
>

    <div class="provider-modal">

        <!-- HEADER -->

        <div class="provider-modal-header">

            <div>

                <h2>
                    Penyedia Layanan AC
                </h2>

                <p>
                    Daftar provider yang mengambil kategori ini
                </p>

            </div>

            <button
                class="close-modal-btn"
                onclick="closeProviderModal()"
            >

                ✕

            </button>

        </div>

        <!-- TABLE -->

        <div class="provider-table-wrapper">

            <table class="provider-table">

                <thead>

                    <tr>

                        <th>
                            Penyedia
                        </th>

                        <th>
                            Sub Layanan
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <!-- ROW -->

                    <tr>

                        <!-- PROVIDER -->

                        <td>

                            <div class="provider-info">

                                <div class="provider-avatar">

                                    AJ

                                </div>

                                <div class="provider-detail">

                                    <h4>
                                        Andi Jaya Teknik
                                    </h4>

                                    <p>
                                        andi@gmail.com
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- SUB LAYANAN -->

                        <td>

                            <div class="sub-service">

                                <span>
                                    Cuci AC
                                </span>

                                <span>
                                    Isi Freon
                                </span>

                                <span>
                                    Bongkar Pasang
                                </span>

                            </div>

                        </td>

                        <!-- STATUS -->

                        <td>

                            <div class="provider-status active">

                                Aktif

                            </div>

                        </td>

                        <!-- BUTTON -->

                        <td>

                            <button class="remove-btn">

                                Hapus

                            </button>

                        </td>

                    </tr>

                    <!-- ROW -->

                    <tr>

                        <td>

                            <div class="provider-info">

                                <div class="provider-avatar">

                                    AJ

                                </div>

                                <div class="provider-detail">

                                    <h4>
                                        Andi Jaya Teknik
                                    </h4>

                                    <p>
                                        andi@gmail.com
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td>

                            <div class="sub-service">

                                <span>
                                    Cuci AC
                                </span>

                                <span>
                                    Isi Freon
                                </span>

                                <span>
                                    Bongkar Pasang
                                </span>

                            </div>

                        </td>

                        <td>

                            <div class="provider-status active">

                                Aktif

                            </div>

                        </td>

                        <td>

                            <button class="remove-btn">

                                Hapus

                            </button>

                        </td>

                    </tr>

                    <!-- ROW -->

                    <tr>

                        <td>

                            <div class="provider-info">

                                <div class="provider-avatar">

                                    AJ

                                </div>

                                <div class="provider-detail">

                                    <h4>
                                        Andi Jaya Teknik
                                    </h4>

                                    <p>
                                        andi@gmail.com
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td>

                            <div class="sub-service">

                                <span>
                                    Cuci AC
                                </span>

                                <span>
                                    Isi Freon
                                </span>

                                <span>
                                    Bongkar Pasang
                                </span>

                            </div>

                        </td>

                        <td>

                            <div class="provider-status active">

                                Aktif

                            </div>

                        </td>

                        <td>

                            <button class="remove-btn">

                                Hapus

                            </button>

                        </td>

                    </tr>

                    <!-- ROW -->

                    <tr>

                        <td>

                            <div class="provider-info">

                                <div class="provider-avatar">

                                    AJ

                                </div>

                                <div class="provider-detail">

                                    <h4>
                                        Andi Jaya Teknik
                                    </h4>

                                    <p>
                                        andi@gmail.com
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td>

                            <div class="sub-service">

                                <span>
                                    Cuci AC
                                </span>

                                <span>
                                    Isi Freon
                                </span>

                                <span>
                                    Bongkar Pasang
                                </span>

                            </div>

                        </td>

                        <td>

                            <div class="provider-status active">

                                Aktif

                            </div>

                        </td>

                        <td>

                            <button class="remove-btn">

                                Hapus

                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>

/* =========================
   OPEN MODAL
========================= */

function openProviderModal(){

    document
    .getElementById('providerModal')
    .classList
    .add('active');

    document.body.style.overflow = "hidden";

}

/* =========================
   CLOSE MODAL
========================= */

function closeProviderModal(){

    document
    .getElementById('providerModal')
    .classList
    .remove('active');

    document.body.style.overflow = "auto";

}

/* =========================
   CLOSE OUTSIDE
========================= */

window.addEventListener('click', function(e){

    const modal =
    document.getElementById('providerModal');

    if(e.target === modal){

        closeProviderModal();

    }

});

</script>

<style>

/* =========================
   OVERLAY
========================= */

.provider-modal-overlay{

    position:fixed;

    inset:0;

    background:rgba(15,23,42,.45);

    backdrop-filter:blur(4px);

    display:flex;

    justify-content:center;
    align-items:center;

    padding:20px;

    z-index:9999;

    opacity:0;
    visibility:hidden;

    transition:.3s;

}

.provider-modal-overlay.active{

    opacity:1;

    visibility:visible;

}

/* =========================
   MODAL
========================= */

.provider-modal{

    width:100%;

    max-width:1100px;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:24px;

    max-height:90vh;

    overflow-y:auto;

    box-shadow:var(--shadow-md);

    animation:modalUp .25s ease;

}

.provider-modal::-webkit-scrollbar{

    width:6px;

}

.provider-modal::-webkit-scrollbar-thumb{

    background:#D1D5DB;

    border-radius:999px;

}

/* =========================
   ANIMATION
========================= */

@keyframes modalUp{

    from{

        transform:translateY(15px);

        opacity:0;

    }

    to{

        transform:translateY(0);

        opacity:1;

    }

}

/* =========================
   HEADER
========================= */

.provider-modal-header{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:20px;

    margin-bottom:24px;

}

.provider-modal-header h2{

    font-size:24px;

    font-weight:700;

    color:var(--text-dark);

    margin-bottom:4px;

}

.provider-modal-header p{

    font-size:14px;

    color:var(--text-secondary);

}

/* =========================
   CLOSE BUTTON
========================= */

.close-modal-btn{

    width:42px;
    height:42px;

    border:none;

    border-radius:12px;

    background:#F8FAFC;

    color:var(--text-dark);

    cursor:pointer;

    transition:.3s;

}

.close-modal-btn:hover{

    background:var(--primary);

    color:white;

}

/* =========================
   TABLE
========================= */

.provider-table-wrapper{

    overflow-x:auto;

}

.provider-table{

    width:100%;

    border-collapse:separate;

    border-spacing:0 10px;

}

.provider-table thead th{

    text-align:left;

    padding:0 14px 10px;

    font-size:13px;

    font-weight:600;

    color:var(--text-secondary);

    white-space:nowrap;

}

.provider-table tbody td{

    background:#FAFAFA;

    padding:16px 14px;

    border-top:1px solid var(--border);

    border-bottom:1px solid var(--border);

    font-size:14px;

    color:var(--text-dark);

    vertical-align:middle;

}

.provider-table tbody tr td:first-child{

    border-left:1px solid var(--border);

    border-radius:16px 0 0 16px;

}

.provider-table tbody tr td:last-child{

    border-right:1px solid var(--border);

    border-radius:0 16px 16px 0;

}

.provider-table tbody tr:hover td{

    background:#FFF8F1;

}

/* =========================
   PROVIDER INFO
========================= */

.provider-info{

    display:flex;

    align-items:center;

    gap:12px;

    min-width:240px;

}

.provider-avatar{

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    color:white;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:15px;

    font-weight:700;

    flex-shrink:0;

}

.provider-detail h4{

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:4px;

}

.provider-detail p{

    font-size:12px;

    color:var(--text-secondary);

}

/* =========================
   SUB SERVICE
========================= */

.sub-service{

    display:flex;

    flex-wrap:wrap;

    gap:8px;

}

.sub-service span{

    background:white;

    border:1px solid var(--border);

    padding:6px 12px;

    border-radius:999px;

    font-size:12px;

    color:var(--text-dark);

}

/* =========================
   STATUS
========================= */

.provider-status{

    padding:6px 12px;

    border-radius:999px;

    font-size:12px;

    font-weight:600;

    width:max-content;

}

.provider-status.active{

    background:#DCFCE7;

    color:#16A34A;

}

/* =========================
   REMOVE BUTTON
========================= */

.remove-btn{

    border:none;

    padding:10px 14px;

    border-radius:12px;

    background:#FFF1F2;

    color:#EF4444;

    font-size:13px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.remove-btn:hover{

    background:#EF4444;

    color:white;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:992px){

    .provider-table{

        min-width:850px;

    }

}

@media(max-width:768px){

    .provider-modal{

        padding:20px;

    }

    .provider-modal-header{

        flex-direction:column;

    }

}

</style>