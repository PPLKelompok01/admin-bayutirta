@extends('mainLayanan')
@section('content')
<div class="section">
    <div class="titleWarp">
        <div class="layananTitle">Layanan Service LCD Handphone</div>
    </div>
    <div class="d-flex">
        <div class="editLayanan">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info p-4">
                        <h4>Deskripsi Layanan</h4>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <textarea id="summernote">
                            Place <em>some</em> <u>text</u> <strong>here</strong>
                          </textarea>
                        </div>
                        <div class="buttonGroup">
                            <a href="/layanan" class="btn btn btn-outline-danger" role="button">
                                Batal
                            </a>
                            <button type="button" class="btn btn-outline-success">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection