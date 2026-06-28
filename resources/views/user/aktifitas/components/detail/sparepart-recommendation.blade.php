@php

$totalSparepart = 0;

@endphp

<div class="sparepart-card">

    <div class="sparepart-header">

        <div class="sparepart-icon">
            🧩
        </div>

        <div class="sparepart-title">

            <span class="sparepart-badge">

                {{ $booking->diagnosis?->produks?->count() ?? 0 }}
                Produk Direkomendasikan

            </span>

            <h3>
                @if($booking->status == 'waiting_approval')
                    Pilih Sparepart
                @else
                    Sparepart Digunakan
                @endif
            </h3>

            <p>
                @if($booking->status == 'waiting_approval')
                    Centang sparepart yang ingin digunakan.
                @else
                    Daftar sparepart yang digunakan dalam perbaikan.
                @endif
            </p>

        </div>

    </div>

    <div class="sparepart-list">

        @forelse(
            $booking->diagnosis?->produks ?? []
            as $produk
        )

            @php
                $qty = 1;
                $isSelected = false;

                if ($produk->pivot) {
                    $qty = $produk->pivot->qty ?? 1;
                    $isSelected = $produk->pivot->is_selected ?? false;
                } else {
                    $pivotRecord = \Illuminate\Support\Facades\DB::collection('diagnosis_produks')
                        ->where('diagnosis_id', $booking->diagnosis->id)
                        ->where('produk_id', $produk->id)
                        ->first();
                    if ($pivotRecord) {
                        $qty = $pivotRecord['qty'] ?? 1;
                        $isSelected = $pivotRecord['is_selected'] ?? false;
                    }
                }

                $subtotal = $produk->harga * $qty;
                $totalSparepart += $subtotal;
            @endphp

            <div class="sparepart-item">

                <div class="left-section">

                    <input
                        type="checkbox"
                        class="produk-checkbox"
                        name="produk_ids[]"
                        value="{{ $produk->id }}"
                        data-subtotal="{{ $subtotal }}"
                        {{ $isSelected ? 'checked' : '' }}
                        {{ $booking->status !== 'waiting_approval' ? 'disabled' : '' }}
                        form="approve-form"
                    >

                    <img
                        src="{{ $produk->foto
                            ? asset('storage/'.$produk->foto)
                            : 'https://via.placeholder.com/80'
                        }}"
                        class="product-image"
                    >

                    <div class="sparepart-info">

                        <h4>

                            {{ $produk->nama_produk }}

                        </h4>

                        <p>

                            Qty :
                            {{ $qty }}

                        </p>

                        <p>

                            {{ $produk->deskripsi }}

                        </p>

                    </div>

                </div>

                <div class="right-section">

                    <span class="price">

                        Rp{{ number_format(
                            $subtotal,
                            0,
                            ',',
                            '.'
                        ) }}

                    </span>

                </div>

            </div>

        @empty

            <div class="empty-sparepart">

                <h4>
                    🧩 Belum Ada Sparepart
                </h4>

                <p>
                    Teknisi belum menambahkan rekomendasi sparepart.
                </p>

            </div>

        @endforelse

    </div>

    <div class="sparepart-total">

        <span>

            Total Sparepart Dipilih

        </span>

        <strong id="selectedTotal">

            Rp0

        </strong>

    </div>

</div>
<style>

.sparepart-card{
    background:#fff;

    border:1px solid #E2E8F0;

    border-radius:24px;

    max-width:1250px;

    margin:20px auto;

    padding:25px;

    box-sizing:border-box;

    overflow:hidden;

    margin-bottom:24px;

    box-shadow:
        0 8px 24px rgba(15,23,42,.05);
}

/* HEADER */

.sparepart-header{
    display:flex;
    align-items:center;
    gap:16px;
    margin-bottom:24px;
}

.sparepart-icon{
    width:64px;
    height:64px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:28px;

    border-radius:18px;

    background:#FFF7ED;
}

.sparepart-badge{
    display:inline-flex;

    padding:6px 12px;

    border-radius:999px;

    background:#FFF7ED;

    color:#EA580C;

    font-size:12px;
    font-weight:700;
}

