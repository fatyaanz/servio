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

    transition:.3s;

}

tr:hover td{

    background:#FFF8F1;

}

/* =========================
   TABLE CELL
========================= */

td{

    padding:16px 14px;

    vertical-align:middle;

    background:#FAFAFA;

    border-top:1px solid var(--border);

    border-bottom:1px solid var(--border);

}

tr td:first-child{

    border-left:1px solid var(--border);

    border-radius:16px 0 0 16px;

}

tr td:last-child{

    border-right:1px solid var(--border);

    border-radius:0 16px 16px 0;

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

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    display:flex;

    align-items:center;
    justify-content:center;

    color:white;

    font-size:14px;

    font-weight:700;

    flex-shrink:0;

}

/* =========================
   DETAIL
========================= */

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

    max-width:320px;

}

.sub-service span{

    padding:6px 12px;

    border-radius:999px;

    background:white;

    border:1px solid var(--border);

    font-size:12px;

    color:var(--text-dark);

    white-space:nowrap;

}

/* =========================
   STATUS
========================= */

.provider-status{

    width:max-content;

    padding:6px 12px;

    border-radius:999px;

    font-size:12px;

    font-weight:600;

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

        width:42px;
        height:42px;

        font-size:13px;

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

        font-size:11px;

    }

}

</style>