@extends('main')
@section('content')
<div class="editpenjualan">
    <div class="title">Untitled penjualan</div>
        <div class="info-container">
            @if (isset($detail))
            <form class="info" action="/penjualan/editpenjualan/{{$detail->id_penjualan}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h4>Detail Informasi penjualan</h4>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Upload Thumbnail penjualan (Jika ingin diubah)<span class="req">*</span>
                </label>
                <input class="form1 form-control" type="file" name="foto" id="formFile">
            </div>
            
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Judul penjualan<span class="req">*</span>
                </label>
                <input
                    name="judul"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis Judul penjualan"
                    value="{{$detail->judul}}"
                    required>
            </div>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Harga<span class="req">*</span>
                </label>
                <input
                    name="harga"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis Harga"
                    value="{{$detail->harga}}"
                    required>
            </div>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Kategori<span class="req">*</span>
                </label>
                <input
                    name="kategori"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Kategori (Merk Perusahaan)"
                    value="{{$detail->Kategori}}"
                    required>
            </div>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Stok<span class="req">*</span>
                </label>
                <input
                    name="stok"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis stok"
                    value="{{$detail->stok}}"
                    required>
            </div>
            <div class="row align-items-center">
                <label for="exampleFormControlTextarea1" class="form-label">
                    Isi Deskripsi<span class="req">*</span>
                </label>
                <textarea
                    name="deskripsi"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    required>{{$detail->deskripsi}}</textarea>
            </div>
            <div class="buttonGroup">
                <a href="/penjualan" class="btn btn btn-outline-danger" role="button">
                    Batal
                </a>
                <button type="submit" class="btn btn-outline-success">
                    Simpan</button>
            </div>
        </form>
        @else
            

            <form class="info" action="addpenjualan" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h4>Detail Informasi penjualan</h4>
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Upload Thumbnail penjualan<span class="req">*</span>
                    </label>
                    <input class="form1 form-control" type="file" name="foto" id="formFile" >
                </div>
                
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Judul penjualan<span class="req">*</span>
                    </label>
                    <input
                        name="judul"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Tulis Judul penjualan"
                        required>
                </div>
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Harga<span class="req">*</span>
                    </label>
                    <input
                        name="harga"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Tulis Harga"
                        required>
                </div>
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Kategori<span class="req">*</span>
                    </label>
                    <input
                        name="kategori"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Kategori (Merk Perusahaan)"
                        required>
                </div>
                <div className="row align-items-center">
                    <label for="validationTooltip03" class="form-label">
                        stok<span class="req">*</span>
                    </label>
                    <input
                        type="text"
                        name="stok"
                        class="form-control"
                        placeholder="Tulis stok"
                        id="validationTooltip03"
                        required>
                </div>
                <div class="row align-items-center">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        Isi Deskripsi<span class="req">*</span>
                    </label>
                    <textarea
                        name="deskripsi"
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        required></textarea>
                </div>
                <div class="buttonGroup">
                    <a href="/penjualan" class="btn btn btn-outline-danger" role="button">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-outline-success">
                        Simpan</button>
                </div>
            </form> 
            @endif                                         
        </div>
    </div>
</div>
@endsection