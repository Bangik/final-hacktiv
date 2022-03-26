<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hacktiv<sup>Admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Str::contains(Request::fullUrl(), 'home') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Navigation
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{Str::contains(Request::fullUrl(), 'categories') ? 'active' : ''}}">
        <a class="nav-link collapsed" data-toggle="collapse" href="#Kategori" role="button"
        aria-expanded="false" aria-controls="multiCollapseExample1">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kategori</span>
        </a>
        <div id="Kategori" class="collapse multi-collapse" >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kategori</h6>
                <a class="collapse-item" href="{{route('admin.categories.index')}}">List Semua Kategori</a>
                <a class="collapse-item" href="{{route('admin.categories.create')}}">Tambah Kategori</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{Str::contains(Request::fullUrl(), 'products') ? 'active' : ''}}">
        <a class="nav-link collapsed" data-toggle="collapse" href="#Produk" role="button"
        aria-expanded="false" aria-controls="multiCollapseExample1">
            <i class="fas fa-fw fa-folder"></i>
            <span>Produk</span>
        </a>
        <div id="Produk" class="collapse multi-collapse" >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Produk</h6>
                <a class="collapse-item" href="{{route('admin.products.index')}}">List Semua Produk</a>
                <a class="collapse-item" href="{{route('admin.products.create')}}">Tambah Produk</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{Str::contains(Request::fullUrl(), 'transactions') ? 'active' : ''}}">
        <a class="nav-link collapsed" data-toggle="collapse" href="#Transaksi" role="button"
        aria-expanded="false" aria-controls="multiCollapseExample1">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi</span>
        </a>
        <div id="Transaksi" class="collapse multi-collapse" >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaksi</h6>
                <a class="collapse-item" href="{{route('admin.transactions.index')}}">List Semua Transaksi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
