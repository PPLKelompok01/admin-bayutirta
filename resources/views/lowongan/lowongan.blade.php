@extends('main')
@section('content')
<div class="lowongan">
    <div class="titleWarp">
        <div class="lowonganTitle">Lowongan</div>
        <a href="/lowongan/add" class="btn btn-primary btn-1" role="button">
            <ion-icon name="add-circle" class="icon-1"></ion-icon>
            Tambah lowongan
        </a>
    </div>
    <div class="katalog">
        <div class="picture">
            <img src="/img/ALT 4.png" alt="noservice">
        </div>
        <div class="message text-center">
            <h3 class="fw-bold">Belum ada lowongan yang dibuat</h3>
            <p>Buat dan atur lowongan yang bisa diakses pelangganmu!</p>
            <p>Klik button “Tambah lowongan” di atas kanan halaman ini</p>
        </div>
    </div>
</div>
@endsection