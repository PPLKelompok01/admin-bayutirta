@extends('mainLayanan')
@section('content')
<div class="row">
    <div class="col">
        <div class="sideLayanan">
            @include('sidebarLayanan')
        </div>
    </div>
    <div class="col">
        <div class="editLayanan">
            <div class="title">Layanan Service LCD Handphone</div>
            <div class="info-container">
                <form action="addArtikel" class="info" method="POST" enctype="multipart/form-data">
                    <h4>QNA</h4>
                    <div class="add-section">
                        <div class="card">
                            <div class="qna-section card-body ">
                                <div class="icon">
                                    <ion-icon name="grid"></ion-icon>
                                    Item 1
                                </div>
                                <input class="form-control" type="text" placeholder="Pertanyaan" aria-label="default input example">
                                <textarea id="summernote">
                                    Place <em>some</em> <u>text</u> <strong>here</strong>
                                </textarea>  
                            </div>
                        </div>
                        <div class="row justify-content-md-center">                    
                            <div class="col-md-auto">
                                <button type="button" class="btn btn-primary mb-3">Tambah</button>
                            </div>
                        </div>
                        
                        <div class="divider w-100"></div>
                        <div class="buttonGroup mt-3">
                            <a href="/artikel" class="btn btn btn-outline-danger" role="button">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-outline-success">
                                Simpan</button>
                        </div>
                    <div class="katalog">
                        <div class="picture">
                            <img src="/img/oops.png" alt="noservice">
                        </div>
                        <div class="message text-center">
                            <h3 class="fw-bold">Section ini tidak aktif</h3>
                            <p>Kamu tidak bisa menambahkan atau mengedit section additional information ini,</p>
                            <p>aktifkan terlebih dahulu dengan toggle on untuk melakukan aksi.</p>
                        </div>
                    </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection