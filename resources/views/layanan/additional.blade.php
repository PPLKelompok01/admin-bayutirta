@extends('mainLayanan')
@section('content')
<div class="editArtikel">
    <div class="title">Layanan Service LCD Handphone</div>
        <div class="info-container">
            <form action="addArtikel" class="info" method="POST" enctype="multipart/form-data">
                    <h4>Additional Info</h4>
                    <div class="add-section">
                        <label for="formFile" class="form-label">
                            Durasi Perbaikan
                        </label>
                        <div class="input-group mb-3 justify-content-between align-items-center">
                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">Jam</span>
                        </div>
                        
                        <label for="formFile" class="form-label">
                            Jaminan/Garansi Berlaku
                        </label>
                        <div class="input-group mb-3 justify-content-between align-items-center">
                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">Jam</span>
                        </div>

                        <div className="row align-items-center">
                            <label for="formFile" class="form-label">
                                Kategori
                            </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="--" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-bs-target="#exampleModal">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
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
                    </div>
                </div>
            </form>                                         
        </div>
    </div>
</div>
@endsection