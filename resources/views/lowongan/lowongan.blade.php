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

    @if (isset($lowongan)AND $lowongan->count()>0)
    <div class="card-list">
        @foreach ($lowongan as $item)
        <div class="card" style="width: 18rem;">
            @if ($item->foto)
            <img src="{{ url('images/lowongan/'.$item->foto) }}" style="height: 300px; object-fit: cover">
            @endif
            <div class="card-body">
                <h4>{{$item->judul}}</h4>
                <p class="card-teks">{{$item->isi}}</p>

            </div>
        </div>
        @endforeach
    </div>

    @else
    <div class="katalog">
        <div class="picture">
            <img src="/img/ALT 4.png" alt="noservice">
        </div>
        <div class="message text-center">
            <h3 class="fw-bold">Belum ada lowongan yang dibuat</h3>
            <p>Buat dan atur lowongan yang bisa diakses pelangganmu!</p>
            <p>Klik button “Tambah lowongan” di atas kanan halaman ini</p>
        </div>
        @endif
    </div>
</div>
@endsection