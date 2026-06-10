<!-- Notification Bell Component -->
<div class="relative" id="notif-container">
    <button id="notif-btn" class="h-10 w-10 rounded-xl bg-[#20394a]/5 border border-[#20394a]/10 flex items-center justify-center text-[#20394a] relative hover:bg-[#20394a]/10 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <!-- Badge -->
        <span id="notif-badge" class="hidden absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-rose-500 text-[9px] font-bold text-white shadow-sm ring-2 ring-white">
            0
        </span>
    </button>

    <!-- Dropdown -->
    <div id="notif-dropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50">
        <div class="bg-[#20394a] px-4 py-3 text-white flex justify-between items-center">
            <h3 class="font-bold text-sm">Notifikasi</h3>
            <span id="notif-count-text" class="text-xs bg-white/20 px-2 py-0.5 rounded-full">0 Baru</span>
        </div>
        <div id="notif-list" class="max-h-80 overflow-y-auto divide-y divide-gray-50">
            <!-- Items will be injected here -->
            <div class="px-4 py-6 text-center text-gray-400 text-sm">
                Memuat...
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const notifBtn = document.getElementById('notif-btn');
    const notifDropdown = document.getElementById('notif-dropdown');
    const notifBadge = document.getElementById('notif-badge');
    const notifCountText = document.getElementById('notif-count-text');
    const notifList = document.getElementById('notif-list');
    let notifications = [];

    // Toggle dropdown
    notifBtn.addEventListener('click', () => {
        notifDropdown.classList.toggle('hidden');
    });

    // Close on click outside
    document.addEventListener('click', (e) => {
        if (!document.getElementById('notif-container').contains(e.target)) {
            notifDropdown.classList.add('hidden');
        }
    });

    // Determine API Base URL from path
    const path = window.location.pathname;
    let apiBase = '';
    if (path.startsWith('/kalab')) {
        apiBase = 'http://localhost:3000/api/kalab/notifikasi';
    } else {
        apiBase = 'http://localhost:3000/api/staf_admin/notifikasi';
    }

    // Fetch Notifications
    async function fetchNotifications() {
        try {
            const token = localStorage.getItem('jwt_token') || '{{ session("jwt_token") }}';
            const res = await fetch(apiBase, {
                headers: { 'Authorization': 'Bearer ' + token }
            });
            const json = await res.json();
            if (json.success) {
                notifications = json.data;
                renderNotifications();
            }
        } catch (e) {
            console.error('Failed to fetch notifications', e);
        }
    }

    function renderNotifications() {
        const unreadCount = notifications.filter(n => !n.is_read).length;
        
        // Update Badges
        if (unreadCount > 0) {
            notifBadge.classList.remove('hidden');
            notifBadge.textContent = unreadCount > 9 ? '9+' : unreadCount;
            notifCountText.textContent = unreadCount + ' Baru';
        } else {
            notifBadge.classList.add('hidden');
            notifCountText.textContent = '0 Baru';
        }

        // Update List
        if (notifications.length === 0) {
            notifList.innerHTML = '<div class="px-4 py-6 text-center text-gray-400 text-sm">Tidak ada notifikasi.</div>';
            return;
        }

        notifList.innerHTML = '';
        notifications.forEach(n => {
            const bgClass = n.is_read ? 'bg-white' : 'bg-[#6196aa]/5';
            const iconColor = n.tipe === 'success' ? 'text-emerald-500' : (n.tipe === 'warning' ? 'text-rose-500' : 'text-[#6196aa]');
            
            const item = document.createElement('div');
            item.className = `px-4 py-3 hover:bg-gray-50 cursor-pointer transition-colors flex gap-3 ${bgClass}`;
            item.innerHTML = `
                <div class="mt-1 ${iconColor}">
                    <svg class="w-2 h-2 fill-current" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"></circle></svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm ${n.is_read ? 'text-gray-600' : 'text-gray-800 font-medium'} leading-snug">${n.pesan}</p>
                    <span class="text-[10px] text-gray-400 mt-1 block">${new Date(n.created_at).toLocaleString('id-ID')}</span>
                </div>
            `;
            
            item.addEventListener('click', async () => {
                if (!n.is_read) {
                    try {
                        const token = localStorage.getItem('jwt_token') || '{{ session("jwt_token") }}';
                        await fetch(`${apiBase}/${n.id_notifikasi}/read`, {
                            method: 'PUT',
                            headers: { 'Authorization': 'Bearer ' + token }
                        });
                    } catch (e) {}
                }
                window.location.href = n.link;
            });
            
            notifList.appendChild(item);
        });
    }

    // Initial fetch
    fetchNotifications();
    
    // Auto-refresh every 30 seconds
    setInterval(fetchNotifications, 30000);
});
</script>
