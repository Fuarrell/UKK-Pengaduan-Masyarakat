<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../fontawesome-free-6.4.0-web/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/app.css">

    <div class="container" style="text-align:center;width:100%; height:400px;margin-top:280px;">
    @if(Auth::user()->error_code == null)
    <p>Your Account is being checked.</p>
    <p>Please wait until admins verifying your account.</p>
    <p>Estimated verifying time : 24 hours</p>
    <a href="/">Kembali ke halaman utama</a>
    </div>
    @elseif(Auth::user()->error_code == '1')
    <p>Nik dan nama lengkap anda tidak sesuai</p>
    <p>Perbaiki nik dan nama lengkap anda</p>
    <a href="">Ubah Data</a>
    <br>
    <a href="/">Kembali ke halaman utama</a>


    @elseif(Auth::user()->error_code == '2')
    <p>Kamu mendaftar dengan informasi yang tidak valid</p>
    <p>Ubah data anda sekarang atau ajukan penghapusan akun</p>
    <p>Akun kamu akan di nonaktifkan dalam 24 jam apabila tidak ada tindakan yang dilakukan</p>
    <a href="">Ubah Data</a>
    <br>
    <a href="">Hapus Akun</a>
    <br>
    <a href="/">Kembali ke halaman utama</a>
    
    @elseif(Auth::user()->error_code == '3')
    <p>Your Account is suspended.</p>
    <p>Akun kamu telah disuspend, karena pengguna melanggar regulasi</p>
    <a href="/appeal">Appeal</a>
    <br>
    <a href="/">Kembali ke halaman utama</a>

    @endif
