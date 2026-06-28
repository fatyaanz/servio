@php
    use Illuminate\Support\Facades\Auth;
    $unreadCount = \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count();
@endphp

<div class="dashboard-header">

    <!-- LEFT -->

    <div class="header-left">

        <h1>
             Halo, {{ Auth::check() ? Auth::user()->name : 'Guest' }} <i class='bx bx-wave' style="color:#fbbf24;"></i>
        </h1>

        <p>
            {{ now()->translatedFormat('l, d F Y') }}
        </p>

    </div>

    <!-- RIGHT -->

    <div class="header-right">

        <!-- STATUS -->

        <div class="status-wrapper">

            <div class="status-info">

                <span class="status-title">
                    Status
                </span>

                <span class="status-subtitle">
                    Ketersediaan layanan
                </span>

            </div>

            <div class="status-toggle-container">
                <label class="switch">
                    <input type="checkbox" id="providerStatusToggle" {{ (Auth::user()->is_online === null || Auth::user()->is_online) ? 'checked' : '' }} onchange="toggleOnlineStatus()">
                    <span class="slider round"></span>
                </label>
                <span id="statusText" style="font-size:12px; font-weight:700; color:{{ (Auth::user()->is_online === null || Auth::user()->is_online) ? '#22c55e' : '#ef4444' }}">
                    {{ (Auth::user()->is_online === null || Auth::user()->is_online) ? 'Online' : 'Offline' }}
                </span>
            </div>

        </div>

        <!-- NOTIF -->

        <div class="notif-box" id="notifToggle" onclick="toggleNotifDropdown(event)">

            <i class='bx bx-bell'></i>

            <span class="notif-badge" id="notifBadge" style="{{ $unreadCount > 0 ? '' : 'display:none;' }}">
                {{ $unreadCount }}
            </span>

            <!-- DROPDOWN -->
            <div class="notif-dropdown" id="notifDropdown">

                <div class="notif-dropdown-header">
                    <span class="notif-dropdown-title">Notifikasi</span>
                    <button class="notif-mark-all" onclick="markAllNotifRead(event)">Tandai semua dibaca</button>
                </div>

                <div class="notif-dropdown-list" id="notifList">
                    <!-- Filled by JS -->
                    <div class="notif-empty" id="notifEmpty">
                        <span style="font-size:32px;"><i class='bx bx-bell' style="color:#cbd5e1;"></i></span>
                        <p>Belum ada notifikasi baru</p>
                    </div>
                </div>

                <a href="{{ route('provider.notifikasi') }}" class="notif-dropdown-footer">
                    Lihat semua notifikasi →
                </a>

            </div>

        </div>

    </div>

