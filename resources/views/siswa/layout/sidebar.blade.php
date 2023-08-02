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
            <li class="nav-item {{ ($active === "pembayaransiswa") ? 'active' : '' }}">
                <a class="nav-link" href="/pembayaransiswa"><i class="fas fa-dollar-sign"></i> <span>Data Pembayaran</span></a>
            </li>
            <li class="nav-item {{ ($active === "jadwalsiswa") ? 'active' : ''}}">
                <a class="nav-link" href="/jadwalsiswa"><i class="fas fa-list-ul"></i> <span>Data Jadwal</span></a>
            </li>
            <li class="nav-item {{ ($active === "presensisiswa") ? 'active' : ''}}">
                <a class="nav-link" href="/presensisiswa"><i class="fas fa-user-check"></i> <span>Data Presensi</span></a>
            </li>
            <li class="nav-item {{ ($active === "nilaisiswa") ? 'active' : ''}}">
                <a class="nav-link" href="/nilaisiswa"><i class="fas fa-book"></i> <span>Data Nilai</span></a>
            </li>
        </ul>
            </div>
        </aside>
    </div>