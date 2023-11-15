
  <!-- Theme style -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="/dashboard" class="nav-link">Home</a> -->
      </li>

    </ul>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->level }} : {{Auth::user()->nama_petugas}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if( Auth::user()->level  === "petugas")
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-clover"></i>
              <p>
                Data Masyarakat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/akunA" class="nav-link {{ ($title === 'akun') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masyarakat Verification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pengaduanA" class="nav-link {{ ($title === 'pengaduan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaduan</p>
                </a>
              </li>
              @else
              <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-clover"></i>
              <p>
                Data Masyarakat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/akunA" class="nav-link {{ ($title === 'akun') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masyarakat Verification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pengaduanA" class="nav-link {{ ($title === 'pengaduan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaduan</p>
                </a>
              </li>
      @endif






        <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="fa-solid fa-right-from-bracket fa-lg nav-icon" id="logout"></i>
              <p>
                  Log Out
              </p>
            </a>
          </li>
      </nav>
      <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
      <script>
        $('#logout').hover(
       function(){ $(this).toggleClass('fa-spin'); }
)

      </script>

