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
            <li class="nav-item {{ Request::is('presensi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('presensi.index') }}"><i class="fas fa-user-check"></i> <span>Data Presensi</span></a>
            </li>
            <li class="nav-item {{ Request::is('nilai*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('nilai.index') }}"><i class="fas fa-book"></i> <span>Data Nilai</span></a>
            </li>
        </ul>
        </aside>
    </div>