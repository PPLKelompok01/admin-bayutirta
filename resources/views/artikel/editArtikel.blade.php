@extends('main')
@section('content')

<div class="editArtikel">
    <div class="title">Untitled Artikel</div>
        <div class="info-container">
            @if (isset($detail))
            <form class="info" action="/artikel/editArtikel/{{$detail->id_artikel}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h4>Detail Informasi Artikel</h4>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Upload Thumbnail Artikel (Jika ingin diubah)<span class="req">*</span>
                </label>
                <input class="form1 form-control" type="file" name="foto" id="formFile">
            </div>

            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Judul Artikel<span class="req">*</span>
                </label>
                <input
                    name="judul"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis Judul Artikel"
                    value="{{$detail->judul}}"
                    required>
            </div>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Nama Penulis<span class="req">*</span>
                </label>
                <input
                    name="nama_penulis"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis Nama Penulis"
                    value="{{$detail->nama_penulis}}"
                    required>
            </div>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Title Penulis<span class="req">*</span>
                </label>
                <input
                    name="title_penulis"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis Title Penulis"
                    value="{{$detail->title_penulis}}"
                    required>
            </div>
            <div class="row align-items-center">
                <label for="exampleFormControlTextarea1" class="form-label">
                    Isi Artikel<span class="req">*</span>
                </label>
                <textarea
                    name="isi"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    required>{{$detail->isi}}</textarea>
            </div>
            <div class="buttonGroup">
                <a href="/artikel" class="btn btn btn-outline-danger" role="button">
                    Cancel
                </a>
                <button type="submit" class="btn btn-outline-success">
                    Simpan</button>
            </div>
        </form>

        @else
        <form class="info" action="addArtikel" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h4>Detail Informasi Artikel</h4>
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Upload Thumbnail Artikel<span class="req">*</span>
                    </label>
                    <input class="form1 form-control" type="file" name="foto" id="formFile" >
                </div>

                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Judul Artikel<span class="req">*</span>
                    </label>
                    <input
                        name="judul"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Tulis Judul Artikel"
                        required>
                </div>
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Nama Penulis<span class="req">*</span>
                    </label>
                    <input
                        name="nama_penulis"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Tulis Nama Penulis"
                        required>
                </div>
                <div className="row align-items-center">
                    <label for="validationTooltip03" class="form-label">
                        Title Penulis<span class="req">*</span>
                    </label>
                    <input
                        type="text"
                        name="title_penulis"
                        class="form-control"
                        placeholder="Tulis Title Penulis"
                        id="validationTooltip03"
                        required>
                </div>
                <div class="row align-items-center">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        Isi Artikel<span class="req">*</span>
                    </label>
                    <textarea
                        name="isi"
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        required></textarea>
                </div>
                <div class="buttonGroup">
                    <a href="/artikel" class="btn btn btn-outline-danger" role="button">
                        Cancel
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