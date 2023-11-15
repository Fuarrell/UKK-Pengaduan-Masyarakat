<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Pengaduan Masyarakat
    </a>
    @guest
    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</button>
    @endguest

    @auth
    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#logoutModal">Log Out</button>


    @endauth
</div>
</nav>