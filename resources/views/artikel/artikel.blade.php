<div class="artikel">
    <div class="titleWarp">
        <div class="artikelTitle">Artikel</div>
    </div>

    @if (isset($artikel)AND $artikel->count()>0)
    <div class="card-list">
            @foreach ($artikel as $item)
            <div class="card" style="width: 18rem;">
                @if ($item->foto)
                    <img src="{{ url('images/artikel/'.$item->foto) }}" style="height: 300px; object-fit: cover">
                @endif
                <div class="card-body">
                    <h4>{{$item->judul}}</h4>
                    <p class="card-teks">{{$item->isi}}</p>
                    <div class="d-flex justify-content-between align-items-center pt-3">
                    <small class="text-body-secondary">{{$item->created_at->format('d-m-Y')}}</small>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    @else
    <div class="katalog">
            <div class="picture">
                <img src="/img/ALT 4.png" alt="noservice">
            </div>
            <div class="message text-center">
                <h3 class="fw-bold">Belum ada artikel yang dibuat</h3>
                <p>Buat dan atur artikel yang bisa diakses pelangganmu!</p>
                <p>Klik button “Tambah artikel” di atas kanan halaman ini</p>
            </div>
        @endif
    </div>
</div>