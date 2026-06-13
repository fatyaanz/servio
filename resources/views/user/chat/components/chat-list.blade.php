<div class="chat-list">
    @if(empty($chats))
        <div style="text-align: center; padding: 40px; color: #888;">
            <span style="font-size: 40px;">💬</span>
            <p style="margin-top: 15px; font-weight: 600;">Belum ada percakapan chat.</p>
        </div>
    @else
        @foreach($chats as $chat)
            @include('user.chat.components.chat-card', ['chat' => $chat])
        @endforeach
    @endif
</div>

<style>

.chat-list{

    max-width:1200px;

    margin:0 auto 50px;
}

</style>