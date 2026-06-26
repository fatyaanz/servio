<div class="modal-overlay" id="editProfileModal">
    <div class="modal-card">
        <div class="modal-header">
            <h2>Edit Profil Saya</h2>
            <button class="close-modal" onclick="closeEditProfileModal()">✕</button>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="edit-profile-form">
            @csrf
            
            <!-- Profile Photo Upload with Live Preview -->
            <div class="avatar-upload-container">
                <div class="avatar-preview-wrapper">
                    <img id="edit_avatar_preview" src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="Avatar Preview">
                    <label for="profile_photo_input" class="upload-badge" title="Ganti Foto">
                        📷
                    </label>
                </div>
                <input type="file" id="profile_photo_input" name="profile_photo" accept="image/png, image/jpeg, image/jpg" style="display: none;" onchange="previewProfilePhoto(event)">
                <small class="upload-hint">Format: JPG, PNG. Maksimal 2MB.</small>
            </div>

            <!-- Name Input -->
            <div class="form-group">
                <label for="edit_name">Nama Lengkap <span style="color: #DC2626;">*</span></label>
                <input type="text" id="edit_name" name="name" value="{{ Auth::user()->name }}" required placeholder="Masukkan nama lengkap Anda">
            </div>

            <!-- Phone Input -->
            <div class="form-group">
                <label for="edit_phone">Nomor Telepon / WhatsApp <span style="color: #DC2626;">*</span></label>
                <input type="text" id="edit_phone" name="phone" value="{{ Auth::user()->phone }}" required placeholder="Contoh: 08123456789">
            </div>

            <!-- Password Change (Optional) -->
            <div class="form-group password-group" style="margin-top: 15px; padding-top: 15px; border-top: 1px dashed #ECECEC;">
                <label for="edit_password">Password Baru (Opsional)</label>
                <input type="password" id="edit_password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                <small class="field-hint">Minimal 8 karakter jika ingin diubah.</small>
            </div>

            <div class="modal-actions" style="margin-top: 25px;">
                <button type="button" class="cancel-btn" onclick="closeEditProfileModal()">Batal</button>
                <button type="submit" class="save-btn">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<style>
/* =========================
   AVATAR UPLOAD
========================= */
.avatar-upload-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
    gap: 8px;
}

.avatar-preview-wrapper {
    position: relative;
    width: 110px;
    height: 110px;
    border-radius: 50%;
    border: 3px solid #FFF;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.avatar-preview-wrapper img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    background: #F9FAFB;
}

.upload-badge {
    position: absolute;
    bottom: 2px;
    right: 2px;
    background: #F08A28;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(240, 138, 40, 0.3);
    transition: transform 0.2s ease, background-color 0.2s ease;
}

.upload-badge:hover {
    transform: scale(1.1);
    background: #E67C14;
}

.upload-hint {
    font-size: 11px;
    color: #888;
}

.field-hint {
    font-size: 11px;
    color: #888;
    margin-top: 4px;
    display: block;
}

/* =========================
   FORM ELEMENTS
========================= */
.edit-profile-form .form-group {
    margin-bottom: 18px;
    text-align: left;
}

.edit-profile-form .form-group label {
    display: block;
    font-size: 14px;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
}

.edit-profile-form .form-group input {
    width: 100%;
    height: 48px;
    border: 1px solid #E5E7EB;
    border-radius: 14px;
    padding: 0 16px;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    box-sizing: border-box;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
}

.edit-profile-form .form-group input:focus {
    border-color: #F08A28;
    box-shadow: 0 0 0 4px rgba(240, 138, 40, 0.08);
}

.modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
}

.cancel-btn {
    height: 48px;
    padding: 0 24px;
    border: 1px solid #E5E7EB;
    border-radius: 14px;
    background: white;
    color: #555;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: 0.2s;
}

.cancel-btn:hover {
    background: #F9FAFB;
}

.save-btn {
    height: 48px;
    padding: 0 24px;
    border: none;
    border-radius: 14px;
    background: #F08A28;
    color: white;
    font-weight: 700;
    font-size: 14px;
    cursor: pointer;
    transition: 0.2s;
    box-shadow: 0 4px 12px rgba(240, 138, 40, 0.25);
}

.save-btn:hover {
    background: #E67C14;
    transform: translateY(-1px);
}
</style>

<script>
function openEditProfileModal() {
    document.getElementById('editProfileModal').classList.add('active');
}

function closeEditProfileModal() {
    document.getElementById('editProfileModal').classList.remove('active');
}

function previewProfilePhoto(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('edit_avatar_preview');
        output.src = reader.result;
    };
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>