</div>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Inter',sans-serif;
    }

    body{
        background:
        linear-gradient(
        135deg,
        #f8fafc,
        #eef2ff
        );
    }

    .dashboard-header{

        width:100%;

        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;

        gap:20px;

        padding:15px 28px;

        border-radius:28px;

        background:rgba(255,255,255,0.18);

        backdrop-filter:blur(20px);
        -webkit-backdrop-filter:blur(20px);

        border:1px solid rgba(255,255,255,0.25);

        box-shadow:
        0 8px 30px rgba(15,23,42,0.06);

        position: relative;
        z-index: 9999;

    }

    /* =========================
        LEFT
    ========================== */

    .header-left{
        display:flex;
        flex-direction:column;
        gap:6px;
    }

    .mini-badge{

        width:fit-content;

        padding:6px 12px;

        border-radius:999px;

        background:rgba(255,255,255,0.22);

        backdrop-filter:blur(10px);

        border:1px solid rgba(255,255,255,0.2);

        color:#374151;

        font-size:11px;
        font-weight:600;

    }

    .header-left h1{

        font-size:15px;
        font-weight:700;

        color:#111827;

        letter-spacing:-0.5px;

    }

    .header-left p{

        font-size:13px;
        font-weight:500;

        color:#6b7280;

    }

    /* =========================
        RIGHT
    ========================== */

    .header-right{

        display:flex;
        align-items:center;
        gap:14px;

    }

    /* STATUS */

    .status-wrapper{

        display:flex;
        align-items:center;
        gap:14px;

        padding:12px 14px;

        border-radius:20px;

        background:rgba(255,255,255,0.16);

        backdrop-filter:blur(16px);

        border:1px solid rgba(255,255,255,0.18);

    }

    .status-info{
        display:flex;
        flex-direction:column;
    }

    .status-title{

        font-size:12px;
        font-weight:700;

        color:#111827;

    }

    .status-subtitle{

        font-size:10px;

        color:#6b7280;

    }

    .status-toggle-container {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* The switch - the box around the slider */
    .switch {
      position: relative;
      display: inline-block;
      width: 44px;
      height: 24px;
    }

    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ef4444; /* Offline red */
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #22c55e; /* Online green */
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #22c55e;
    }

    input:checked + .slider:before {
      transform: translateX(20px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 24px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    /* =========================
        NOTIF BOX
    ========================== */

    .notif-box{

        position:relative;

        width:48px;
        height:48px;

        border-radius:18px;

        background:rgba(255,255,255,0.16);

        backdrop-filter:blur(18px);

        border:1px solid rgba(255,255,255,0.2);

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:18px;

        cursor:pointer;

        transition:0.3s ease;

    }

    .notif-box:hover{

        transform:translateY(-2px);

        background:rgba(255,255,255,0.25);

    }

    /* Badge */
    .notif-badge{

        position:absolute;

        top:8px;
        right:8px;

        min-width:18px;
        height:18px;

        border-radius:50%;

        background:linear-gradient(135deg, #ef4444, #dc2626);

        border:2px solid white;

        color:white;
        font-size:10px;
        font-weight:700;

        display:flex;
        justify-content:center;
        align-items:center;

        padding:0 4px;

        animation: badgePulse 2s ease-in-out infinite;

    }

    @keyframes badgePulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.15); }
    }

    /* =========================
        NOTIF DROPDOWN
    ========================== */

    .notif-dropdown{

        position:absolute;
        top:calc(100% + 12px);
        right:0;

        width:380px;

        background:rgba(255,255,255,0.96);
        backdrop-filter:blur(24px);
        -webkit-backdrop-filter:blur(24px);

        border:1px solid rgba(0,0,0,0.06);

        border-radius:20px;

        box-shadow:
            0 20px 60px rgba(15,23,42,0.12),
            0 4px 16px rgba(15,23,42,0.06);

        opacity:0;
        visibility:hidden;
        transform:translateY(-8px) scale(0.97);

        transition:all 0.25s cubic-bezier(0.16, 1, 0.3, 1);

        z-index:9999;

        overflow:hidden;

    }

    .notif-dropdown.show{
        opacity:1;
        visibility:visible;
        transform:translateY(0) scale(1);
    }

    /* Header */
    .notif-dropdown-header{

        display:flex;
        justify-content:space-between;
        align-items:center;

        padding:16px 20px;

        border-bottom:1px solid #f1f5f9;

    }

    .notif-dropdown-title{

        font-size:15px;
        font-weight:700;
        color:#111827;

    }

    .notif-mark-all{

        border:none;
        background:none;

        color:#f59e0b;
        font-size:12px;
        font-weight:600;

        cursor:pointer;

        transition:0.2s;

    }

    .notif-mark-all:hover{
        color:#d97706;
    }

    /* List */
    .notif-dropdown-list{

        max-height:340px;
        overflow-y:auto;

    }

    .notif-dropdown-list::-webkit-scrollbar{
        width:4px;
    }

    .notif-dropdown-list::-webkit-scrollbar-thumb{
        background:#e2e8f0;
        border-radius:4px;
    }

    /* Item */
    .notif-item{

        display:flex;
        gap:12px;
        align-items:flex-start;

        padding:14px 20px;

        border-bottom:1px solid #f8fafc;

        cursor:pointer;

        transition:0.2s ease;

    }

    .notif-item:hover{
        background:#fffbeb;
    }

    .notif-item.unread{
        background:#fffef5;
        border-left:3px solid #f59e0b;
    }

    .notif-item-icon{

        width:38px;
        height:38px;
        min-width:38px;

        border-radius:12px;

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:16px;

    }

    .notif-item-icon.chat{ background:#dbeafe; }
    .notif-item-icon.order{ background:#d1fae5; }
    .notif-item-icon.category{ background:#fef3c7; }
    .notif-item-icon.service{ background:#ede9fe; }
    .notif-item-icon.status{ background:#fee2e2; }
    .notif-item-icon.default{ background:#f1f5f9; }

    .notif-item-content{
        flex:1;
        min-width:0;
    }

    .notif-item-title{

        font-size:13px;
        font-weight:600;
        color:#111827;

        margin-bottom:2px;

        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;

    }

    .notif-item-message{

        font-size:12px;
        color:#6b7280;

        display:-webkit-box;
        -webkit-line-clamp:2;
        -webkit-box-orient:vertical;
        overflow:hidden;

        margin-bottom:4px;

    }

    .notif-item-time{

        font-size:10px;
        color:#9ca3af;
        font-weight:500;

    }

    /* Empty State */
    .notif-empty{

        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;

        padding:40px 20px;

        color:#9ca3af;

    }

    .notif-empty p{
        margin-top:8px;
        font-size:13px;
    }

    /* Footer */
    .notif-dropdown-footer{

        display:block;

        text-align:center;

        padding:14px;

        border-top:1px solid #f1f5f9;

        color:#f59e0b;
        font-size:13px;
        font-weight:600;

        text-decoration:none;

        transition:0.2s;

    }

    .notif-dropdown-footer:hover{
        background:#fffbeb;
        color:#d97706;
    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:768px){

        .dashboard-header{

            padding:20px;

        }

        .header-left h1{

            font-size:21px;

        }

        .header-right{

            width:100%;
            justify-content:space-between;

        }

        .status-wrapper{

            flex:1;

        }

        .notif-dropdown{
            width:320px;
            right:-60px;
        }

    }

</style>

@push('scripts')
<script>
(function() {
    const POLL_INTERVAL = 15000; // 15 seconds
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    let dropdownOpen = false;

    // Toggle Online/Offline Status
    window.toggleOnlineStatus = function() {
        const toggle = document.getElementById('providerStatusToggle');
        const statusText = document.getElementById('statusText');
        const isOnline = toggle.checked;

        // Optimistically update UI
        if(isOnline) {
            statusText.textContent = 'Online';
            statusText.style.color = '#22c55e';
        } else {
            statusText.textContent = 'Offline';
            statusText.style.color = '#ef4444';
        }

        fetch('{{ route("provider.toggle-status") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                // Reload to show/hide dashboard content appropriately
                window.location.reload();
            }
        })
        .catch(err => {
            console.error('Error toggling status', err);
            // Revert UI if error
            toggle.checked = !isOnline;
            if(!isOnline) {
                statusText.textContent = 'Online';
                statusText.style.color = '#22c55e';
            } else {
                statusText.textContent = 'Offline';
                statusText.style.color = '#ef4444';
            }
        });
    };

    // Toggle dropdown
    window.toggleNotifDropdown = function(e) {
        e.stopPropagation();
        const dropdown = document.getElementById('notifDropdown');
        dropdownOpen = !dropdownOpen;
        dropdown.classList.toggle('show', dropdownOpen);
    };

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        const box = document.getElementById('notifToggle');
        if (box && !box.contains(e.target)) {
            dropdownOpen = false;
            document.getElementById('notifDropdown').classList.remove('show');
        }
    });

    // Get icon info by notification type
    function getIconInfo(type) {
        switch(type) {
            case 'chat_received':
                return { icon: '<i class="bx bx-chat"></i>', cls: 'chat' };
            case 'order_created':
                return { icon: '<i class="bx bx-package"></i>', cls: 'order' };
            case 'category_approved':
                return { icon: '<i class="bx bx-check-circle"></i>', cls: 'category' };
            case 'category_rejected':
                return { icon: '<i class="bx bx-x-circle"></i>', cls: 'category' };
            case 'service_approved':
                return { icon: '<i class="bx bx-wrench"></i>', cls: 'service' };
            case 'service_rejected':
                return { icon: '<i class="bx bx-block"></i>', cls: 'service' };
            case 'status_updated':
                return { icon: '<i class="bx bx-clipboard"></i>', cls: 'status' };
            default:
                return { icon: '<i class="bx bx-bell"></i>', cls: 'default' };
        }
    }

    // Render notification items
    function renderNotifications(notifications) {
        const list = document.getElementById('notifList');
        const empty = document.getElementById('notifEmpty');

        if (!notifications || notifications.length === 0) {
            list.innerHTML = '';
            list.appendChild(createEmptyState());
            return;
        }

        list.innerHTML = '';
        notifications.forEach(function(notif) {
            const iconInfo = getIconInfo(notif.type);
            const item = document.createElement('div');
            item.className = 'notif-item unread';
            item.setAttribute('data-id', notif.id);
            item.onclick = function(e) {
                e.stopPropagation();
                markNotifRead(notif.id, item);
            };
            item.innerHTML =
                '<div class="notif-item-icon ' + iconInfo.cls + '">' + iconInfo.icon + '</div>' +
                '<div class="notif-item-content">' +
                    '<div class="notif-item-title">' + escapeHtml(notif.title) + '</div>' +
                    '<div class="notif-item-message">' + escapeHtml(notif.message) + '</div>' +
                    '<div class="notif-item-time">' + escapeHtml(notif.created_at) + '</div>' +
                '</div>';
            list.appendChild(item);
        });
    }

    function createEmptyState() {
        const div = document.createElement('div');
        div.className = 'notif-empty';
        div.id = 'notifEmpty';
        div.innerHTML = '<span style="font-size:32px;"><i class="bx bx-bell" style="color:#cbd5e1;"></i></span><p>Belum ada notifikasi baru</p>';
        return div;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text || '';
        return div.innerHTML;
    }

    // Update badge count
    function updateBadge(count) {
        const badge = document.getElementById('notifBadge');
        if (count > 0) {
            badge.textContent = count > 99 ? '99+' : count;
            badge.style.display = 'flex';
        } else {
            badge.style.display = 'none';
        }
    }

    // Fetch unread notifications
    function fetchNotifications() {
        fetch('/notifications/unread', {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin'
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            updateBadge(data.unread_count);
            renderNotifications(data.notifications);
        })
        .catch(function(err) {
            console.warn('Notification poll error:', err);
        });
    }

    // Mark single notification as read
    window.markNotifRead = function(id, el) {
        fetch('/notifications/' + id + '/read', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin'
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            if (data.success) {
                if (el) {
                    el.classList.remove('unread');
                    el.style.opacity = '0.5';
                    setTimeout(function() {
                        el.remove();
                        fetchNotifications(); // Refresh
                    }, 300);
                }
            }
        });
    };

    // Mark all as read
    window.markAllNotifRead = function(e) {
        e.stopPropagation();
        fetch('/notifications/mark-all-read-api', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin'
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            if (data.success) {
                updateBadge(0);
                const list = document.getElementById('notifList');
                list.innerHTML = '';
                list.appendChild(createEmptyState());
            }
        });
    };

    // Initial fetch
    fetchNotifications();

    // Poll every 15 seconds
    setInterval(fetchNotifications, POLL_INTERVAL);

})();
</script>
@endpush