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

    <!-- AKSI -->

    <td>

        <button class="remove-btn">

            Hapus

        </button>

    </td>

</tr>

<style>

/* =========================
   TABLE ROW
========================= */

tr{

    transition:.2s ease;

}

tr:hover td{

    background:#ffffff;

}

/* =========================
   TABLE CELL
========================= */

td{

    padding:16px 14px;

    vertical-align:middle;

    background:#f8fafc;

    border-top:1px solid #eef2f7;

    border-bottom:1px solid #eef2f7;

}

/* FIRST */

tr td:first-child{

    border-left:1px solid #eef2f7;

    border-radius:18px 0 0 18px;

}

/* LAST */

tr td:last-child{

    border-right:1px solid #eef2f7;

    border-radius:0 18px 18px 0;

}

/* =========================
   PROVIDER INFO
========================= */

.provider-info{

    display:flex;

    align-items:center;

    gap:12px;

    min-width:220px;

}

/* =========================
   AVATAR
========================= */

.provider-avatar{

    width:50px;
    height:50px;

    border-radius:16px;

    background:linear-gradient(
        135deg,
        #ffb56b,
        #ff7a00
    );

    display:flex;

    align-items:center;
    justify-content:center;

    color:white;

    font-size:15px;

    font-weight:700;

    flex-shrink:0;

    box-shadow:
    0 4px 10px rgba(255,122,0,0.18);

}

/* =========================
   DETAIL
========================= */

.provider-detail{

    display:flex;

    flex-direction:column;

}

.provider-detail h4{

    font-size:14px;

    font-weight:700;

    color:#111827;

    margin:0 0 4px;

    line-height:1.3;

}

.provider-detail p{

    font-size:12px;

    color:#6b7280;

    margin:0;

    line-height:1.4;

}

/* =========================
   SUB SERVICE
========================= */

.sub-service{

    display:flex;

    flex-wrap:wrap;

    gap:8px;

    max-width:320px;

}

.sub-service span{

    background:white;

    border:1px solid #e2e8f0;

    color:#475569;

    padding:7px 12px;

    border-radius:999px;

    font-size:11px;

    font-weight:600;

    white-space:nowrap;

}

/* =========================
   STATUS
========================= */

.provider-status{

    width:max-content;

    padding:8px 14px;

    border-radius:999px;

    font-size:11px;

    font-weight:700;

    letter-spacing:.2px;

}

.provider-status.active{

    background:#ecfdf3;

    color:#16a34a;

}

/* =========================
   REMOVE BUTTON
========================= */

.remove-btn{

    border:none;

    padding:9px 15px;

    border-radius:12px;

    background:#fff1f2;

    color:#ef4444;

    font-size:11px;

    font-weight:700;

    cursor:pointer;

    transition:.2s ease;

}

.remove-btn:hover{

    background:#ef4444;

    color:white;

    transform:translateY(-2px);

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    td{

        padding:14px 10px;

    }

    .provider-info{

        min-width:190px;

    }

    .provider-avatar{

        width:44px;
        height:44px;

        font-size:13px;

        border-radius:14px;

    }

    .provider-detail h4{

        font-size:13px;

    }

    .provider-detail p{

        font-size:11px;

    }

    .sub-service{

        max-width:220px;

    }

    .sub-service span{

        font-size:10px;

        padding:6px 10px;

    }

    .remove-btn{

        padding:8px 13px;

        font-size:10px;

    }

}

</style>