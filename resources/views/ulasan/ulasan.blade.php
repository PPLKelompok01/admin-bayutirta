@extends('main')
@section('content')
<div class="artikel">
    <div class="titleWarp">
        <div class="artikelTitle">Ulasan</div>
    </div>
    <div class="card-list-ulasan">
        <h5>Ulasan Pelanggan</h5>
        @if (isset($ulasan) AND count($ulasan)>0)
        @foreach ($ulasan as $item)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-auto">
                        <h5>{{$item->author_name}}</h5>
                    </div>
                    <div class="col-md-3 ms-auto reserve d-flex justify-content-end">
                        <span class="badge text-bg-warning d-flex align-item-center" >
                            <ion-icon name="star" class ="ms1"></ion-icon>
                            {{$item->rating}}
                        </span>
                    </div>
                </div>
                <p>{{date("Y-m-d",$item->time)}}</p>
                <p>{{$item->text}}<p>
                <div class="d-flex mt-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <ion-icon 
                            name="{{ $i <= $item->rating ? 'star' : 'star-outline' }}" 
                            style="color: #ffc107; font-size: 20px; margin-right: 2px;">
                        </ion-icon>
                     @endfor
                 </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="katalog">
            <div class="picture">
                <img src="/img/ALT 4.png" alt="noservice">
            </div>
            <div class="message text-center">
                <h3 class="fw-bold">Belum ada Ulasan yang dibuat</h3>
                <p>Pastikan halaman ini sudah tersambung dengan ulasan Google Maps</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
