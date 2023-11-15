@extends('layout.layout')

@section('container')
<p style="text-align:center;">Riwayat Pengaduan <br> <br> <button class="btn btn-secondary"><a href="/arsip/{{Auth::user()->nik}}" style="color:white;text-decoration:none;"><i class="fa fa-archive"></i> Arsip</a></button></p>
@if($dataCount > 0)
<table class="table" style="text-align:center">
  <thead>
    <tr>
      <th scope="col-1">No</th>
      <th scope="col-4">Isi Pengaduan</th>
      <th scope="col-3">Foto</th>
      <th scope="col-2">Status</th>
      <th scope="col-2">Tanggal Pengaduan
        <br>
        Tahun/Bulan/Hari
      </th>
    </tr>
  </thead>
  <tbody>

  @foreach($data as $p)

    <tr>
      <th scope="row">{{$p->id_pengaduan}}</th>
      <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#isiModal{{$p->id_pengaduan}}"><i class="fa fa-eye"></i> View Text</button></td>
      <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal{{$p->id_pengaduan}}"><i class="fa fa-eye"></i> View Images</button></div></td>
      <td>
    @if($p->status === '0')
      Belum Ditanggapi
    @elseif($p->status === 'proses')
      Proses 
    @else
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tanggapanModal{{$p->id_pengaduan}}"><i class="fa fa-eye"></i> View Tanggapan</button>
    @endif
  </td>
    <td class="tgl">{{$p->tgl_pengaduan}}</td>
    </tr>
    @endforeach
    <tr>
      <td><br><br></td>
  </tr>
  </tbody>
  
</table>
@else
<p style="text-align:center">" Kamu belum membuat pengaduan "</p>
@endif



@foreach($data as $p)
<div class="modal fade" id="imageModal{{$p->id_pengaduan}}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2"><i class="fa fa-image"></i> View Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="display:flex;justify-content:center;align-item:center;">

        <img src="../../img_pengaduan/{{$p->foto}}" alt="" srcset="" style="max-width:450px;max-height:450px;">
     
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="isiModal{{$p->id_pengaduan}}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2"><i class="fa fa-book"></i> View Isi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>{{ $p->isi_laporan }}</p>
      </div>

    </div>
  </div>
</div>

@foreach($tanggapan as $a)


<div class="modal fade" id="tanggapanModal{{$a->id_pengaduan}}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2"><i class="fa fa-book"></i> View Isi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p style="text-align:center;border-bottom:black solid 2px;padding:15px;">Dibalas oleh {{$a->level}} {{$a->nama_petugas}} :</p>
      <p style="margin-top:10px;text-align:center;">{{$a->tanggapan}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="/arsip-laporan/{{$a->id_pengaduan}}/{{Auth::user()->nik}}" method="post">
          @csrf
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Masukkan ke Arsip</button>
        </form>
      </div>

    </div>
  </div>
</div>


@endforeach

<style>
  .modal-body {
    word-break: break-all;
}

</style>
@endforeach
@endsection

