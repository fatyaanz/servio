<div class="chat-room">

    <!-- HEADER -->

    <div class="chat-room-header">

        <div class="room-user">

            <div class="room-avatar">
                👨
            </div>

            <div class="room-info">

                <h3>
                    Budi
                </h3>

                <p>
                    ● Online
                </p>

            </div>

        </div>

        <button class="more-btn">
            ⋮
        </button>

    </div>

    <!-- BODY -->

    <div class="chat-body">

        <div class="message other-message">

            Halo kak, service AC nya bisa hari ini?

            <span>
                13:10
            </span>

        </div>

        <div class="message my-message">

            Bisa kak, nanti teknisi datang jam 2 ya 🙌

            <span>
                13:11
            </span>

        </div>

    </div>

    <!-- INPUT -->

    <div class="chat-input-area">

        <input
            type="text"
            placeholder="Ketik pesan..."
        >

        <button>
            Kirim
        </button>

    </div>

</div>

<style>

/* =========================
   CHAT ROOM
========================= */

.chat-room{

    flex:1;

    display:flex;
    flex-direction:column;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    box-shadow:var(--shadow-sm);

    overflow:hidden;

}

/* =========================
   HEADER
========================= */

.chat-room-header{

    display:flex;

    justify-content:space-between;
    align-items:center;

    padding:18px 20px;

    border-bottom:1px solid var(--border);

}

.room-user{

    display:flex;

    align-items:center;

    gap:12px;

}

.room-avatar{

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    display:flex;

    justify-content:center;
    align-items:center;

    color:white;

    font-size:18px;

    flex-shrink:0;

}

.room-info h3{

    font-size:15px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:3px;

}

.room-info p{

    font-size:12px;

    color:#22c55e;

}

.more-btn{

    width:40px;
    height:40px;

    border:none;

    border-radius:12px;

    background:#FAFAFA;

    cursor:pointer;

    font-size:18px;

}

/* =========================
   CHAT BODY
========================= */

.chat-body{

    flex:1;

    overflow-y:auto;

    padding:20px;

    display:flex;

    flex-direction:column;

    gap:12px;

    background:#FAFAFA;

}

/* =========================
   MESSAGE
========================= */

.message{

    max-width:70%;

    padding:12px 16px;

    border-radius:16px;

    font-size:14px;

    line-height:1.6;

}

.message span{

    display:block;

    margin-top:6px;

    font-size:11px;

    opacity:.7;

}

/* =========================
   OTHER MESSAGE
========================= */

.other-message{

    align-self:flex-start;

    background:white;

    border:1px solid var(--border);

    color:var(--text-dark);

    border-bottom-left-radius:6px;

}

/* =========================
   MY MESSAGE
========================= */

.my-message{

    align-self:flex-end;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    color:white;

    border-bottom-right-radius:6px;

}

/* =========================
   INPUT
========================= */

.chat-input-area{

    display:flex;

    gap:12px;

    padding:16px 20px;

    border-top:1px solid var(--border);

}

.chat-input-area input{

    flex:1;

    height:48px;

    border:1px solid var(--border);

    border-radius:12px;

    padding:0 16px;

    outline:none;

    font-size:14px;

}

.chat-input-area input:focus{

    border-color:var(--primary);

}

.chat-input-area button{

    border:none;

    padding:0 24px;

    border-radius:12px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    color:white;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

}

/* =========================
   SCROLLBAR
========================= */

.chat-body::-webkit-scrollbar{

    width:5px;

}

.chat-body::-webkit-scrollbar-thumb{

    background:#D1D5DB;

    border-radius:999px;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .message{

        max-width:90%;

    }

}
</style>