@extends('layout.layout')

@section('container')

<p>Notifikasi</p>
@foreach($notif as $a)
<p style="margin-bottom:10px;"><i class="fa fa-message" ></i> Pengaduan nomor {{ $a->id_pengaduan }} sudah di tanggapi oleh {{ $a->level }} ({{$a->sent_at}})</p>

@endforeach








    <!-- <p style="border-top:2px solid black;">Updates & Changes</p>
    <p> <i class="fa fa-pen"></i>  Patch 1.03 updated 13 October 2023</p>
    <p>
    <ul style="margin-left:10px;">

        <li>Added Session data for both tables</li>
    </ul>
</p>
    <p> <i class="fa fa-pen"></i>  Patch 1.02 updated 12 October 2023</p>
    <p>
    <ul style="margin-left:10px;">

        <li>Added Multi Table Login</li>
    </ul>
</p>
    <p> <i class="fa fa-pen"></i>  Patch 1.01 updated 11 October 2023</p>
    <p>
    <ul style="margin-left:10px;">

        <li>Added Sweet Alert ver 2</li>
    </ul>
</p>
    <p> <i class="fa fa-pen"></i>  Patch 1.00 updated 10 October 2023</p>
    <p>
    <ul style="margin-left:10px;">

        <li>Added 'Buat Pengaduan Feature'</li>
        <li>Added Captcha to prevent malicious bots</li>
        <li>Added 'Riwayat Pengaduan'</li>
    </ul>
</p> -->


@endsection
