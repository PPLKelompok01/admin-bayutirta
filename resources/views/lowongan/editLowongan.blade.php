@extends('main')
@section('content')
<div class="editLowongan">
    <div class="title">Untitled Lowongan</div>
        <div class="info-container">
            @if (isset($detail))
            <form class="info" action="/lowongan/editLowongan/{{$detail->id_lowongan}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h4>Detail Informasi Lowongan</h4>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Upload Thumbnail Lowongan (Jika ingin diubah)<span class="req">*</span>
                </label>
                <input class="form1 form-control" type="file" name="foto" id="formFile">
            </div>
            
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Judul Lowongan<span class="req">*</span>
                </label>
                <input
                    name="judul"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis Judul Lowongan"
                    value="{{$detail->judul}}"
                    required>
            </div>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Cabang Perusahaan<span class="req">*</span>
                </label>
                <input
                    name="cabang_perusahaan"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis Cabang Perusahaan"
                    value="{{$detail->cabang_perusahaan}}"
                    required>
            </div>
            <div className="row align-items-center">
                <label for="formFile" class="form-label">
                    Posisi<span class="req">*</span>
                </label>
                <input
                    name="posisi"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Tulis posisi"
                    value="{{$detail->posisi}}"
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
                <a href="/lowongan" class="btn btn btn-outline-danger" role="button">
                    Batal
                </a>
                <button type="submit" class="btn btn-outline-success">
                    Simpan</button>
            </div>
        </form>
        @else
            

            <form class="info" action="addLowongan" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h4>Detail Informasi Lowongan</h4>
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Upload Thumbnail Lowongan<span class="req">*</span>
                    </label>
                    <input class="form1 form-control" type="file" name="foto" id="formFile" >
                </div>
                
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Judul Lowongan<span class="req">*</span>
                    </label>
                    <input
                        name="judul"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Tulis Judul Lowongan"
                        required>
                </div>
                <div className="row align-items-center">
                    <label for="formFile" class="form-label">
                        Cabang Perusahaan<span class="req">*</span>
                    </label>
                    <input
                        name="cabang_perusahaan"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Tulis Cabang Perusahaan"
                        required>
                </div>
                <div className="row align-items-center">
                    <label for="validationTooltip03" class="form-label">
                        Posisi<span class="req">*</span>
                    </label>
                    <input
                        type="text"
                        name="posisi"
                        class="form-control"
                        placeholder="Tulis posisi"
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
                    <a href="/lowongan" class="btn btn btn-outline-danger" role="button">
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