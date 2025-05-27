@extends('main')
@section('content')

<div class="layanan">
    <div class="titleWarp">
        <div class="layananTitle">Layanan</div>
        <a href="/layanan/info" class="btn btn-primary btn-1" role="button">
            <ion-icon name="add-circle" class="icon-1"></ion-icon>
            Tambah Layanan
        </a>
    </div>
    {{-- <div class="catSort">
        <button type="button" class="btn btn-primary btn-2">
            <ion-icon name="library"></ion-icon>
            Category
        </button>
        <button type="button" class="btn btn-primary btn-2">
            <ion-icon name="funnel"></ion-icon>
            Sort by
        </button>
    </div> --}}
    @if (isset($layanan) AND $layanan->count()>0)
    <div class="card-list">
            @foreach ($layanan as $item)
            <div class="card" style="width: 18rem;">
                @if ($item->foto)
                    <img src="/images/layanan/{{$item->foto}}" style="height: 300px; object-fit: cover">
                    {{-- <img src="{{ url('public/images/'.$item->foto) }}"style="height: auto; width: auto;"> --}}
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h4>{{$item->nama_layanan}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">Merk</p>
                            {{$item->merk_hp}}
                        </div>
                        <div class="col">
                            <p class="fw-bold">Status</p>
                            {{$item->status}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">Keterangan</p>
                            <p class="card-text">{{$item->keterangan}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-3">
                        <div class="btn-group">
                            <a href="{{ url("/layanan/delete/$item->id_layanan") }}"><button type="button" class="btn btn-sm btn-outline-danger">Delete</button></a>
                            <a href="{{ url("/layanan/$item->id_layanan") }}"><button type="button" class="btn btn-3 btn-sm btn-outline-primary">Edit</button></a>
                        </div>
                    </div>
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
                <h3 class="fw-bold">Belum ada layanan yang dibuat</h3>
                <p>Buat dan atur layanan yang bisa diakses pelangganmu!</p>
                <p>Klik button “Tambah Layanan” di atas kanan halaman ini</p>
            </div>
        @endif
    </div>
</div>


@endsection