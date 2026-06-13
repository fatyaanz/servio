<div class="booking-card">
    <div class="card-header">
        <div class="header-icon" style="background: rgba(240, 138, 40, 0.1); color: #F08A28; width: 52px; height: 52px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 22px;">
            📸
        </div>
        <div>
            <h3 style="margin: 0; font-size: 22px; font-weight: 800; color: #222;">Detail Kerusakan</h3>
            <p style="margin-top: 4px; color: #888; font-size: 13px;">Beritahu kami detail kerusakan dan lampirkan foto pendukung</p>
        </div>
    </div>

    <div class="form-group" style="margin-top: 20px; margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 10px; font-size: 14px; font-weight: 700; color: #333;">Deskripsi Kerusakan <span style="color: red;">*</span></label>
        <textarea
            name="damage_description"
            rows="4"
            class="booking-input"
            placeholder="Contoh: AC tidak dingin sama sekali, hanya keluar angin saja..."
            required
        ></textarea>
    </div>

    <div class="form-group">
        <label style="display: block; margin-bottom: 10px; font-size: 14px; font-weight: 700; color: #333;">Foto Kerusakan (Opsional, Bisa Lebih dari Satu)</label>
        <div class="upload-container" style="display: flex; flex-direction: column; gap: 15px;">
            <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                <label class="upload-box-custom" style="width: 130px; height: 130px; border: 2px dashed #F08A28; border-radius: 20px; background: #FFFDFB; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; transition: 0.3s; text-align: center; overflow: hidden; flex-shrink: 0;">
                    <input type="file" name="damage_photo[]" id="damage_photo" accept="image/*" multiple style="display: none;" onchange="previewDamageImages(this)">
                    <div id="upload-box-placeholder">
                        <span style="font-size: 30px;">📷</span>
                        <span style="display: block; font-size: 12px; font-weight: 700; color: #F08A28; margin-top: 5px;">Upload Foto</span>
                    </div>
                </label>
                <div style="flex: 1; min-width: 200px;">
                    <p style="margin: 0; font-size: 13px; color: #666; line-height: 1.5;">Pilih satu atau beberapa foto yang menunjukkan bagian barang yang bermasalah.</p>
                    <p style="margin: 4px 0 0; font-size: 11px; color: #999;">Format: JPG, PNG, JPEG. Maks: 2MB per foto.</p>
                    <button type="button" id="btn-remove-photo" style="display: none; margin-top: 8px; border: 1px solid #ff4d4f; color: #ff4d4f; background: transparent; padding: 5px 12px; border-radius: 8px; font-size: 12px; font-weight: 600; cursor: pointer;" onclick="clearDamagePhotos()">Hapus Semua Foto</button>
                </div>
            </div>
            
            <div id="image-preview-container" style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 5px;"></div>
        </div>
    </div>
</div>

<script>
function previewDamageImages(input) {
    const container = document.getElementById('image-preview-container');
    const removeBtn = document.getElementById('btn-remove-photo');
    container.innerHTML = ""; // Clear old previews
    
    if (input.files && input.files.length > 0) {
        removeBtn.style.display = 'inline-block';
        for (let i = 0; i < input.files.length; i++) {
            const file = input.files[i];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const imgWrapper = document.createElement('div');
                imgWrapper.style.position = 'relative';
                imgWrapper.style.width = '120px';
                imgWrapper.style.height = '120px';
                imgWrapper.style.borderRadius = '16px';
                imgWrapper.style.overflow = 'hidden';
                imgWrapper.style.border = '1px solid #E5E7EB';
                imgWrapper.style.boxShadow = '0 4px 12px rgba(0,0,0,0.05)';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'cover';
                
                imgWrapper.appendChild(img);
                container.appendChild(imgWrapper);
            }
            reader.readAsDataURL(file);
        }
    } else {
        removeBtn.style.display = 'none';
    }
}

function clearDamagePhotos() {
    const input = document.getElementById('damage_photo');
    const container = document.getElementById('image-preview-container');
    const removeBtn = document.getElementById('btn-remove-photo');
    
    input.value = "";
    container.innerHTML = "";
    removeBtn.style.display = 'none';
}
</script>

<style>
.upload-box-custom:hover {
    background: #FFF7EF !important;
    transform: translateY(-2px);
}
</style>
