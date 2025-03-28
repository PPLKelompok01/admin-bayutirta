<div class="pengaturan col-5">
    <div class="row gap-4 p-3">
        <div class="basic w-100">
            <h5>Pengaturan Dasar</h5>
            <div class="list-group">
                <a href="/layanan/info" class="list-group-item list-group-item-action
                        {{ Request::is('layanan.infoLayanan') ? 'active' : '' }}">
                    Informasi Umum
                </a>
            </div>
        </div>
        <div class="additional">
            <h5>Pengaturan Tambahan</h5>
            <ul class="list-group">
                {{-- <!-- <a href="/layanan/additional" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                        {{ Request::is('layanan.additional') ? 'active' : '' }}">
                        <p>Additional Info</p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div> 
                </a> 
                 <a href="/layanan/review" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                        {{ Request::is('layanan.reviewLayanan') ? 'active' : '' }}">
                        <p>Review</p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div> 
                </a> --> --}}
                 <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                        {{ Request::is('layanan.qna') ? 'active' : '' }}">
                        <p>Active?</p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div> 
                </a>
            </ul>
        </div>
        <div class="divider w-100"></div>
        {{-- <a href="" class="btn btn-primary btn-1 w-100" role="button">
            Publish Layanan
        </a> --}}
    </div>
</div>