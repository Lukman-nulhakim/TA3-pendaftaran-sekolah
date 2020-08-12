<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('plugin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('plugin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('siswa.index') }}" class="nav-link @yield('siswa')">
              <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>Siswa/Siswi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sekolah.index') }}" class="nav-link @yield('sekolah')">
                <i class="nav-icon fa fa-graduation-cap text-warning" aria-hidden="true"></i>
              <p>Sekolah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kecamatans.index') }}" class="nav-link @yield('kecamatan')">
                <i class="nav-icon fas fa-university text-success" aria-hidden="true"></i>
              <p>Kecamatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kotas.index') }}" class="nav-link @yield('kota')">
                <i class="nav-icon fa fa-building text-danger" aria-hidden="true"></i>
              <p>Kota</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('rekomendasi.index') }}" class="nav-link @yield('rekomendasi')">
                <i class="nav-icon fas fa-balance-scale"></i>
              <p>Rekomendasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="nav-icon fas fa-sign-out-alt"></i>
            Keluar</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>