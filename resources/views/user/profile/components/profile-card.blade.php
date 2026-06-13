<div class="profile-card">

    <div class="profile-top">

        <div class="profile-avatar" style="overflow: hidden; display: flex; align-items: center; justify-content: center; border-radius: 50%;">

            <img src="{{ Auth::user()->profile_photo
                ? asset('storage/' . Auth::user()->profile_photo)
                : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name)
            }}" style="width: 100%; height: 100%; object-fit: cover;">

            <span class="online-badge"></span>

        </div>

        <div class="profile-info">

            <div class="member-badge">

                ⭐ Member Servio
            </div>

            <h3>
                {{ Auth::user()->name }}
            </h3>

            <p>
                {{ Auth::user()->email }}
            </p>

            <button
                class="edit-profile-btn"
                onclick="openEditProfileModal()">

                ✏️ Edit Profil

            </button>

        </div>

    </div>

    <!-- SERVIOPAY E-WALLET -->
    <div class="wallet-section" style="margin-top: 25px; padding-top: 25px; border-top: 1px solid #F2F2F2; display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
        <div class="wallet-left" style="display: flex; align-items: center; gap: 15px;">
            <div class="wallet-icon" style="width: 50px; height: 50px; border-radius: 14px; background: #FFF6EE; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #F08A28;">
                💳
            </div>
            <div>
                <span class="wallet-label" style="font-size: 13px; color: #888; font-weight: 500;">Saldo ServioPay</span>
                <h4 class="wallet-balance" style="margin: 4px 0 0; font-size: 22px; font-weight: 800; color: #222;">Rp{{ number_format(Auth::user()->balance ?? 0, 0, ',', '.') }}</h4>
            </div>
        </div>
        <div class="wallet-actions" style="display: flex; gap: 10px;">
            <button class="topup-btn" onclick="openTopUpModal()" style="height: 44px; padding: 0 20px; border: none; border-radius: 12px; background: linear-gradient(135deg, #F08A28, #FF9F43); color: white; font-weight: 700; cursor: pointer; transition: .2s ease; box-shadow: 0 6px 12px rgba(240,138,40,0.2);">
                ➕ Isi Saldo
            </button>
            <button class="history-btn" onclick="openWalletHistoryModal()" style="height: 44px; padding: 0 20px; border: 1px solid #E5E7EB; border-radius: 12px; background: white; color: #555; font-weight: 600; cursor: pointer; transition: .2s ease;">
                📜 Riwayat
            </button>
        </div>
    </div>

</div>

<!-- TOP UP MODAL -->
<div class="modal-overlay" id="topUpModal">
    <div class="modal-card">
        <div class="modal-header">
            <h2>Isi Saldo ServioPay</h2>
            <button class="close-modal" onclick="closeTopUpModal()">✕</button>
        </div>
        <form action="{{ route('profile.topup') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nominal Top-Up (Rupiah)</label>
                <input type="number" id="topup_amount" name="amount" min="10000" placeholder="Minimal Rp10.000" required style="width: 100%; height: 56px; border: 1px solid #E5E7EB; border-radius: 16px; padding: 0 18px; font-size: 16px; font-weight: 600; box-sizing: border-box;">
            </div>

            <!-- Quick selections -->
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-bottom: 20px;">
                <button type="button" onclick="setTopUpAmount(20000)" style="padding: 12px; border: 1px solid #E5E7EB; border-radius: 12px; background: white; cursor: pointer; font-weight: 600; font-size: 14px; transition: .2s;">Rp20.000</button>
                <button type="button" onclick="setTopUpAmount(50000)" style="padding: 12px; border: 1px solid #E5E7EB; border-radius: 12px; background: white; cursor: pointer; font-weight: 600; font-size: 14px; transition: .2s;">Rp50.000</button>
                <button type="button" onclick="setTopUpAmount(100000)" style="padding: 12px; border: 1px solid #E5E7EB; border-radius: 12px; background: white; cursor: pointer; font-weight: 600; font-size: 14px; transition: .2s;">Rp100.000</button>
                <button type="button" onclick="setTopUpAmount(200000)" style="padding: 12px; border: 1px solid #E5E7EB; border-radius: 12px; background: white; cursor: pointer; font-weight: 600; font-size: 14px; transition: .2s;">Rp200.000</button>
            </div>

            <div class="modal-actions">
                <button type="button" class="cancel-btn" onclick="closeTopUpModal()">Batal</button>
                <button type="submit" class="save-btn">Isi Saldo Sekarang</button>
            </div>
        </form>
    </div>
</div>

<!-- WALLET HISTORY MODAL -->
@php
$walletTransactions = \App\Models\Transaction::with(['booking', 'provider'])
    ->where('customer_id', Auth::id())
    ->latest()
    ->get();
