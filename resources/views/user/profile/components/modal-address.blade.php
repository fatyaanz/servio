<div class="modal-overlay" id="addressModal">
    <div class="modal-card large" style="max-height: 85vh; overflow-y: auto;">
        <div class="modal-header">
            <h2>Alamat Tersimpan</h2>
            <button class="close-modal" onclick="closeAddressModal()">✕</button>
        </div>

        <div class="address-list-container" style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 20px; max-height: 55vh; overflow-y: auto; padding-right: 5px;">
            @if($addresses->isEmpty())
                <div style="text-align: center; padding: 40px; color: #888;">
                    <span style="font-size: 40px;">📍</span>
                    <p style="margin-top: 15px; font-weight: 600; color: #555;">Belum ada alamat tersimpan.</p>
                    <p style="font-size: 13px; color: #888; margin-top: 5px;">Tambahkan alamat baru untuk memudahkan proses pemesanan.</p>
                </div>
            @else
                @foreach($addresses as $addr)
                    <div class="address-card {{ $addr->is_primary ? 'primary-border' : '' }}">
                        <div class="address-top">
                            <div class="address-type">
                                @if(strtolower($addr->label) === 'rumah')
                                    🏠
                                @elseif(strtolower($addr->label) === 'kantor')
                                    🏢
                                @else
                                    📍
                                @endif
                                {{ $addr->label }}

                                @if($addr->is_primary)
                                    <span class="default-badge">Utama</span>
                                @endif
                            </div>
                        </div>

                        <h4 style="margin: 8px 0 4px; font-weight: 700; color: #222;">{{ $addr->receiver_name }}</h4>
                        <p class="phone" style="margin: 0 0 8px; color: #666; font-size: 13px; font-weight: 500;">📞 {{ $addr->phone }}</p>
                        <p class="address-text" style="margin: 0 0 10px; color: #444; font-size: 14px; line-height: 1.5;">{{ $addr->address_text }}</p>
                        
                        @if($addr->latitude && $addr->longitude)
                            <div class="coords-badge" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; background: #F3F4F6; border-radius: 8px; font-size: 11px; color: #666; font-weight: 600; font-family: monospace;">
                                🛰️ {{ number_format($addr->latitude, 6) }}, {{ number_format($addr->longitude, 6) }}
                            </div>
                        @endif

                        <div class="address-actions" style="margin-top: 15px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; border-top: 1px solid #F3F4F6; padding-top: 12px;">
                            <div style="display: flex; gap: 8px;">
                                <!-- Edit Button -->
                                <button type="button" class="btn-action edit" onclick="prepareEditAddress({{ json_encode($addr) }})">
                                    ✏️ Edit
                                </button>
                                
                                <!-- Delete Form -->
                                <form action="{{ route('profile.address.delete', $addr->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus alamat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action delete">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>

                            @if(!$addr->is_primary)
                                <!-- Set Primary Form -->
                                <form action="{{ route('profile.address.set-primary', $addr->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-action primary-btn">
                                        ⭐ Atur Sebagai Utama
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <button class="add-address-btn" onclick="openAddAddressModal()">
            + Tambah Alamat Baru
        </button>
    </div>
</div>

<style>
.address-card {
    border: 1px solid #E5E7EB;
    border-radius: 18px;
    padding: 20px;
    background: #FFF;
    transition: all 0.2s ease;
    text-align: left;
    position: relative;
}

.address-card.primary-border {
    border-color: #F08A28;
    background: #FFFBF5;
    box-shadow: 0 4px 15px rgba(240, 138, 40, 0.05);
}

.address-card:hover {
    border-color: #F08A28;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
}

.address-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.address-type {
    font-weight: 700;
    color: #222;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.default-badge {
    background: #FFF3E6;
    color: #F08A28;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 800;
}

.btn-action {
    height: 36px;
    padding: 0 14px;
    border: none;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.btn-action.edit {
    background: #EEF2F6;
    color: #4B5563;
}

.btn-action.edit:hover {
    background: #E5E7EB;
}

.btn-action.delete {
    background: #FEF2F2;
    color: #EF4444;
}

.btn-action.delete:hover {
    background: #FEE2E2;
}

.btn-action.primary-btn {
    background: #FFF3E6;
    color: #F08A28;
}

.btn-action.primary-btn:hover {
    background: #FFE5CC;
}

.add-address-btn {
    width: 100%;
    height: 52px;
    border: none;
    border-radius: 14px;
    background: #F08A28;
    color: white;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.2s ease;
    box-shadow: 0 4px 12px rgba(240, 138, 40, 0.2);
}

.add-address-btn:hover {
    background: #E67C14;
}
</style>