<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../fontawesome-free-6.4.0-web/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/app.css">
    <title>Pengaduan Masyarakat</title>

  </head>
  <body>
    @include('layout.nav')
    
    <div class="container-fluid" style="width:80%;margin:auto;">
    @include('sweetalert::alert')
    
    <h5 style="text-align:center ;">Pengaduan Masyarakat</h5>
    @auth
    <h5 style="text-align:center ;">Selamat datang {{ Auth::user()->nama }}, di platform Pengaduan Masyarakat</h5>
    @endauth

    @guest
    <p style="text-align:center ;">Selamat datang di platform Pengaduan Masyarakat</p>
    @endguest

    @auth
    @include('layout.nav_head')
    @endauth
    </div>
  @auth
    </div>
    <div class="container-height" style="border:1px solid lightgrey;height:auto;">
    
    @endauth
    @auth
    @yield('container')
  @endauth    
  </div>
  @include('layout.footer')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
 


</html>
 <!-- Modal Login -->
 <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-right-to-bracket"> </i> Sign In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="login">
        @csrf

          <div class="mb-3">
            <label for="username" class="col-form-label">Username </label>
            <input type="text" class="form-control" id="username" name="username" autofocus required>
          </div>
          <div class="mb-3">
            <label for="pass" class="col-form-label">Password </label>
            <input type="password" class="form-control" id="pass" name="password" required>
          </div>
        <div class="mb-3">
          <p>You don't have an account ?</p>
          <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalRegister" style="width:100%;">Register</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-light">Login</button>
        </form>
      </div>
      
    </div>
  </div>
</div>

  <!-- Modal Login --> 

   <!-- Modal Register --> 
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1"><i class="fa fa-user"> </i> Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="register">
          @csrf
          @if($errors->any())
         <div class="alert alert-danger" id="alert">
            <strong>Errors!</strong> <br>
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif

        <div class="mb-3">
            <label for="nik" class="col-form-label">Nik </label>
            <input type="text" class="form-control" id="nik" name="nik" required>
          </div>
          <div class="mb-3">
            <label for="telp" class="col-form-label">Telp </label>
            <input type="text" class="form-control" id="telp" name="telp" required>
          </div>
          <div class="mb-3">
            <label for="username" class="col-form-label">Name </label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="pass" class="col-form-label">Username </label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="pass" class="col-form-label">Password </label>
            <input type="password" class="form-control" id="pass" name="password" required>
          </div>
          <div class="mb-3 ">
            <label for="ca" class="col-form-label">Recaptcha </label>
                              {!! NoCaptcha::renderJs() !!}
                              {!! NoCaptcha::display() !!}
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-light">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Register -->

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2"><i class="fa fa-sign-out"></i> " Log Out "</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Yakin ingin keluar ?</p>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-light"><a href="/logout" style="text-decoration:none;color:black;">Log Out</a></button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Logout -->

<!-- Modal Edit Profil -->
@auth
<div class="modal fade" id="editProfilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"> </i> Edit Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="edit-profil/{{Auth::user()->nik}}/{{Auth::user()->username}}">
        @csrf
        @if($errors->any())
         <div class="alert alert-danger" id="alert">
            <strong>Errors!</strong> <br>
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
        <div class="mb-3">
            <label for="pass" class="col-form-label">Nama </label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{Auth::user()->nama}}">
          </div>
          <div class="mb-3">
            <label for="username" class="col-form-label">Nomor Telepon </label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="Nomor Telepon" value="{{Auth::user()->telp}}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-light">Simpan</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
@endauth
<!-- Modal Edit Profil -->

<!-- Modal Buat Pengaduan -->
@auth
<div class="modal fade" id="pengaduanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"> </i> Buat Pengaduan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="kirim-pengaduan" enctype="multipart/form-data">
        @csrf

          <div class="mb-3">
            <label for="isi" class="col-form-label">Isi Pengaduan </label>
            <textarea name ="isi" class="form-control" id="isi" cols="30" rows="10" required></textarea>
          </div>
        <div class="mb-3">
            <label for="foto" class="col-form-label">Upload Foto [Optional] </label>
            <input type="file" class="form-control"  accept="image/*" name="foto" id="foto" onchange="loadFile(event)"  required>
            <img id="output" style="width:100%; height:auto;margin-top:10px;"/>
            <script>
                var loadFile = function(event) {
                  var output = document.getElementById('output');
                  output.src = URL.createObjectURL(event.target.files[0]);
                  output.onload = function() {
                    URL.revokeObjectURL(output.src)
                  }
                };
              </script>  
         </div>
         
                   <div class="mb-3 ">
            <label for="ca" class="col-form-label">Recaptcha </label>
                              {!! NoCaptcha::renderJs() !!}
                              {!! NoCaptcha::display() !!}
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-light">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if (session('pengaduan'))
    <script>
        $(function() {
            $('#pengaduanModal').modal('show');
        });
</script>
    @endif

@if (session('edit'))
    <script>
            window.setTimeout(function(){
                $('#editProfilModal').modal('show');
            }, 2000)
</script>
    @endif
@endauth

</html>