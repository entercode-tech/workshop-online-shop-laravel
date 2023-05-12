<!-- Dashboard -->
<li class="menu-item {{ $page == 'dashboard' ? 'active' : '' }}">
    <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
    </a>
</li>
<li class="menu-item {{ $page == 'kategori' ? 'active' : '' }}">
    <a href="{{ route('kategori.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Kategori</div>
    </a>
</li>
<li class="menu-item">
    <a href="{{ url('javascript:void(0);') }}" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="produk">Produk</div>
    </a>

    <ul class="menu-sub">
        <li class="menu-item">
            <a href="{{ url('layouts-without-menu.html') }}" class="menu-link">
                <div data-i18n="Without menu">Tambah Produk</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('layouts-without-navbar.html') }}" class="menu-link">
                <div data-i18n="Without navbar">Daftar Produk</div>
            </a>
        </li>
    </ul>
</li>
<li class="menu-item">
    <a href="{{ url('index.html') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Pesanan</div>
    </a>
</li>
<li class="menu-item">
    <a href="{{ url('index.html') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Transaksi</div>
    </a>
</li>
<li class="menu-item">
    <a href="{{ url('index.html') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Pengaturan</div>
    </a>
</li>
