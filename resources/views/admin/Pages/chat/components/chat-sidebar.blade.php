<div class="chat-sidebar">

    <!-- HEADER -->

    <div class="chat-sidebar-header">

        <div>

            <h2>
                Chat
            </h2>

            <p>
                Percakapan pelanggan
            </p>

        </div>


    </div>

    <!-- SEARCH -->

    <div class="chat-search">

        <input
            type="text"
            placeholder="Cari percakapan..."
        >

    </div>

    <!-- LIST -->

    <div class="chat-list">

        <!-- ITEM -->

        <div class="chat-item active-chat">

            <div class="chat-avatar">
                👨
            </div>

            <div class="chat-info">

                <div class="chat-top">

                    <h4>
                        Budi
                    </h4>

                    <span>
                        12:30
                    </span>

                </div>

                <div class="chat-bottom">

                    <p>
                        Service AC nya jadi hari ini?
                    </p>

                    <div class="unread-badge">
                        2
                    </div>

                </div>

            </div>

        </div>

        <!-- ITEM -->

        <div class="chat-item">

            <div class="chat-avatar">
                👩
            </div>

            <div class="chat-info">

                <div class="chat-top">

                    <h4>
                        Sinta
                    </h4>

                    <span>
                        11:12
                    </span>

                </div>

                <div class="chat-bottom">

                    <p>
                        Apakah bisa service besok?
                    </p>

                </div>

            </div>

        </div>

        <!-- ITEM -->

        <div class="chat-item">

            <div class="chat-avatar">
                👨
            </div>

            <div class="chat-info">

                <div class="chat-top">

                    <h4>
                        Andi
                    </h4>

                    <span>
                        Kemarin
                    </span>

                </div>

                <div class="chat-bottom">

                    <p>
                        Terima kasih servicenya
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

/* =========================
    SIDEBAR
========================= */

.chat-sidebar{

    width:360px;

    height:100%;

    background:white;

    border-radius:32px;

    padding:24px;

    border:1px solid #eef2f7;

    box-shadow:
    0 10px 30px rgba(15,23,42,0.05);

    display:flex;
    flex-direction:column;

    overflow:hidden;

}

/* =========================
    HEADER
========================= */

.chat-sidebar-header{

    display:flex;

    justify-content:space-between;
    align-items:center;

    margin-bottom:22px;

}

.chat-sidebar-header h2{

    font-size:30px;

    font-weight:800;

    color:#111827;

    margin-bottom:4px;

}

.chat-sidebar-header p{

    font-size:14px;

    color:#6b7280;

}

/* =========================
    NEW CHAT BUTTON
========================= */

.new-chat-btn{

    width:52px;
    height:52px;

    border:none;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:28px;

    font-weight:600;

    cursor:pointer;

    transition:0.25s ease;

    box-shadow:
    0 10px 24px rgba(255,122,0,0.18);

}

.new-chat-btn:hover{

    transform:translateY(-2px);

}

/* =========================
    SEARCH
========================= */

.chat-search{

    margin-bottom:22px;

}

.chat-search input{

    width:100%;

    height:56px;

    border:none;
    outline:none;

    border:1px solid #e5e7eb;

    border-radius:18px;

    padding:0 20px;

    font-size:14px;

    background:#fafafa;

    transition:0.25s ease;

}

.chat-search input:focus{

    border-color:#ffb066;

    background:white;

}

/* =========================
    LIST
========================= */

.chat-list{

    display:flex;
    flex-direction:column;

    gap:14px;

    overflow-y:auto;

    padding-right:4px;

}

/* =========================
    ITEM
========================= */

.chat-item{

    display:flex;

    gap:16px;

    padding:16px;

    border-radius:22px;

    cursor:pointer;

    transition:0.25s ease;

    border:1px solid transparent;

}

.chat-item:hover{

    background:#fafafa;

    border-color:#f1f5f9;

    transform:translateY(-2px);

}

/* ACTIVE */

.active-chat{

    background:#fff7ed;

    border-color:#fed7aa;

}

/* =========================
    AVATAR
========================= */

.chat-avatar{

    width:62px;
    height:62px;

    border-radius:20px;

    background:linear-gradient(
        135deg,
        #ffe7cc,
        #ffd4a3
    );

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:28px;

    flex-shrink:0;

}

/* =========================
    INFO
========================= */

.chat-info{

    flex:1;

    min-width:0;

}

/* TOP */

.chat-top{

    display:flex;

    justify-content:space-between;
    align-items:center;

    gap:12px;

    margin-bottom:8px;

}

.chat-top h4{

    font-size:15px;

    font-weight:700;

    color:#111827;

}

.chat-top span{

    font-size:12px;

    color:#94a3b8;

    flex-shrink:0;

}

/* =========================
    BOTTOM
========================= */

.chat-bottom{

    display:flex;

    justify-content:space-between;
    align-items:center;

    gap:12px;

}

.chat-bottom p{

    font-size:13px;

    color:#6b7280;

    overflow:hidden;

    text-overflow:ellipsis;

    white-space:nowrap;

}

/* =========================
    BADGE
========================= */

.unread-badge{

    min-width:24px;
    height:24px;

    padding:0 6px;

    border-radius:999px;

    background:#ff8a00;

    color:white;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:11px;

    font-weight:700;

    flex-shrink:0;

}

/* =========================
    SCROLLBAR
========================= */

.chat-list::-webkit-scrollbar{

    width:6px;

}

.chat-list::-webkit-scrollbar-thumb{

    background:#e5e7eb;

    border-radius:999px;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:992px){

    .chat-sidebar{

        width:100%;

        border-radius:24px;

    }

}

</style>