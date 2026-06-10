<tr>

    <!-- KATEGORI -->

    <td>

        <div class="category-info">

            <div class="category-icon">

                @if($category->icon)

                    <img
                        src="{{ asset('storage/'.$category->icon) }}"
                        alt="{{ $category->name }}"
                    >

                @else

                    <span>📁</span>

                @endif

            </div>

            <div class="category-detail">

                <h4>
                    {{ $category->name }}
                </h4>

                <p>
                    Kategori layanan Servio
                </p>

            </div>

        </div>

    </td>

    <!-- JUMLAH PROVIDER -->

    <td>

        <div class="provider-count">

            {{ $category->providers_count }} Penyedia

        </div>

    </td>

    <!-- LIHAT PROVIDER -->

    <td>

        <a
            href="{{ route('categories.providers', $category->id) }}"
            class="provider-btn"
        >
            👥 Lihat Penyedia
        </a>

    </td>

    <!-- DIBUAT -->

    <td>

        <div class="date-info">

            {{ $category->created_at->format('d M Y') }}

        <span>
            {{ $category->created_at->format('H:i') }} WIB
        </span>

        </div>

    </td>

    <!-- STATUS -->

    <td>

        <div class="status-badge active">

            {{ $category->is_active ? 'Aktif' : 'Nonaktif' }}

        </div>

    </td>

    <!-- AKSI -->

    <td>

        <div class="action-group">

            <a
                href="{{ route('categories.edit', $category->id) }}"
                class="edit-btn"
                title="Edit Kategori"
            >
                ✏️
            </a>

        </div>

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
   CATEGORY INFO
========================= */

.category-info{

    display:flex;

    align-items:center;

    gap:14px;

    min-width:240px;

}

/* =========================
   ICON
========================= */

.category-icon{

    width:56px;
    height:56px;

    border-radius:16px;

    background:#fff4e8;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:24px;

    flex-shrink:0;

}

/* =========================
   DETAIL
========================= */

.category-detail{

    display:flex;

    flex-direction:column;

}

.category-detail h4{

    font-size:14px;

    font-weight:700;

    color:#111827;

    margin:0 0 4px;

    line-height:1.3;

}

.category-detail p{

    font-size:12px;

    color:#6b7280;

    margin:0;

    line-height:1.4;

}

/* =========================
   PROVIDER COUNT
========================= */

.provider-count{

    font-size:13px;

    font-weight:600;

    color:#475569;

    white-space:nowrap;

}

/* =========================
   PROVIDER BUTTON
========================= */

.provider-btn{

    border:none;

    padding:10px 14px;

    border-radius:12px;

    background:#fff7ed;

    color:#ff7a00;

    font-size:12px;

    font-weight:700;

    cursor:pointer;

    transition:.2s ease;

    white-space:nowrap;

}

.provider-btn:hover{

    background:#ffedd5;

    transform:translateY(-2px);

}

/* =========================
   DATE
========================= */

.date-info{

    display:flex;

    flex-direction:column;

    gap:3px;

    font-size:13px;

    font-weight:600;

    color:#334155;

    white-space:nowrap;

}

.date-info span{

    font-size:11px;

    color:#94a3b8;

}

/* =========================
   STATUS
========================= */

.status-badge{

    width:max-content;

    padding:8px 14px;

    border-radius:999px;

    font-size:11px;

    font-weight:700;

}

.status-badge.active{

    background:#ecfdf3;

    color:#16a34a;

}

/* =========================
   ACTION GROUP
========================= */

.action-group{

    display:flex;

    align-items:center;

    gap:8px;

}

/* =========================
   BUTTONS
========================= */

.edit-btn{

    width:40px;
    height:40px;

    display:flex;

    align-items:center;
    justify-content:center;

    text-decoration:none;

    border-radius:12px;

    cursor:pointer;

    font-size:14px;

    transition:.2s ease;

    background:#fff7ed;

    color:#ff7a00;

}

/* HOVER */

.edit-btn:hover{

    transform:translateY(-2px);

    background:#ff7a00;

    color:white;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    td{

        padding:14px 10px;

    }

    .category-info{

        min-width:200px;

    }

    .category-icon{

        width:48px;
        height:48px;

        font-size:20px;

    }

    .category-detail h4{

        font-size:13px;

    }

    .category-detail p{

        font-size:11px;

    }

    .provider-btn{

        padding:9px 12px;

        font-size:11px;

    }

    .edit-btn{

        width:36px;
        height:36px;

        font-size:12px;

    }

}

.category-icon{

    width:56px;
    height:56px;

    border-radius:16px;

    background:#fff4e8;

    display:flex;

    align-items:center;
    justify-content:center;

    overflow:hidden;

    flex-shrink:0;

}

.category-icon img{

    width:100%;
    height:100%;

    object-fit:cover;

    border-radius:16px;

}

.provider-btn{

    text-decoration:none;

    display:inline-flex;

    align-items:center;
    justify-content:center;
}

</style>