@extends('main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid px-5">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold">Ulasan</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white p-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <h3 class="card-title text-primary mb-0 fw-bold d-flex align-items-center">
                                <i class="fas fa-comments me-2"></i>
                                Ulasan
                            </h3>
                            @if (isset($ulasan) && count($ulasan) > 0)
                                <div class="d-flex gap-2">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            id="ratingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-filter me-1"></i>
                                            {{ request('sort') == 'desc' ? 'Rating Tertinggi' : (request('sort') == 'asc' ? 'Rating Terendah' : 'Filter') }}
                                        </button>
                                        <ul class="dropdown-menu shadow-sm" aria-labelledby="ratingDropdown">
                                            <li>
                                                <a class="dropdown-item {{ request('sort') == 'desc' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}">
                                                    Rating Tertinggi
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item {{ request('sort') == 'asc' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}">
                                                    Rating Terendah
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <form action="{{ route('ulasan.select') }}" method="POST" id="selectionForm">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Simpan Pilihan
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div class="card-body px-4 pb-4">
                            @if (isset($ulasan) && count($ulasan) > 0)
                                <form action="{{ route('ulasan.select') }}" method="POST" id="selectionForm">
                                    @csrf
                                    <div class="row">
                                        @foreach ($ulasan as $item)
                                            <div class="col-md-6 mb-3">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" 
                                                                name="selected_ulasan[]" 
                                                                value="{{ $item->time }}"
                                                                id="ulasan_{{ $item->time }}"
                                                                {{ $selectedUlasan->contains('ulasan_id', $item->time) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="ulasan_{{ $item->time }}">
                                                                Pilih untuk ditampilkan
                                                            </label>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <h5 class="mb-1">{{ $item->author_name }}</h5>
                                                            <span class="badge bg-warning text-dark d-flex align-items-center">
                                                                <ion-icon name="star" class="me-1"></ion-icon> {{ $item->rating }}
                                                            </span>
                                                        </div>
                                                        <p class="text-muted small mb-2">{{ date("Y-m-d", $item->time) }}</p>
                                                        <p>{{ $item->text }}</p>
                                                        <div class="d-flex">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <ion-icon name="{{ $i <= $item->rating ? 'star' : 'star-outline' }}"
                                                                    style="color: #ffc107; font-size: 20px; margin-right: 2px;">
                                                                </ion-icon>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="fixed-bottom bg-white py-3 px-4 border-top shadow-lg">
                                        <div class="container-fluid px-5">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="text-muted">
                                                    Terpilih <span id="selectedCount">0</span> ulasan
                                                </div>
                                                <button type="submit" form="selectionForm" class="btn btn-primary">
                                                    <i class="fas fa-save me-1"></i> Simpan Pilihan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="text-center py-5">
                                    <img src="/img/ALT 4.png" alt="noservice" class="img-fluid mb-3" style="max-width: 200px;">
                                    <h3 class="fw-bold">Belum ada Ulasan yang dibuat</h3>
                                    <p>Pastikan halaman ini sudah tersambung dengan ulasan Google Maps</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update selected count
        function updateSelectedCount() {
            const selected = document.querySelectorAll('input[name="selected_ulasan[]"]:checked').length;
            document.getElementById('selectedCount').textContent = selected;
        }

        // Initial count
        updateSelectedCount();

        // Add event listeners to all checkboxes
        document.querySelectorAll('input[name="selected_ulasan[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectedCount);
        });

        // Form submission handling
        document.getElementById('selectionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Pilihan ulasan berhasil disimpan!'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Toast.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan saat menyimpan'
                });
            });
        });
    });
</script>
@endsection
@endsection