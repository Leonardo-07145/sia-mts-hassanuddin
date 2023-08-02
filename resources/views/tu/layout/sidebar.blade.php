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
            <li class="nav-item {{ Request::is('guru*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('guru.index') }}"><i class="fas fa-user-tie"></i> <span>Data Guru</span></a>
            </li>
            <li class="nav-item {{ Request::is('siswa*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-user-graduate"></i> <span>Data Siswa</span></a>
            </li>
            <li class="nav-item {{ Request::is('pembayaran*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pembayaran.index') }}"><i class="fas fa-dollar-sign"></i> <span>Data Pembayaran</span></a>
            </li>
            <li class="nav-item {{ Request::is('tahunajaran*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tahunajaran.index') }}"><i class="fas fa-dollar-sign"></i> <span>Data Tahun Ajaran</span></a>
            </li>
        </ul>
        </aside>
    </div>