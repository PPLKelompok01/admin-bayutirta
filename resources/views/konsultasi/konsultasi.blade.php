@extends('main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid px-5">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold">Konsultasi</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Konsultasi -->
    <section class="content mb-4">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card bg-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Total Konsultasi</h6>
                                    <h3 class="fw-bold mb-0">{{ $totalKonsultasi }}</h3>
                                </div>
                                <div class="bg-info p-3 rounded text-white">
                                    <i class="fas fa-comments fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card bg-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Menunggu</h6>
                                    <h3 class="fw-bold mb-0">{{ $menungguCount }}</h3>
                                </div>
                                <div class="bg-warning p-3 rounded text-white">
                                    <i class="fas fa-clock fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card bg-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Diproses</h6>
                                    <h3 class="fw-bold mb-0">{{ $diprosesCount }}</h3>
                                </div>
                                <div class="bg-primary p-3 rounded text-white">
                                    <i class="fas fa-spinner fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card bg-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Selesai</h6>
                                    <h3 class="fw-bold mb-0">{{ $selesaiCount }}</h3>
                                </div>
                                <div class="bg-success p-3 rounded text-white">
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white p-4">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                <h3 class="card-title text-primary mb-0 fw-bold">
                                    <i class="fas fa-comments mr-2"></i>
                                    Daftar Konsultasi
                                </h3>
                                <div class="d-flex gap-2 flex-wrap">
                                    <!-- Search Form -->
                                    <form class="me-2" action="{{ url('/konsultasi') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari konsultasi..."
                                                name="search" value="{{ request('search') }}">
                                            <button class="btn btn-outline-primary" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Status Filter -->
                                    <div class="dropdown me-2">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-filter mr-1"></i>
                                            {{ $selectedStatus }}
                                        </button>
                                        <ul class="dropdown-menu shadow-sm" aria-labelledby="filterDropdown">
                                            <li><a class="dropdown-item {{ $selectedStatus == 'Semua' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'Semua']) }}">Semua</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedStatus == 'menunggu' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'menunggu']) }}">Menunggu</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedStatus == 'diproses' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'diproses']) }}">Diproses</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedStatus == 'selesai' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'selesai']) }}">Selesai</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Category Filter -->
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-tag mr-1"></i>
                                            {{ $selectedKategori }}
                                        </button>
                                        <ul class="dropdown-menu shadow-sm" aria-labelledby="categoryDropdown">
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Semua' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Semua']) }}">Semua</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Hardware' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Hardware']) }}">Hardware</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Software' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Software']) }}">Software</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Jaringan' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Jaringan']) }}">Jaringan</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Battery' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Battery']) }}">Battery</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Display' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Display']) }}">Display</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Audio' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Audio']) }}">Audio</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Camera' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Camera']) }}">Camera</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedKategori == 'Lainnya' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['kategori' => 'Lainnya']) }}">Lainnya</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 pb-4">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No</th>
                                            <th>
                                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}"
                                                    class="text-dark text-decoration-none">
                                                    Tanggal
                                                    @if(request('sort') == 'created_at')
                                                    <i
                                                        class="fas fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }}"></i>
                                                    @else
                                                    <i class="fas fa-sort"></i>
                                                    @endif
                                                </a>
                                            </th>
                                            <th>Pelanggan</th>
                                            <th>Kategori</th>
                                            <th>Perangkat</th>
                                            <th>
                                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'urgensi', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}"
                                                    class="text-dark text-decoration-none">
                                                    Urgensi
                                                    @if(request('sort') == 'urgensi')
                                                    <i
                                                        class="fas fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }}"></i>
                                                    @else
                                                    <i class="fas fa-sort"></i>
                                                    @endif
                                                </a>
                                            </th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($konsultasi) === 0)
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Data Tidak Ditemukan</td>
                                        </tr>
                                        @else
                                        @foreach($konsultasi as $index => $item)
                                        <tr>
                                            <td>{{ ($konsultasi->currentPage() - 1) * $konsultasi->perPage() + $index + 1 }}
                                            </td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>
                                                <span class="badge bg-primary text-white">{{ $item->kategori }}</span>
                                            </td>
                                            <td>{{ $item->perangkat }}</td>
                                            <td>
                                                @php
                                                $urgency = strtolower(trim($item->urgensi));
                                                @endphp

                                                @if($urgency == 'tinggi')
                                                <span class="badge bg-danger">Tinggi</span>
                                                @elseif($urgency == 'sedang')
                                                <span class="badge bg-warning text-dark">Sedang</span>
                                                @elseif($urgency == 'rendah')
                                                <span class="badge bg-success">Rendah</span>
                                                @else
                                                <span class="badge bg-secondary">{{ $item->urgensi }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge {{ 
                                                $item->status === 'menunggu' ? 'bg-warning text-dark' : 
                                                ($item->status === 'diproses' ? 'bg-primary text-white' : 'bg-success text-white') 
                                            }}">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info me-1" dusk="btn-view-{{ $item->id }}"
                                                    onclick="viewConsultation({{ $item->id }})">
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                                <button class="btn btn-sm btn-primary"
                                                    onclick="replyConsultation({{ $item->id }})">
                                                    <i class="fas fa-reply"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-center mt-4">
                                {{ $konsultasi->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal View Konsultasi -->
<div class="modal fade" id="viewConsultationModal" tabindex="-1" aria-labelledby="viewConsultationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="viewConsultationModalLabel">Detail Konsultasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <!-- Customer Information -->
                    <div class="col-md-6">
                        <h6 class="border-bottom pb-2 mb-3">Informasi Pelanggan</h6>
                        <div class="mb-3">
                            <label class="text-muted">Nama</label>
                            <p class="customer-name mb-1"></p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted">Email</label>
                            <p class="customer-email mb-1"></p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted">Nomor Telepon</label>
                            <p class="customer-phone mb-1"></p>
                        </div>
                    </div>

                    <!-- Consultation Information -->
                    <div class="col-md-6">
                        <h6 class="border-bottom pb-2 mb-3">Informasi Konsultasi</h6>
                        <div class="mb-3">
                            <label class="text-muted">Kategori</label>
                            <div>
                                <span class="consultation-category badge"></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted">Perangkat</label>
                            <p class="consultation-device mb-1"></p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted">Tingkat Urgensi</label>
                            <div>
                                <span class="consultation-urgency badge mb-1"></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted">Status</label>
                            <div>
                                <span class="consultation-status badge mb-1"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Problem Description -->
                <div class="mb-4">
                    <h6 class="border-bottom pb-2 mb-3">Deskripsi Masalah</h6>
                    <p class="consultation-problem mb-1"></p>
                </div>

                <!-- Photo (if exists) -->
                <div class="mb-4 photo-container d-none">
                    <h6 class="border-bottom pb-2 mb-3">Foto</h6>
                    <div class="text-center">
                        <img src="" alt="Foto Konsultasi" class="img-fluid consultation-photo mb-3"
                            style="max-height: 300px;">
                        <br>
                        <a href="#" class="btn btn-sm btn-primary download-photo" download="konsultasi-foto.jpg">
                            <i class="fas fa-download me-1"></i> Unduh Foto
                        </a>
                    </div>
                </div>

                <!-- Response (if exists) -->
                <div class="mb-4 response-container d-none">
                    <h6 class="border-bottom pb-2 mb-3">Jawaban</h6>
                    <p class="consultation-response mb-1"></p>
                    <div class="text-muted mt-2 response-timestamp"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-reply">
                    <i class="fas fa-reply me-1"></i> Balas
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Reply Konsultasi -->
<div class="modal fade" id="replyConsultationModal" tabindex="-1" aria-labelledby="replyConsultationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="replyConsultationModalLabel">Balas Konsultasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="replyForm">
                    <input type="hidden" id="consultationId">

                    <div class="mb-4">
                        <h6 class="border-bottom pb-2">Ringkasan Konsultasi</h6>
                        <div class="bg-light p-3 rounded mb-3">
                            <p class="mb-0 consultation-problem-preview"></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="statusUpdate" class="form-label">Ubah Status</label>
                        <select class="form-select" id="statusUpdate" required>
                            <option value="menunggu">Menunggu</option>
                            <option value="diproses">Diproses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="replyMessage" class="form-label">Jawaban</label>
                        <textarea class="form-control" id="replyMessage" rows="5" required></textarea>
                        <div class="form-text">Berikan jawaban yang jelas dan lengkap untuk membantu pelanggan.</div>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-1"></i> Kirim Jawaban
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

{{-- Debug information to check actual values --}}
<div style="display: none;">
    <pre id="debug-info">
        Urgency values: 
        @foreach($konsultasi as $debug_item)
            {{ $debug_item->urgensi }} | 
        @endforeach
    </pre>
</div>

<style>
.dropdown-item.active {
    background-color: #e9ecef;
    color: #000;
}

/* Custom badge classes for categories */
.badge-hardware {
    background-color: #dc3545;
    color: white;
}

.badge-software {
    background-color: #198754;
    color: white;
}

.badge-jaringan {
    background-color: #0dcaf0;
    color: white;
}

.badge-battery {
    background-color: #ffc107;
    color: #212529;
}

.badge-display {
    background-color: #0d6efd;
    color: white;
}

.badge-audio {
    background-color: #212529;
    color: white;
}

.badge-camera {
    background-color: #6c757d;
    color: white;
}

.badge-other {
    background-color: #f8f9fa;
    color: #212529;
}

/* Add specific badge color styles with !important to override any conflicting rules */
.badge.bg-danger {
    background-color: #dc3545 !important;
    color: white !important;
}

.badge.bg-success {
    background-color: #198754 !important;
    color: white !important;
}

.badge.bg-info {
    background-color: #0dcaf0 !important;
    color: white !important;
}

.badge.bg-warning {
    background-color: #ffc107 !important;
    color: #212529 !important;
}

.badge.bg-primary {
    background-color: #0d6efd !important;
    color: white !important;
}

.badge.bg-dark {
    background-color: #212529 !important;
    color: white !important;
}

.badge.bg-secondary {
    background-color: #6c757d !important;
    color: white !important;
}

.badge.bg-light {
    background-color: #f8f9fa !important;
    color: #212529 !important;
}

.card {
    box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
    border: 0;
    margin-bottom: 1rem;
}

.table> :not(caption)>*>* {
    padding: 1rem;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
}

.modal-header .btn-close {
    filter: brightness(0) invert(1);
    opacity: 1;
}

.consultation-details label {
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
}

.consultation-details p {
    font-size: 1rem;
    color: #333;
}

.badge {
    font-weight: 500;
    padding: 0.5em 0.75em;
}

.content-header {
    padding: 25px 0 0 0;
}

.content {
    padding: 25px 0;
}

.content-wrapper {
    padding: 25px 0;
}

.container-fluid {
    max-width: 100%;
}

.card-header {
    padding: 1.5rem 3rem;
}

.card-body {
    padding: 1.5rem 3rem;
}

.table-responsive {
    margin: 0 -3rem;
    padding: 0 3rem;
    width: calc(100% + 6rem);
}

.table thead th {
    font-weight: 600;
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize semua modals
    const viewModal = new bootstrap.Modal(document.getElementById('viewConsultationModal'));
    const replyModal = new bootstrap.Modal(document.getElementById('replyConsultationModal'));

    // Handle close buttons for view modal
    document.querySelectorAll('#viewConsultationModal .btn-close, #viewConsultationModal .btn-secondary')
        .forEach(button => {
            button.addEventListener('click', () => {
                viewModal.hide();
            });
        });

    // Handle close buttons for reply modal
    document.querySelectorAll('#replyConsultationModal .btn-close, #replyConsultationModal .btn-secondary')
        .forEach(button => {
            button.addEventListener('click', () => {
                replyModal.hide();
            });
        });

    // Handle Reply button in view modal
    document.querySelector('#viewConsultationModal .btn-reply').addEventListener('click', function() {
        const id = this.dataset.consultationId;
        viewModal.hide();
        replyConsultation(id);
    });

    window.viewConsultation = function(id) {
        fetch(`/konsultasi/detail/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                // Customer info
                document.querySelector('.customer-name').textContent = data.user.name;
                document.querySelector('.customer-email').textContent = data.user.email;
                document.querySelector('.customer-phone').textContent = data.user.phone;

                // Consultation info
                document.querySelector('.consultation-category').textContent = data.kategori;
                document.querySelector('.consultation-device').textContent = data.perangkat;

                // Set urgency with appropriate styling and debugging
                const urgencyElem = document.querySelector('.consultation-urgency');
                const urgencyValue = (data.urgensi || '').toLowerCase().trim();
                console.log('Urgency value:', data.urgensi, 'Normalized:', urgencyValue);

                if (urgencyValue === 'tinggi') {
                    urgencyElem.className = 'consultation-urgency badge bg-danger';
                    urgencyElem.textContent = 'Tinggi';
                } else if (urgencyValue === 'sedang') {
                    urgencyElem.className = 'consultation-urgency badge bg-warning text-dark';
                    urgencyElem.textContent = 'Sedang';
                } else if (urgencyValue === 'rendah') {
                    urgencyElem.className = 'consultation-urgency badge bg-success';
                    urgencyElem.textContent = 'Rendah';
                } else {
                    urgencyElem.className = 'consultation-urgency badge bg-secondary';
                    urgencyElem.textContent = data.urgensi || 'N/A';
                }

                // Set status with appropriate styling
                const statusElem = document.querySelector('.consultation-status');
                statusElem.textContent = ucfirst(data.status);
                statusElem.className = 'consultation-status mb-1 badge ' +
                    (data.status === 'menunggu' ? 'bg-warning' :
                        (data.status === 'diproses' ? 'bg-primary' : 'bg-success'));

                // Problem description
                document.querySelector('.consultation-problem').textContent = data.masalah;

                // Photo handling
                const photoContainer = document.querySelector('.photo-container');
                if (data.foto_base64) {
                    photoContainer.classList.remove('d-none');

                    // Use the base64 data directly
                    const base64ImageData = data.foto_base64;
                    const photoElem = document.querySelector('.consultation-photo');

                    // Set the image source using the base64 data
                    photoElem.src = `${base64ImageData}`;

                    // Also update download link to use the base64 data
                    const downloadLink = document.querySelector('.download-photo');
                    downloadLink.href = `${base64ImageData}`;

                    console.log('Using base64 image data');
                } else {
                    photoContainer.classList.add('d-none');
                    console.log('No photo data available');
                }

                // Response handling
                const responseContainer = document.querySelector('.response-container');
                if (data.jawaban) {
                    responseContainer.classList.remove('d-none');
                    document.querySelector('.consultation-response').textContent = data.jawaban;
                    if (data.jawaban_at) {
                        document.querySelector('.response-timestamp').textContent =
                            `Dijawab pada: ${formatDate(data.jawaban_at)}`;
                    } else {
                        document.querySelector('.response-timestamp').textContent = '';
                    }
                } else {
                    responseContainer.classList.add('d-none');
                }

                // Set consultation ID for the reply button
                document.querySelector('#viewConsultationModal .btn-reply').dataset.consultationId =
                    data.id;

                // Set kategori with appropriate styling
                const categoryElem = document.querySelector('.consultation-category');
                categoryElem.textContent = data.kategori;
                categoryElem.className = 'consultation-category badge bg-primary text-white';

                viewModal.show();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memuat data konsultasi');
            });
    };

    window.replyConsultation = function(id) {
        fetch(`/konsultasi/detail/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                document.querySelector('.consultation-problem-preview').textContent = data.masalah;
                document.getElementById('consultationId').value = id;
                document.getElementById('statusUpdate').value = data.status;
                document.getElementById('replyMessage').value = data.jawaban || '';

                replyModal.show();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memuat data konsultasi');
            });
    };

    document.getElementById('replyForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const id = document.getElementById('consultationId').value;
        const jawaban = document.getElementById('replyMessage').value;
        const status = document.getElementById('statusUpdate').value;

        if (!jawaban.trim()) {
            alert('Jawaban tidak boleh kosong');
            return;
        }

        fetch(`/konsultasi/reply/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    message: jawaban,
                    status: status
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    replyModal.hide();
                    window.location.reload();
                } else {
                    alert(data.message || 'Gagal mengirim jawaban');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim jawaban');
            });
    });

    // Handle clicking outside modal to close
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                bootstrap.Modal.getInstance(this).hide();
            }
        });
    });

    // Helper function to format date
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    // Helper function to capitalize first letter
    function ucfirst(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
});
</script>
@endsection