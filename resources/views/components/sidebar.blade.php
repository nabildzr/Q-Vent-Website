<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="">
                <a href="{{ route('admin.dashboard.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            @can('isSuperAdmin')
                <li class="">
                    <a href="{{ route('admin.user.index') }}">
                        <iconify-icon icon="solar:shield-user-broken" class="menu-icon"></iconify-icon>
                        <span>User</span>
                    </a>
                </li>
            @endcan

            <li class="">
                <a href="{{ route('admin.event_category.index') }}">
                    <iconify-icon icon="iconamoon:category-light" class="menu-icon"></iconify-icon>
                    <span>Event Category</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.event.index') }}">
                    <iconify-icon icon="solar:calendar-add-broken" class="menu-icon"></iconify-icon>
                    <span>Event</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><iconify-icon icon="mdi:trash-can-outline" class="menu-icon text-danger-main w-auto"></iconify-icon>
                            Trash Event</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
