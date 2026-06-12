<div class="approval-card">

    <div class="approval-header">

        <div>

            <h3>

                Persetujuan Pelanggan

            </h3>

            <p>

                Ringkasan pilihan dan harga yang telah disetujui pelanggan

            </p>

        </div>

    </div>

    <!-- PRODUK DIPILIH -->

    <div class="selected-products">

        <h4>

            Produk Dipilih

        </h4>

        <div class="product-item">

            <span>

                ✓ Freon R32 Original

            </span>

            <strong>

                Rp120.000

            </strong>

        </div>

        <div class="product-item">

            <span>

                ✓ Kapasitor Panasonic

            </span>

            <strong>

                Rp75.000

            </strong>

        </div>

    </div>

    <!-- RINGKASAN BIAYA -->

    <div class="summary-box">

        <div class="summary-row">

            <span>

                Biaya Jasa

            </span>

            <strong>

                Rp150.000

            </strong>

        </div>

        <div class="summary-row">

            <span>

                Biaya Sparepart

            </span>

            <strong>

                Rp195.000

            </strong>

        </div>

        <div class="summary-divider"></div>

        <div class="summary-row total">

            <span>

                Total Final

            </span>

            <strong>

                Rp345.000

            </strong>

        </div>

    </div>

    <!-- STATUS -->

    <div class="approved-badge">

        ✅ Pelanggan telah menyetujui estimasi

    </div>

    <!-- ACTION -->

    <button class="start-work-btn">

        Mulai Perbaikan

    </button>

</div>

<style>

.approval-card{

    margin:20px;

    padding:20px;

    background:white;

    border-radius:24px;

    box-shadow:
        0 4px 12px rgba(0,0,0,.05);
}

/* HEADER */

.approval-header h3{

    margin:0;

    color:#222;
}

.approval-header p{

    margin-top:6px;

    color:#777;

    font-size:14px;
}

/* PRODUCT */

.selected-products{

    margin-top:25px;
}

.selected-products h4{

    margin-bottom:15px;

    color:#222;
}

.product-item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:14px 16px;

    background:#F8FAFC;

    border-radius:14px;

    margin-bottom:10px;
}

/* SUMMARY */

.summary-box{

    margin-top:20px;

    padding:18px;

    background:#FAFAFA;

    border-radius:16px;
}

.summary-row{

    display:flex;

    justify-content:space-between;

    margin-bottom:15px;
}

.summary-divider{

    height:1px;

    background:#E5E7EB;

    margin:15px 0;
}

.total span{

    font-weight:700;

    color:#222;
}

.total strong{

    font-size:22px;

    color:#F08A28;
}

/* BADGE */

.approved-badge{

    margin-top:20px;

    padding:15px;

    border-radius:14px;

    background:#ECFDF5;

    color:#15803D;

    font-weight:600;
}

/* BUTTON */

.start-work-btn{

    width:100%;

    height:58px;

    margin-top:20px;

    border:none;

    border-radius:16px;

    background:#22C55E;

    color:white;

    font-size:16px;

    font-weight:700;

    cursor:pointer;

    transition:.3s ease;
}

.start-work-btn:hover{

    background:#16A34A;
}

</style>