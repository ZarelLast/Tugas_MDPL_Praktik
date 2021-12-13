<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Rentcar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->email }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    @if(isset($menu))
                    <a href=" {{ route('car.index') }} " class="nav-link {{($menu==1 ? 'active' : '')}}">
                    @else
                    <a href=" {{ route('car.index') }} " class="nav-link {{($data['menu']==1 ? 'active' : '')}}">
                    @endif
                        <i class="fa fa-car nav-icon"></i>
                        <p>List Mobil</p>
                    </a>
                </li>
                <li class="nav-item">
                    @if(isset($menu))
                    <a href=" {{ route('returns.index') }} " class="nav-link {{($menu==2 ? 'active' : '')}}">
                    @else
                    <a href=" {{ route('returns.index') }} " class="nav-link {{($data['menu']==2 ? 'active' : '')}}">
                    @endif
                        <i class="fa fa-dollar nav-icon"></i>
                        <p>List Peminjaman</p>
                    </a>
                </li>
                <li class="nav-item">
                    @if(isset($menu))
                    <a href=" {{ route('pelanggan.index') }} " class="nav-link {{($menu==3 ? 'active' : '')}}">
                    @else
                    <a href=" {{ route('pelanggan.index') }} " class="nav-link {{($data['menu']==3 ? 'active' : '')}}">
                    @endif
                        <i class="fa fa-users nav-icon"></i>
                        <p>List Pelanggan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
        <!-- /.sidebar -->
</aside>

