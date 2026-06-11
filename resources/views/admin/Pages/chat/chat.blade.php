@extends('admin.layouts.app')

@section('content')

<div class="chat-page">

    <!-- SIDEBAR -->

    @include('admin.Pages.chat.components.chat-sidebar')

@include('admin.Pages.chat.components.chat-room')

</div>

<style>

/* =========================
   CHAT PAGE
========================= */

.chat-page{

    display:grid;

    grid-template-columns:320px 1fr;

    gap:20px;

    height:calc(100vh - 40px);

}

/* =========================
   SIDEBAR
========================= */

.chat-sidebar{

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    overflow:hidden;

    box-shadow:var(--shadow-sm);

}

/* =========================
   CHAT ROOM
========================= */

.chat-room{

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    overflow:hidden;

    display:flex;

    flex-direction:column;

    box-shadow:var(--shadow-sm);

}

/* =========================
   CHAT BODY
========================= */

.chat-body{

    flex:1;

    overflow-y:auto;

    min-height:0;

}

.chat-body::-webkit-scrollbar{

    width:6px;

}

.chat-body::-webkit-scrollbar-thumb{

    background:#D1D5DB;

    border-radius:999px;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:992px){

    .chat-page{

        grid-template-columns:1fr;

        height:auto;

    }

    .chat-sidebar{

        min-height:350px;

    }

    .chat-room{

        min-height:600px;

    }

}

</style>

@endsection