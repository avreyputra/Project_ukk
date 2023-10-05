<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <li class="sidebar-item {{($menu == 'dashboard') ? 'active' : ''}}">
            <a href="{{route('dashboard')}}" class="sidebar-link ">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item {{($menu == 'users') ? 'active' : ''}}">
            <a href="{{route('users')}}" class="sidebar-link">
                <i class="fas fa-users"></i>
                <span>Data User</span>
            </a>
        </li>
        <li class="sidebar-item has-sub {{($menu == 'data_produk') ? 'active' : ''}}">
            <a href="#" class="sidebar-link">
                <i class="fas fa-cart-plus"></i>
                <span> Data Produk</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{($sub_menu == 'kategori_produk') ? 'active' : ''}}">
                    <a href="{{route('kategoriProduk')}}">Kategori Produk</a>
                </li>
                <li class="submenu-item {{($sub_menu == 'produk') ? 'active' : ''}}">
                    <a href="{{route('Produk')}}">Produk</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item {{($menu == 'transaksi') ? 'active' : ''}}">
            <a href="#" class="sidebar-link">
                <i class="fas fa-money-check"></i>
                <span>Transaksi</span>
            </a>
        </li>
        <li class="sidebar-item {{($menu == 'laporan') ? 'active' : ''}}">
            <a href="#" class="sidebar-link">
                <i class="fas fa-scroll"></i>
                <span>Laporan</span>
            </a>
        </li>
    </ul>
</div>