.sparepart-title h3{
    margin:8px 0 4px;
    font-size:22px;
    font-weight:700;
    color:#0F172A;
}

.sparepart-title p{
    margin:0;
    color:#64748B;
    font-size:14px;
}

/* LIST */

.sparepart-list{
    display:flex;
    flex-direction:column;
    gap:14px;
}

/* ITEM */

.sparepart-item{
    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:18px;

    border:1px solid #E2E8F0;

    border-radius:18px;

    transition:.25s;
}

.sparepart-item:hover{
    border-color:#F08A28;
    transform:translateY(-2px);

    box-shadow:
        0 8px 18px rgba(240,138,40,.08);
}

.left-section{
    display:flex;
    align-items:center;
    gap:14px;
    flex:1;
}

/* CUSTOM CHECKBOX */

.produk-checkbox{
    width:22px;
    height:22px;

    accent-color:#F08A28;

    cursor:pointer;
}

/* IMAGE */

.product-image{
    width:72px;
    height:72px;

    object-fit:cover;

    border-radius:14px;

    border:1px solid #E2E8F0;
}

/* INFO */

.sparepart-info{
    flex:1;
}

.sparepart-info h4{
    margin:0 0 6px;

    font-size:16px;
    font-weight:700;

    color:#0F172A;
}

.sparepart-info p{
    margin:3px 0;

    font-size:13px;

    color:#64748B;
}

.right-section{
    text-align:right;
}

.price{
    display:block;

    font-size:18px;
    font-weight:800;

    color:#EA580C;
}

/* TOTAL BOX */

.sparepart-total{
    margin-top:24px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:18px;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #FFF7ED,
        #FFFBEB
    );

    border:1px solid #FED7AA;
}

.sparepart-total span{
    font-weight:600;
    color:#C2410C;
}

.sparepart-total strong{
    font-size:24px;
    font-weight:800;
    color:#EA580C;
}

/* EMPTY STATE */

.empty-sparepart{
    text-align:center;

    padding:40px 20px;

    border:2px dashed #CBD5E1;

    border-radius:18px;

    color:#64748B;
}

/* SELECTED EFFECT */

.sparepart-item.selected{
    border-color:#F08A28;

    background:#FFF7ED;
}

/* MOBILE */

@media(max-width:768px){

    .sparepart-item{
        flex-direction:column;
        align-items:flex-start;
        gap:16px;
    }

    .right-section{
        width:100%;
        text-align:left;
    }

    .product-image{
        width:60px;
        height:60px;
    }

    .sparepart-total strong{
        font-size:20px;
    }

}

</style>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        const checkboxes =
            document.querySelectorAll(
                '.produk-checkbox'
            );

        const totalText =
            document.getElementById(
                'selectedTotal'
            );

        function hitungTotal(){

            let total = 0;

            checkboxes.forEach(cb => {

                const card =
                    cb.closest(
                        '.sparepart-item'
                    );

                if(cb.checked){

                    total += Number(
                        cb.dataset.subtotal
                    );

                    card.classList.add(
                        'selected'
                    );

                }else{

                    card.classList.remove(
                        'selected'
                    );

                }

            });

            // CARD ATAS

            totalText.innerHTML =
                'Rp' +
                total.toLocaleString(
                    'id-ID'
                );

            // PRICE APPROVAL

            const sparepartDisplay =
                document.getElementById(
                    'sparepartTotalDisplay'
                );

            if(sparepartDisplay){

                sparepartDisplay.innerHTML =
                    'Rp' +
                    total.toLocaleString(
                        'id-ID'
                    );

            }

            const serviceFee =
                {{ $booking->diagnosis?->service_fee ?? 0 }};

            const grandTotal =
                serviceFee + total;

            const grandTotalDisplay =
                document.getElementById(
                    'grandTotalDisplay'
                );

            if(grandTotalDisplay){

                grandTotalDisplay.innerHTML =
                    'Rp' +
                    grandTotal.toLocaleString(
                        'id-ID'
                    );

            }

        }

        checkboxes.forEach(cb => {

            cb.addEventListener(
                'change',
                hitungTotal
            );

        });

        hitungTotal();

    }
);

</script>