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

    background:white;

    border-radius:24px;

    display:flex;

    flex-direction:column;

    overflow:hidden;

    height:100vh;

    box-shadow:
    0 8px 30px rgba(15,23,42,0.06);

}

/* =========================
   HEADER
========================= */

.chat-room-header{

    padding:16px 20px;

    border-bottom:
    1px solid #eef2f7;

    display:flex;

    align-items:center;

    justify-content:space-between;

    background:white;

}

/* USER */

.room-user{

    display:flex;

    align-items:center;

    gap:12px;

}

/* AVATAR */

.room-avatar{

    width:48px;
    height:48px;

    border-radius:16px;

    background:
    linear-gradient(
        135deg,
        #ffe0bf,
        #ffd2a3
    );

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:20px;

    flex-shrink:0;

    box-shadow:
    0 4px 14px rgba(255,122,0,0.16);

}

/* INFO */

.room-info h3{

    font-size:15px;

    font-weight:700;

    color:#111827;

    margin-bottom:3px;

}

.room-info p{

    font-size:11px;

    color:#22c55e;

    font-weight:500;

}

/* MORE BUTTON */

.more-btn{

    width:38px;
    height:38px;

    border:none;

    border-radius:12px;

    background:#f8fafc;

    cursor:pointer;

    font-size:16px;

    transition:.2s ease;

}

.more-btn:hover{

    background:#eef2f7;

}

/* =========================
   BODY
========================= */

.chat-body{

    flex:1;

    padding:22px;

    overflow-y:auto;

    display:flex;

    flex-direction:column;

    gap:14px;

    background:
    linear-gradient(
        to bottom,
        #fafafa,
        #f8fafc
    );

}

/* =========================
   MESSAGE
========================= */

.message{

    max-width:360px;

    padding:13px 15px;

    border-radius:20px;

    font-size:13px;

    line-height:1.6;

    position:relative;

    animation:fadeIn .25s ease;

}

/* TIME */

.message span{

    display:block;

    font-size:10px;

    margin-top:6px;

    opacity:.7;

}

/* OTHER */

.other-message{

    background:white;

    color:#111827;

    align-self:flex-start;

    border:
    1px solid #eef2f7;

    border-bottom-left-radius:8px;

    box-shadow:
    0 4px 12px rgba(15,23,42,0.04);

}

/* MY MESSAGE */

.my-message{

    background:
    linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    align-self:flex-end;

    border-bottom-right-radius:8px;

    box-shadow:
    0 8px 18px rgba(255,122,0,0.20);

}

/* =========================
   INPUT AREA
========================= */

.chat-input-area{

    padding:16px 20px;

    border-top:
    1px solid #eef2f7;

    display:flex;

    gap:12px;

    background:white;

}

/* INPUT */

.chat-input-area input{

    flex:1;

    height:50px;

    border:none;

    outline:none;

    background:#f8fafc;

    border:
    1px solid #edf2f7;

    border-radius:16px;

    padding:0 16px;

    font-size:13px;

    transition:.2s ease;

}

.chat-input-area input:focus{

    border-color:#ff9b42;

    background:white;

    box-shadow:
    0 0 0 4px rgba(255,122,0,0.08);

}

/* BUTTON */

.chat-input-area button{

    padding:0 22px;

    border:none;

    border-radius:16px;

    background:
    linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:13px;

    font-weight:700;

    cursor:pointer;

    transition:.2s ease;

    box-shadow:
    0 8px 18px rgba(255,122,0,0.18);

}

.chat-input-area button:hover{

    transform:translateY(-2px);

    opacity:.95;

}

/* =========================
   SCROLLBAR
========================= */

.chat-body::-webkit-scrollbar{

    width:5px;

}

.chat-body::-webkit-scrollbar-thumb{

    background:#d1d5db;

    border-radius:20px;

}

/* =========================
   ANIMATION
========================= */

@keyframes fadeIn{

    from{

        opacity:0;

        transform:translateY(10px);

    }

    to{

        opacity:1;

        transform:translateY(0);

    }

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .chat-room{

        border-radius:18px;

    }

    .chat-room-header{

        padding:14px 16px;

    }

    .chat-body{

        padding:18px;

    }

    .message{

        max-width:280px;

        font-size:12px;

    }

    .chat-input-area{

        padding:14px 16px;

    }

    .chat-input-area input{

        height:46px;

    }

}

</style>