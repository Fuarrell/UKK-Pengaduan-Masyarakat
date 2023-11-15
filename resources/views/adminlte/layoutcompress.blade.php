
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free-6.4.0-web/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini dark-mode">
<div class="wrapper">
      @include('adminlte.nav')
      @include('sweetalert::alert')
      </aside>
<div class="content-wrapper">
    <section class="content">
          <div class="container-fluid">
             <div class="row">
                  <div class="col-12">
                      @yield('container')
                </div>    
            </div>
        </div>
    </section>
</div>

@include('adminlte.footer')
</div>
</body>
<!-- jQuery -->

<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script src="../../dist/js/adminlte.min.js"></script>

<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<script>
$(function () {
  bsCustomFileInput.init();
});
</script>