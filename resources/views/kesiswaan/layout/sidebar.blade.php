    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SIA MTS HASSANUDDIN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SIA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ Request::is('jadwal*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jadwal.index') }}"><i class="fas fa-list-ul"></i> <span>Data Jadwal</span></a>
            </li>
        </ul>
        </aside>
    </div>