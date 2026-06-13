<div class="modal-overlay" id="addressModal">

    <div class="modal-card large">

        <div class="modal-header">

            <h2>
                Alamat Tersimpan
            </h2>

            <button
                class="close-modal"
                onclick="closeAddressModal()">

                ✕

            </button>

        </div>

        <!-- ALAMAT UTAMA -->
        @if(Auth::user()->address)
        <div class="address-card">

            <div class="address-top">

                <div class="address-type">

                    🏠 Rumah

                    <span class="default-badge">
                        Utama
                    </span>

                </div>

            </div>

            <h4>
                {{ Auth::user()->name }}
            </h4>

            <p class="phone">

                {{ Auth::user()->phone }}

            </p>

            <p class="address-text">

                {{ Auth::user()->address }}

            </p>

            <div class="address-actions">

                <button class="edit-btn" onclick="closeAddressModal(); openEditProfileModal();">
                    ✏ Edit
                </button>

            </div>

        </div>
        @else
        <div style="text-align: center; padding: 40px; color: #888;">
            <span style="font-size: 40px;">📍</span>
            <p style="margin-top: 15px; font-weight: 600;">Alamat utama belum dikonfigurasi.</p>
            <button class="add-address-btn" onclick="closeAddressModal(); openEditProfileModal();" style="margin-top: 15px; width: auto; padding: 0 25px;">
                ⚙️ Atur Alamat Sekarang
            </button>
        </div>
        @endif

        <button
            class="add-address-btn"
            onclick="openAddAddressModal()">

            + Tambah Alamat Baru

        </button>

    </div>

</div>

<style>

    .address-card{

    border:1px solid #EAEAEA;

    border-radius:18px;

    padding:18px;

    margin-bottom:15px;

    background:#FFF;

    transition:.3s;
}

.address-card:hover{

    border-color:#F08A28;

    box-shadow:
        0 8px 20px rgba(240,138,40,.10);
}

.address-top{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:12px;
}

.address-type{

    font-weight:700;

    color:#222;

    display:flex;

    align-items:center;

    gap:10px;
}

.default-badge{

    background:#FFF3E6;

    color:#F08A28;

    padding:4px 10px;

    border-radius:20px;

    font-size:12px;

    font-weight:700;
}

.address-card h4{

    margin:0 0 5px;

    color:#222;

    font-size:16px;
}

.phone{

    margin:0 0 10px;

    color:#666;

    font-size:14px;
}

.address-text{

    color:#555;

    line-height:1.6;

    font-size:14px;
}

.address-actions{

    display:flex;

    gap:10px;

    margin-top:15px;
}

.edit-btn{

    border:none;

    background:#EEF4FF;

    color:#2563EB;

    padding:10px 16px;

    border-radius:10px;

    cursor:pointer;

    font-weight:600;
}

.edit-btn:hover{

    background:#DCEAFF;
}

.delete-btn{

    border:none;

    background:#FFF0F0;

    color:#DC2626;

    padding:10px 16px;

    border-radius:10px;

    cursor:pointer;

    font-weight:600;
}

.delete-btn:hover{

    background:#FFE2E2;
}

.add-address-btn{

    width:100%;

    height:55px;

    border:none;

    border-radius:14px;

    background:#F08A28;

    color:white;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    margin-top:5px;
}

.add-address-btn:hover{

    opacity:.9;
}
    .modal-overlay{

    position:fixed;

    inset:0;

    background:rgba(0,0,0,.5);

    display:none;

    align-items:center;

    justify-content:center;

    z-index:99999;
}

.modal-overlay.active{

    display:flex;
}

.modal-card{

    width:100%;

    max-width:700px;

    background:white;

    border-radius:24px;

    padding:25px;
}
</style>