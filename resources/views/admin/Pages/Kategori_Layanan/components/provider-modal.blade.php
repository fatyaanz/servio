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

    background:rgba(15,23,42,0.45);

    backdrop-filter:blur(4px);

    display:flex;

    align-items:center;
    justify-content:center;

    padding:20px;

    z-index:9999;

    opacity:0;

    visibility:hidden;

    transition:0.25s ease;

}

/* ACTIVE */

.provider-modal-overlay.active{

    opacity:1;

    visibility:visible;

}

/* =========================
   MODAL
========================= */

.provider-modal{

    width:100%;

    max-width:1200px;

    background:white;

    border-radius:26px;

    padding:26px;

    max-height:88vh;

    overflow-y:auto;

    box-shadow:
    0 20px 60px rgba(15,23,42,0.18);

    animation:modalUp 0.25s ease;

}

/* SCROLLBAR */

.provider-modal::-webkit-scrollbar{
    width:6px;
}

.provider-modal::-webkit-scrollbar-thumb{

    background:#d1d5db;

    border-radius:20px;

}

/* =========================
   ANIMATION
========================= */

@keyframes modalUp{

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
   HEADER
========================= */

.provider-modal-header{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:18px;

    margin-bottom:24px;

}

.provider-modal-header h2{

    font-size:24px;

    font-weight:800;

    color:#111827;

    margin-bottom:6px;

}

.provider-modal-header p{

    color:#6b7280;

    font-size:13px;

    line-height:1.5;

}

/* =========================
   CLOSE BUTTON
========================= */

.close-modal-btn{

    width:46px;
    height:46px;

    border:none;

    border-radius:14px;

    background:#f3f4f6;

    font-size:18px;

    cursor:pointer;

    transition:0.2s ease;

}

.close-modal-btn:hover{

    background:#111827;

    color:white;

}

/* =========================
   TABLE WRAPPER
========================= */

.provider-table-wrapper{

    width:100%;

    overflow-x:auto;

}

/* =========================
   TABLE
========================= */

.provider-table{

    width:100%;

    border-collapse:separate;

    border-spacing:0 12px;

}

/* HEAD */

.provider-table thead th{

    text-align:left;

    padding:0 16px 8px;

    color:#94a3b8;

    font-size:12px;

    font-weight:700;

    white-space:nowrap;

}

/* BODY */

.provider-table tbody td{

    background:#f8fafc;

    padding:16px;

    font-size:13px;

    color:#475569;

    vertical-align:middle;

    border-top:1px solid #eef2f7;

    border-bottom:1px solid #eef2f7;

    transition:.2s ease;

}

/* HOVER */

.provider-table tbody tr:hover td{

    background:white;

}

/* RADIUS */

.provider-table tbody tr td:first-child{

    border-left:1px solid #eef2f7;

    border-radius:18px 0 0 18px;

}

.provider-table tbody tr td:last-child{

    border-right:1px solid #eef2f7;

    border-radius:0 18px 18px 0;

}

/* =========================
   PROVIDER INFO
========================= */

.provider-info{

    display:flex;

    align-items:center;

    gap:14px;

    min-width:240px;

}

/* AVATAR */

.provider-avatar{

    width:58px;
    height:58px;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #ffb56b,
        #ff7a00
    );

    display:flex;

    align-items:center;
    justify-content:center;

    color:white;

    font-size:18px;

    font-weight:700;

    flex-shrink:0;

}

/* DETAIL */

.provider-detail h4{

    font-size:15px;

    font-weight:700;

    color:#111827;

    margin-bottom:4px;

}

.provider-detail p{

    font-size:12px;

    color:#6b7280;

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

    border:1px solid #e2e8f0;

    color:#475569;

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:500;

}

/* =========================
   STATUS
========================= */

.provider-status{

    width:max-content;

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;

}

.provider-status.active{

    background:#ecfdf3;

    color:#16a34a;

}

/* =========================
   BUTTON
========================= */

.remove-btn{

    border:none;

    padding:10px 16px;

    border-radius:12px;

    background:#fff1f2;

    color:#ef4444;

    font-size:12px;

    font-weight:700;

    cursor:pointer;

    transition:.2s ease;

}

.remove-btn:hover{

    background:#ef4444;

    color:white;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:992px){

    .provider-modal{

        padding:22px;

    }

    .provider-table{

        min-width:780px;

    }

}

@media(max-width:768px){

    .provider-modal-overlay{

        padding:14px;

    }

    .provider-modal{

        padding:18px;

        border-radius:22px;

        max-height:90vh;

    }

    .provider-modal-header h2{

        font-size:20px;

    }

    .provider-modal-header p{

        font-size:12px;

    }

    .close-modal-btn{

        width:40px;
        height:40px;

        font-size:16px;

    }

}

</style>