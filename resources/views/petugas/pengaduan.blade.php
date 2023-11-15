@extends('adminlte.layout')

@section('container')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Pengaduan </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Laporan Pengaduan</li>
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
                <h3 class="card-title">Laporan Pengaduan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                   
                  <tr style="text-align:center">
                    <th>#</th>
                    <th>NIK</th>
                    <th>Isi Laporan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 

                  <?php $no=0;?>
                    @foreach($pengaduan as $p)
                    <?php $no++ ?>
                  <tr style="text-align:center">
                    <td>{{$no}}</td>
                    <td>{{$p->nik}}</td>
                    <td>{{$p->isi_laporan}}</td>
                    <td>{{$p->tgl_pengaduan}}</td>
                    <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#memberikanTanggapan{{$p->id_pengaduan}}">Memberikan Tanggapan</button>
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
         
    @foreach($pengaduan as $p)
      <div class="modal fade" id="memberikanTanggapan{{$p->id_pengaduan}}" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1"><i class="fa fa-pen"> </i> Laporan Pengaduan</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="memberikan_tanggapan">
          @csrf
          <input type="hidden" name="id_pengaduan" value="{{$p->id_pengaduan}}">
        <div class="mb-3" style="font-size:19px;text-align:center;">
            <label for="nik" class="col-form-label">NIK Pembuat Laporan :</label>
            <p>{{$p->nik}}</p>
            <label for="isi" class="col-form-label">Isi Laporan :</label>
            <p>{{$p->isi_laporan}}</p>
            <label for="foto" class="col-form-label">Foto Laporan :</label>
            <p><img src="img_pengaduan/{{$p->foto}}" alt="" srcset="" width="50%" max-height="200px"></p>
            <label for="tanggapan" class="col-form-label">Isi Tanggapan :</label>
            <p><textarea name="tanggapan" id="tanggapan" cols="80" rows="10" style="width:90%;"></textarea></p>
            <label for="link" class="col-form-label">External Links (Optional)</label>
            <p><input type="text" name="link1" class="form-control" placeholder="External Link 1" style="text-align:center;"></p>
            <p><input type="text" name="link2" class="form-control" placeholder="External Link 2" style="text-align:center;"></p>
            <p><input type="text" name="link3" class="form-control" placeholder="External Link 3" style="text-align:center;"></p>
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
      @endforeach
@endsection

