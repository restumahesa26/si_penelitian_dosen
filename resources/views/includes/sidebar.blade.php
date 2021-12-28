<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ url('backend/img/logo/logo.png') }}">
        </div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(Route::is('dashboard')) active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Manajemen
    </div>
    @if (Auth::user()->role === 'ADMIN')
    <li class="nav-item @if(Route::is('data-dosen.*') || Route::is('data-pengurus.*') || Route::is('data-manajer.*') || Route::is('data-admin.*')) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse @if(Route::is('data-dosen.*') || Route::is('data-pengurus.*') || Route::is('data-manajer.*') || Route::is('data-admin.*')) show @endif" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data</h6>
                <a class="collapse-item @if(Route::is('data-dosen.*')) active @endif" href="{{ route('data-dosen.index') }}">Dosen</a>
                <a class="collapse-item @if(Route::is('data-pengurus.*')) active @endif" href="{{ route('data-pengurus.index') }}">Pengurus</a>
                <a class="collapse-item @if(Route::is('data-manajer.*')) active @endif" href="{{ route('data-manajer.index') }}">Manajer</a>
                <a class="collapse-item @if(Route::is('data-admin.*')) active @endif" href="{{ route('data-admin.index') }}">Admin</a>
            </div>
        </div>
    </li>
    @endif
    @if (Auth::user()->role === 'DOSEN')
    <li class="nav-item @if(Route::is('penelitian.index')) active @endif">
        <a class="nav-link" href="{{ route('penelitian.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Manajemen Penelitian</span></a>
    </li>
    @endif
    @if (Auth::user()->role === 'ADMIN' || Auth::user()->role === 'PENGURUS')
    <li class="nav-item @if(Route::is('penelitian.index-2')) active @endif">
        <a class="nav-link" href="{{ route('penelitian.index-2') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Manajemen Penelitian</span></a>
    </li>
    @endif
    @if (Auth::user()->role === 'MANAJER')
    <li class="nav-item @if(Route::is('penelitian.index-3')) active @endif">
        <a class="nav-link" href="{{ route('penelitian.index-3') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Penelitian</span></a>
    </li>
    @endif
    <hr class="sidebar-divider">
</ul>
<!-- Sidebar -->
