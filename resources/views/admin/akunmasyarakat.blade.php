@extends('adminlte.layoutadmin')

@section('container')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Masyarakat Account </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Masyarakat Account</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Masyarakat Account</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                   
                  <tr style="text-align:center">
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=0;?>
                    @foreach($dataakun as $p)
                    <?php $no++ ?>
                  <tr style="text-align:center">
                    <td>{{$no}}</td>
                    <td>{{$p->nik}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->telp}}</td>
                    <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konfirmasiAkun{{$p->nik}}">Konfirmasi Akun</button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolakAkun{{$p->nik}}">Tolak Akun</button>
                    </td>
                  </tr>
                @endforeach
                </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
         
    @foreach($dataakun as $p)
      <div class="modal fade" id="konfirmasiAkun{{$p->nik}}" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1"><i class="fa fa-person"></i> Konfirmasi Akun</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="konfirmasi-akun">
          @csrf
          <h5 style="text-align:center;">Apakah akun dengan nama : {{$p->nama}} 
            <br>sesuai dengan nik : {{$p->nik}} ?</h5>
            <p style="color:red;text-align:center;">Anda harus benar benar mem-verifikasi karena <br> konfirmasi ini tidak dapat di ulang. <br> Anda bertanggung jawab sepenuhnya apabila ada kesalahan konfirmasi. Sesuai dengan kebijakan TOS</p>
                  
                  <div class="form-check" style="text-align:center;">
        <input class="form-check-input" type="checkbox" value="" id="setuju">
        <label class="form-check-label" for="setuju">
          Saya berani bertanggung jawab
        </label>
      </div>
            <input type="hidden" name="nik" value="{{$p->nik}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="konfirm" disabled >Konfirmasi</button>
        </form>
      </div>
    </div>
  </div>
</div>

      <div class="modal fade" id="tolakAkun{{$p->nik}}" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1"><i class="fa fa-person"></i> Tolak Akun</h5>
      </div>
      <div class="modal-body" style="text-align:center;">
        <form method="post" action="tolak-akun/{{$p->nik}}">
          @csrf
          <h5>Menolak Verifikasi Akun</h5>
          <select class="form-select" style="text-align:center;" aria-label="Default select example" name="alasan">
            <option selected >Pilih alasan akun ditolak</option>
            @foreach($errorCode as $a)
            <option value="{{$a->id_error}}">{{ $a->error_code }}</option>
            @endforeach
          </select>
        <div class="form-check" style="text-align:center;">
            <p style="color:red;text-align:center;">Anda harus benar benar mem-verifikasi karena <br> konfirmasi ini tidak dapat di ulang. <br> Anda bertanggung jawab sepenuhnya apabila ada kesalahan konfirmasi. Sesuai dengan kebijakan TOS</p>          
        <input class="form-check-input" type="checkbox" value="" id="yes">
        <label class="form-check-label" for="setuju">
          Saya berani bertanggung jawab
        </label>
      </div>
            <input type="hidden" name="nik" value="{{$p->nik}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="confirm" disabled >Konfirmasi</button>
        </form>
      </div>
    </div>
  </div>
</div>
      @endforeach

        <script>
          $('#setuju').click(function(){

            if(!$(this).is(':checked')){
            $('#konfirm').attr("disabled","disabled");   
            }
            else
            $('#konfirm').removeAttr('disabled');
            });
            
</script>


<script>
          $('#yes').click(function(){

            if(!$(this).is(':checked')){
            $('#confirm').attr("disabled","disabled");   
            }
            else
            $('#confirm').removeAttr('disabled');
            });
            
</script>
@endsection

