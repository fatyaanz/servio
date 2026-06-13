<div class="modal-overlay" id="reviewModal">

    <div class="modal-card">

        <!-- HEADER -->

        <div class="modal-header">

            <h2>Beri Ulasan & Rating</h2>

            <button
                class="close-modal"
                onclick="closeReviewModal()">

                ✕

            </button>

        </div>

        <!-- FORM -->

        <form action="{{ route('booking.review.store', $booking->id) }}" method="POST">
            @csrf

            <div class="rating-input-container">
                <label class="rating-label">Bagaimana kualitas layanan teknisi?</label>
                
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5" title="Sangat Baik">★</label>
                    
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="Baik">★</label>
                    
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="Cukup">★</label>
                    
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="Buruk">★</label>
                    
                    <input type="radio" id="star1" name="rating" value="1" required />
                    <label for="star1" title="Sangat Buruk">★</label>
                </div>
            </div>

            <div class="form-group" style="margin-top: 20px;">

                <label>Ulasan Anda</label>

                <textarea
                    name="comment"
                    rows="4"
                    style="width:100%; border:1px solid #E5E7EB; border-radius:16px; padding:15px; box-sizing:border-box; font-size:15px; resize:none;"
                    placeholder="Tuliskan pengalaman Anda menggunakan layanan ini..."></textarea>

            </div>

            <!-- BUTTON ACTION -->

            <div class="modal-actions">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeReviewModal()">

                    Batal

                </button>

                <button
                    type="submit"
                    class="save-btn">

                    Kirim Ulasan

                </button>

            </div>

        </form>

    </div>

</div>

<style>

/* =========================
   MODAL LAYOUT SYSTEM
========================= */

.modal-overlay{
    position:fixed;
    inset:0;
    display:none;
    align-items:center;
    justify-content:center;
    padding:20px;
    background:rgba(0,0,0,.55);
    backdrop-filter:blur(8px);
    z-index:9999;
}

.modal-overlay.active{
    display:flex;
    animation:fadeIn .25s ease;
}

@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

@keyframes slideUp{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}

.modal-card{
    width:100%;
    max-width:560px;
    background:#FFFFFF;
    border-radius:28px;
    padding:35px;
    box-shadow:0 25px 60px rgba(0,0,0,.18);
    animation:slideUp .3s ease;
    box-sizing: border-box;
}

.modal-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.modal-header h2{
    font-size:26px;
    font-weight:700;
    color:#1F2937;
    margin:0;
}

.close-modal{
    width:42px;
    height:42px;
    border:none;
    border-radius:12px;
    background:#F3F4F6;
    cursor:pointer;
    font-size:18px;
    transition:.25s;
    display:flex;
    align-items:center;
    justify-content:center;
}

.close-modal:hover{
    background:#E5E7EB;
    transform:rotate(90deg);
}

.form-group{
    margin-bottom:20px;
    display:flex;
    flex-direction:column;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    color:#374151;
    font-size:14px;
    font-weight:600;
}

.modal-actions{
    display:flex;
    gap:12px;
    margin-top:30px;
}

.cancel-btn{
    flex:1;
    height:58px;
    border:none;
    border-radius:16px;
    background:#F3F4F6;
    color:#374151;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
    transition:.25s;
}

.cancel-btn:hover{
    background:#E5E7EB;
}

.save-btn{
    flex:2;
    height:58px;
    border:none;
    border-radius:16px;
    background:linear-gradient(135deg, #F08A28, #FF9F43);
    color:white;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
    transition:.25s;
}

.save-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 25px rgba(240,138,40,.35);
}

.save-btn:active{
    transform:scale(.98);
}

/* =========================
   STAR RATING SYSTEM
========================= */

.rating-input-container {
    text-align: center;
    margin: 15px 0;
}

.rating-label {
    display: block;
    margin-bottom: 12px;
    font-weight: 700;
    color: #374151;
    font-size: 16px;
}

.star-rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    gap: 8px;
    font-size: 40px;
}

.star-rating input {
    display: none;
}

.star-rating label {
    color: #E5E7EB;
    cursor: pointer;
    transition: transform 0.2s ease, color 0.2s ease;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #FFB04D;
    transform: scale(1.15);
}

.star-rating input:checked ~ label {
    color: #F08A28;
}

.star-rating input:checked + label:hover,
.star-rating input:checked + label:hover ~ label,
.star-rating input:checked ~ label:hover,
.star-rating input:checked ~ label:hover ~ label,
.star-rating label:hover ~ input:checked ~ label {
    color: #FFB04D;
}

</style>

<script>

function openReviewModal(){
    document
        .getElementById('reviewModal')
        .classList.add('active');
}

function closeReviewModal(){
    document
        .getElementById('reviewModal')
        .classList.remove('active');
}

/* Klik area gelap untuk menutup */
document
.getElementById('reviewModal')
.addEventListener('click', function(e){
    if(e.target === this){
        closeReviewModal();
    }
});

</script>