@endphp
<div class="modal-overlay" id="walletHistoryModal">
    <div class="modal-card large" style="max-height: 80vh; overflow-y: auto;">
        <div class="modal-header">
            <h2>Riwayat Saldo ServioPay</h2>
            <button class="close-modal" onclick="closeWalletHistoryModal()">✕</button>
        </div>
        <div style="display: flex; flex-direction: column; gap: 15px; max-height: 50vh; overflow-y: auto; padding-right: 5px;">
            @if($walletTransactions->isEmpty())
                <div style="text-align: center; padding: 40px; color: #888;">
                    <span style="font-size: 40px;">📜</span>
                    <p style="margin-top: 15px; font-weight: 600;">Belum ada riwayat transaksi pembayaran.</p>
                </div>
            @else
                @foreach($walletTransactions as $tx)
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; border: 1px solid #EEEEEE; border-radius: 16px; background: white; box-shadow: 0 4px 10px rgba(0,0,0,0.02);">
                        <div>
                            <h4 style="margin: 0; color: #222; font-size: 15px;">Pembayaran Booking #{{ $tx->booking->formatted_id }}</h4>
                            <p style="margin: 4px 0 0; color: #888; font-size: 12px; font-weight: 500;">
                                Kepada: {{ $tx->provider->name }} <br>
                                {{ $tx->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>
                        <div style="text-align: right;">
                            <strong style="color: #DC2626; font-size: 16px;">-Rp{{ number_format($tx->amount, 0, ',', '.') }}</strong>
                            <span style="display: block; font-size: 11px; color: #22C55E; font-weight: 700; margin-top: 4px;">✓ Sukses</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<script>
function openTopUpModal() {
    document.getElementById('topUpModal').classList.add('active');
}
function closeTopUpModal() {
    document.getElementById('topUpModal').classList.remove('active');
}
function setTopUpAmount(amount) {
    document.getElementById('topup_amount').value = amount;
}
function openWalletHistoryModal() {
    document.getElementById('walletHistoryModal').classList.add('active');
}
function closeWalletHistoryModal() {
    document.getElementById('walletHistoryModal').classList.remove('active');
}
</script>

<style>
    /* =========================
   PROFILE CARD
========================= */

.profile-card{

    max-width:1200px;

    margin:0 auto 25px;

    padding:30px;

    background:white;

    border-radius:28px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);
}

/* =========================
   TOP SECTION
========================= */

.profile-top{

    display:flex;

    align-items:center;

    gap:24px;
}

/* =========================
   AVATAR
========================= */

.profile-avatar{

    position:relative;

    width:110px;
    height:110px;

    border-radius:50%;

    background:
        linear-gradient(
            135deg,
            #FFF6EE,
            #FFE8D2
        );

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:52px;

    flex-shrink:0;
}

.online-badge{

    position:absolute;

    right:10px;
    bottom:10px;

    width:18px;
    height:18px;

    border-radius:50%;

    background:#22C55E;

    border:3px solid white;
}

/* =========================
   INFO
========================= */

.profile-info{

    flex:1;
}

.member-badge{

    width:fit-content;

    padding:6px 12px;

    border-radius:999px;

    background:#FFF6EE;

    color:#F08A28;

    font-size:12px;

    font-weight:700;

    margin-bottom:10px;
}

.profile-info h3{

    margin:0;

    font-size:30px;

    font-weight:800;

    color:#222;
}

.profile-info p{

    margin-top:8px;

    color:#777;

    font-size:15px;
}

/* =========================
   BUTTON
========================= */

.edit-profile-btn{

    margin-top:18px;

    height:44px;

    padding:0 18px;

    border:none;

    border-radius:12px;

    background:#FFF6EE;

    color:#F08A28;

    font-weight:700;

    cursor:pointer;

    transition:.3s ease;
}

.edit-profile-btn:hover{

    background:#F08A28;

    color:white;
}

/* =========================
   STATS
========================= */

.profile-stats{

    margin-top:28px;

    padding-top:24px;

    border-top:1px solid #F2F2F2;

    display:flex;

    justify-content:space-around;

    align-items:center;
}

.stat-item{

    text-align:center;
}

.stat-item strong{

    display:block;

    font-size:28px;

    font-weight:800;

    color:#222;
}

.stat-item span{

    color:#888;

    font-size:14px;
}

.stat-divider{

    width:1px;

    height:45px;

    background:#ECECEC;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .profile-card{

        margin:15px;

        padding:24px;
    }

    .profile-top{

        flex-direction:column;

        text-align:center;
    }

    .profile-info{

        display:flex;

        flex-direction:column;

        align-items:center;
    }

    .profile-info h3{

        font-size:24px;
    }

    .profile-stats{

        gap:15px;
    }

    .stat-item strong{

        font-size:22px;
    }

}
</style>