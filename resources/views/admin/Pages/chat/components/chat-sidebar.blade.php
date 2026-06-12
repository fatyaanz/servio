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

    height:100%;

    display:flex;
    flex-direction:column;

    padding:20px;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    box-shadow:var(--shadow-sm);

    overflow:hidden;

}

/* =========================
   HEADER
========================= */

.chat-sidebar-header{

    margin-bottom:20px;

}

.chat-sidebar-header h2{

    font-size:24px;

    font-weight:700;

    color:var(--text-dark);

    margin-bottom:4px;

}

.chat-sidebar-header p{

    font-size:13px;

    color:var(--text-secondary);

}

/* =========================
   SEARCH
========================= */

.chat-search{

    margin-bottom:18px;

}

.chat-search input{

    width:100%;

    height:48px;

    border:1px solid var(--border);

    border-radius:12px;

    padding:0 16px;

    background:#FAFAFA;

    outline:none;

    font-size:14px;

    transition:.3s;

}

.chat-search input:focus{

    border-color:var(--primary);

    background:white;

}

/* =========================
   CHAT LIST
========================= */

.chat-list{

    flex:1;

    overflow-y:auto;

    display:flex;

    flex-direction:column;

    gap:10px;

}

/* =========================
   CHAT ITEM
========================= */

.chat-item{

    display:flex;

    gap:12px;

    padding:14px;

    border-radius:14px;

    cursor:pointer;

    transition:.3s;

}

.chat-item:hover{

    background:#FAFAFA;

}

.chat-item.active-chat{

    background:#FFF4E6;

    border:1px solid rgba(255,122,0,.15);

}

/* =========================
   AVATAR
========================= */

.chat-avatar{

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    display:flex;

    align-items:center;
    justify-content:center;

    color:white;

    font-size:18px;

    flex-shrink:0;

}

/* =========================
   INFO
========================= */

.chat-info{

    flex:1;

    min-width:0;

}

.chat-top{

    display:flex;

    justify-content:space-between;

    margin-bottom:4px;

}

.chat-top h4{

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

}

.chat-top span{

    font-size:11px;

    color:var(--text-secondary);

}

.chat-bottom{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:10px;

}

.chat-bottom p{

    font-size:13px;

    color:var(--text-secondary);

    overflow:hidden;

    white-space:nowrap;

    text-overflow:ellipsis;

}

/* =========================
   UNREAD
========================= */

.unread-badge{

    min-width:20px;
    height:20px;

    padding:0 6px;

    border-radius:999px;

    background:var(--primary);

    color:white;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:11px;

    font-weight:600;

}

/* =========================
   SCROLLBAR
========================= */

.chat-list::-webkit-scrollbar{

    width:5px;

}

.chat-list::-webkit-scrollbar-thumb{

    background:#D1D5DB;

    border-radius:999px;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:992px){

    .chat-sidebar{

        min-height:350px;

    }

}

</style>