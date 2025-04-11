@extends('main')
@section('content')
<div class="dashboard-admin">
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-s-9">
                <div class="content">
                    <div class="titleWarp">
                        <div class="layananTitle">Reservasi</div>
                    </div>


                    <div class="content-order">
                        <h5 class="font-jakarta"></h5>
                        <div class="service">
                            <div class="time">
                                <p>hola</p>
                                <h5>hola</h5>
                            </div>
                            <div class="desc">
                                <div class="type">
                                    <p>Tipe handphone</p>
                                    <h5>hola</h5>
                                </div>
                                <div class="status">
                                    <p>Status Layanan</p>
                                    <h5>hola</h5>
                                </div>
                                <button id="konfirmasi" type="button" class="btn confirm" data-bs-toggle="modal">Beri Konfirmasi</button>
                                <!-- Modal Konfirmasi -->
                                <div class="modal fade" id="modalkonfirmasi-{{$item->id_reservasi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reservasi Layanan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid info">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>Pemohon</h5>
                                                            <p id="pemohon">{{$item->name}}</p>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Waktu Permohonan</h5>
                                                            <p id="created_at">{{$item->created_at}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>Tipe Layanan</h5>
                                                            {{$item->nama_layanan}}
                                                        </div>
                                                        <div class="col">
                                                            <h5>Tipe Handphone</h5>
                                                            {{$item->merk_hp}}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <h5>Keterangan</h5>
                                                        <p>{{$item->keterangan}}</p>
                                                    </div>
                                                    {{-- <div class="row">
                                                            <h5>Keterangan Penolakan</h5>
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="Tulis keterangan untuk pelanggan jika permohonan ditolak" id="floatingTextarea2" style="height: 100px"></textarea>
                                                            </div>
                                                        </div> --}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url("/reservasi/$item->id_reservasi/Ditolak") }}">
                                                    <button type="button" class="btn btn-danger">Tolak</button>
                                                </a>
                                                <a href="{{ url("/reservasi/$item->id_reservasi/Diterima") }}">
                                                    <button type="button" class="btn btn-primary">Terima</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                                @endif
                                @if ($item->status == "Diterima" or $item->status == "Ditolak")
                                <h5 class="">{{$item->status}}</h5>
                            </div>
                            <div class="button-detail">
                                <a class="confirm-detail" type="button" data-item="{{$item}}" data-bs-toggle="modal" data-bs-target="#modalDetail-{{$item->id_reservasi}}"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.66812 1.46655C7.80541 1.46655 7.91102 1.57855 7.91102 1.71189V3.42922C7.91102 4.40522 8.70838 5.20522 9.67472 5.21055C10.076 5.21055 10.3929 5.21589 10.6358 5.21589L10.7257 5.21549C10.8881 5.21426 11.1066 5.21055 11.2958 5.21055C11.4279 5.21055 11.5335 5.31722 11.5335 5.45055V9.73855C11.5335 11.0612 10.4721 12.1332 9.16251 12.1332H4.95921C3.58627 12.1332 2.4668 11.0079 2.4668 9.62122V3.87189C2.4668 2.54922 3.53346 1.46655 4.84832 1.46655H7.66812ZM8.23313 8.34655H5.36053C5.14402 8.34655 4.96449 8.52255 4.96449 8.74122C4.96449 8.95989 5.14402 9.14122 5.36053 9.14122H8.23313C8.44964 9.14122 8.62917 8.95989 8.62917 8.74122C8.62917 8.52255 8.44964 8.34655 8.23313 8.34655ZM7.14534 5.67989H5.36053C5.14402 5.67989 4.96449 5.86122 4.96449 6.07989C4.96449 6.29855 5.14402 6.47455 5.36053 6.47455H7.14534C7.36185 6.47455 7.54138 6.29855 7.54138 6.07989C7.54138 5.86122 7.36185 5.67989 7.14534 5.67989ZM8.6805 1.94975C8.6805 1.71989 8.95667 1.60575 9.11456 1.77162C9.68538 2.37109 10.6829 3.41909 11.2405 4.00469C11.3947 4.16629 11.2817 4.43455 11.0594 4.43509C10.6253 4.43669 10.1136 4.43509 9.74558 4.43135C9.16156 4.43135 8.6805 3.94549 8.6805 3.35562V1.94975Z"
                                            fill="#4F46E5" />
                                    </svg>
                                    Lihat Detail
                                </a>
                                <a class="menu-detail" type="button" data-item="{{$item}}" data-bs-toggle="modal" data-bs-target="#modalEdit-{{$item->id_reservasi}}">
                                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.59734 4.18173C7.07933 4.18173 7.47006 3.791 7.47006 3.30901C7.47006 2.82701 7.07933 2.43628 6.59734 2.43628C6.11534 2.43628 5.72461 2.82701 5.72461 3.30901C5.72461 3.791 6.11534 4.18173 6.59734 4.18173Z"
                                            fill="#4F46E5" />
                                        <path
                                            d="M6.59734 7.6727C7.07933 7.6727 7.47006 7.28197 7.47006 6.79997C7.47006 6.31798 7.07933 5.92725 6.59734 5.92725C6.11534 5.92725 5.72461 6.31798 5.72461 6.79997C5.72461 7.28197 6.11534 7.6727 6.59734 7.6727Z"
                                            fill="#4F46E5" />
                                        <path
                                            d="M6.59734 11.1635C7.07933 11.1635 7.47006 10.7728 7.47006 10.2908C7.47006 9.80882 7.07933 9.41809 6.59734 9.41809C6.11534 9.41809 5.72461 9.80882 5.72461 10.2908C5.72461 10.7728 6.11534 11.1635 6.59734 11.1635Z"
                                            fill="#4F46E5" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection