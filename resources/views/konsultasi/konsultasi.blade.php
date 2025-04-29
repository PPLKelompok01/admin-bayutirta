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
                                <div class="d-flex gap-2">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-filter mr-1"></i>
                                            {{ $selectedStatus }}
                                        </button>
                                        <ul class="dropdown-menu shadow-sm" aria-labelledby="filterDropdown">
                                            <li><a class="dropdown-item {{ $selectedStatus == 'Semua' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'Semua']) }}">Semua</a>
                                            </li>
                                            <li><a class="dropdown-item {{ $selectedStatus == 'Belum Dibalas' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'Belum Dibalas']) }}">Belum
                                                    Dibalas</a></li>
                                            <li><a class="dropdown-item {{ $selectedStatus == 'Sudah Dibalas' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'Sudah Dibalas']) }}">Sudah
                                                    Dibalas</a></li>
                                        </ul>
                                    </div>
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
                                            <th>Tanggal</th>
                                            <th>Pelanggan</th>
                                            <th>Kategori</th>
                                            <th>Subjek</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($konsultasi as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item['tanggal'])->format('d M Y') }}</td>
                                            <td>{{ $item['pelanggan'] }}</td>
                                            <td>
                                                <span class="badge bg-{{ 
                                                        $item['kategori'] === 'Hardware' ? 'danger' : 
                                                        ($item['kategori'] === 'Software' ? 'success' : 
                                                        ($item['kategori'] === 'Jaringan' ? 'info' : 'secondary'))
                                                    }} text-white">
                                                    {{ $item['kategori'] }}
                                                </span>
                                            </td>
                                            <td>{{ $item['subjek'] }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item['status'] === 'Sudah Dibalas' ? 'bg-success' : 'bg-warning' }}">
                                                    {{ $item['status'] }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info me-1"
                                                    onclick="viewConsultation({{ $item['id'] }})">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                @if($item['status'] !== 'Sudah Dibalas')
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="replyConsultation({{ $item['id'] }})">
                                                    <i class="fas fa-reply"></i>
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    <div class="consultation-details">
                        <div class="mb-3">
                            <label class="text-muted">Pelanggan</label>
                            <p class="consultation-customer mb-1"></p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted">Kategori</label>
                            <p class="consultation-category mb-1"></p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted">Subjek</label>
                            <p class="consultation-subject mb-1"></p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted">Pesan</label>
                            <p class="consultation-message mb-1"></p>
                        </div>
                        <div class="previous-reply mb-3 d-none">
                            <label class="text-muted">Balasan Sebelumnya</label>
                            <p class="consultation-reply mb-1"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                    <div class="consultation-info mb-4">
                        <h6 class="border-bottom pb-2">Informasi Konsultasi</h6>
                        <p class="consultation-message-preview mb-0"></p>
                    </div>
                    <form id="replyForm">
                        <input type="hidden" id="consultationId">
                        <div class="mb-3">
                            <label for="replyMessage" class="form-label">Pesan Balasan</label>
                            <textarea class="form-control" id="replyMessage" rows="5" required></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.dropdown-item.active {
    background-color: #e9ecef;
    color: #000;
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

    window.viewConsultation = function(id) {
        fetch(`/konsultasi/detail/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                document.querySelector('.consultation-customer').textContent = data.pelanggan;
                document.querySelector('.consultation-category').textContent = data.kategori;
                document.querySelector('.consultation-subject').textContent = data.subjek;
                document.querySelector('.consultation-message').textContent = data.pesan;

                const previousReplyDiv = document.querySelector('.previous-reply');
                if (data.status === 'Sudah Dibalas' && data.balasan) {
                    previousReplyDiv.classList.remove('d-none');
                    document.querySelector('.consultation-reply').textContent = data.balasan;
                } else {
                    previousReplyDiv.classList.add('d-none');
                }

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
                document.querySelector('.consultation-message-preview').textContent = data.pesan;
                document.getElementById('consultationId').value = id;
                document.getElementById('replyMessage').value = '';

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
        const message = document.getElementById('replyMessage').value;

        if (!message.trim()) {
            alert('Pesan balasan tidak boleh kosong');
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
                    message
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    replyModal.hide();
                    window.location.reload();
                } else {
                    alert('Gagal mengirim balasan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim balasan');
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
});
</script>
@endsection