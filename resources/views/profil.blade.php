@extends('layout.layout')
@section('container')

    <h5 style="margin:10px;">Profil Akun</h5>
    <p>Nik : {{Auth::user()->nik}}</p>
    <p>Nama : {{Auth::user()->nama}}</p>
    <p>Username : {{Auth::user()->username}}</p>
    <p>Telp : {{Auth::user()->telp}}</p>
    <p><button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editProfilModal">Edit Data</button></p>
@endsection
