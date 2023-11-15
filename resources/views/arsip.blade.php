
<table style="text-align:center;margin:auto;">
  <thead>

    <tr>
      <th scope="col">No</th>
      <th scope="col">Isi Pengaduan</th>
      <th scope="col">Tanggal Pengaduan</th>
      <th scope="col">Tanggal Tanggapan</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 0;?>
  @foreach($data as $data)
  <?php $no++; ?>
    <tr>
      <th scope="row">{{ $data->id_pengaduan }}</th>
      <td>{{$data->isi_laporan}}</td>
      <td>{{$data->created_at}}</td>
      <td><a href="/arsipDetail/{{ $data->nik }}/{{$data->id_pengaduan}}">Detail</a></td>
    </tr>
    @endforeach
    <tr>
    <td><a href="/riwayat/{{Auth::user()->nik}}">Kembali</a></td>
    </tr>
  </tbody>
  
 

</table>



