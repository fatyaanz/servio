<div class="chat-input-wrapper">

    <input
        type="text"
        placeholder="Ketik pesan..."
    >

    <button>

        ➤

    </button>

</div>

<style>

.chat-input-wrapper{

    position:fixed;

    bottom:20px;

    left:50%;

    transform:translateX(-50%);

    width:min(95%, 1200px);

    display:flex;

    gap:12px;

    padding:15px;

    border-radius:22px;

    background:white;

    box-shadow:
        0 10px 25px rgba(0,0,0,.08);
}

.chat-input-wrapper input{

    flex:1;

    border:none;

    outline:none;

    font-size:15px;
}

.chat-input-wrapper button{

    width:55px;
    height:55px;

    border:none;

    border-radius:16px;

    background:#F08A28;

    color:white;

    cursor:pointer;

    font-size:20px;
}

</style>