<nav class="navbar navbar-expand-lg navbar-light ">
<button class="navbar-toggler" data-bs-toggle="modal" data-bs-target="#nav"aria-controls="navbarNav"  aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($active === 'home') ? 'active' : '' }}" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === 'pengaduan') ? 'active' : '' }}" href="/pengaduan">Pengaduan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === 'riwayat') ? 'active' : '' }}" href="/riwayat/{{Auth::user()->nik}}">Riwayat Pengaduan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === 'profile') ? 'active' : '' }}" href="/profil">Profil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="modal fade" id="nav" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2"><i class="fa fa-clover"></i> Navigator</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ul >
        <li><a class="nav-link" style="color:black;text-decoration:none;" aria-current="page" href="/home">Home {{ ($active === 'home') ? '<-' : '' }}</a></li>
        <li><a class="nav-link" style="color:black;text-decoration:none;" href="/pengaduan">Pengaduan {{ ($active === 'pengaduan') ? '<-' : '' }}</a></li>
        <li><a class="nav-link" style="color:black;text-decoration:none;" href="/riwayat/{{Auth::user()->nik}}">Riwayat Pengaduan  {{ ($active === 'riwayat') ? '<-' : '' }}</a></li>
        <li><a class="nav-link" style="color:black;text-decoration:none;" href="/profil">Profil  {{ ($active === 'profile') ? '<-' : '' }}</a></li>
      </ul>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>