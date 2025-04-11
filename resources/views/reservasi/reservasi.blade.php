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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection