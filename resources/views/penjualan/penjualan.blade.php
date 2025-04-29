@extends('main')
@section('content')

<div class="penjualan">
    <div class="titleWarp">
        <div class="penjualanTitle">Penjualan</div>
        <a href="/penjualan/add" class="btn btn-primary btn-1" role="button">
            <ion-icon name="add-circle" class="icon-1"></ion-icon>
            Tambah penjualan
        </a>
    </div>
    <!--<div class="catSort">-->
    <!--    <button type="button" class="btn btn-primary btn-2">-->
    <!--        <ion-icon name="library"></ion-icon>-->
    <!--        Category-->
    <!--    </button>-->
    <!--    <button type="button" class="btn btn-primary btn-2">-->
    <!--        <ion-icon name="funnel"></ion-icon>-->
    <!--        Sort by-->
    <!--    </button>-->
    <!--</div>-->
    @if (isset($penjualan)AND $penjualan->count()>0)
    <div class="card-list">
            @foreach ($penjualan as $item)
            <div class="card" style="width: 18rem;">
                @if ($item->foto)
                    <img src="/images/penjualan/{{$item->foto}}" style="height: 300px; object-fit: cover">
                @endif
                <div class="card-body">
                    <h4>{{$item->judul}}</h4>
                    <p class="card-teks">{{$item->isi}}</p>
                    <div class="d-flex justify-content-between align-items-center pt-3">
                        <div class="btn-group">
                            <a href="{{ url("/penjualan/delete/$item->id_penjualan") }}"><button type="button" class="btn btn-sm btn-outline-danger">Delete</button></a>
                            <a href="{{ url("/penjualan/$item->id_penjualan") }}"><button type="button" class="btn btn-3 btn-sm btn-outline-secondary">Edit</button></a>
                        </div>
                        <small class="text-body-secondary">{{$item->created_at->format('d-m-Y')}}</small>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    <!--<div class="pagination">-->
    <!--    <nav aria-label="...">-->
    <!--        <ul class="pagination">-->
    <!--            <li class="page-item disabled">-->
    <!--                <a class="page-link">Previous</a>-->
    <!--            </li>-->
    <!--            <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
    <!--            <li class="page-item" aria-current="page">-->
    <!--                <a class="page-link" href="#">2</a>-->
    <!--            </li>-->
    <!--            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
    <!--            <li class="page-item">-->
    <!--                <a class="page-link" href="#">Next</a>-->
    <!--            </li>-->
    <!--        </ul>-->
    <!--    </nav>     -->
    <!--</div>-->
        @else
    <div class="katalog">
            <div class="picture">
                <img src="/img/ALT 4.png" alt="noservice">
            </div>
            <div class="message text-center">
                <h3 class="fw-bold">Belum ada penjualan yang dibuat</h3>
                <p>Buat dan atur penjualan yang bisa diakses pelangganmu!</p>
                <p>Klik button “Tambah penjualan” di atas kanan halaman ini</p>
            </div>           
        @endif
    </div>
</div>


@endsection