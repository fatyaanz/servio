@extends('admin.layouts.app')

@section('content')

<div class="chat-page">

    <!-- SIDEBAR -->

    @include('provider.pages.chat.components.chat-sidebar')

    <!-- ROOM -->

    @include('provider.pages.chat.components.chat-room')

</div>

<style>

/* =========================
   CHAT PAGE
========================= */

.chat-page{

    display:flex;

    gap:20px;

    padding:20px;

    height:100vh;

    align-items:stretch;

    overflow:hidden;

}

/* =========================
   SIDEBAR
========================= */

.chat-sidebar{

    height:100%;

    overflow:hidden;

}

/* =========================
   CHAT ROOM
========================= */

.chat-room{

    flex:1;

    height:100%;

    display:flex;

    flex-direction:column;

    overflow:hidden;

}

/* =========================
   CHAT BODY
========================= */

.chat-body{

    flex:1;

    overflow-y:auto;

    min-height:0;

}

/* SCROLLBAR */

.chat-body::-webkit-scrollbar{

    width:6px;

}

.chat-body::-webkit-scrollbar-thumb{

    background:#d1d5db;

    border-radius:20px;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:992px){

    .chat-page{

        flex-direction:column;

        height:auto;

        overflow:visible;

    }

    .chat-room{

        height:80vh;

    }

}

</style>

@endsection