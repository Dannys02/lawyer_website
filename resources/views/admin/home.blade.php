@extends('admin.layouts.app')

@section('contents')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Header Sambutan Ringkas & Elegan -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark font-serif-heading">Dashboard Ringkasan</h4>
            <p class="text-muted mb-0 small">Selamat datang kembali di panel administrasi Kantor Hukum Nurul Syafii.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-ns-gold-400-20 text-ns-gold-400 border border-ns-gold-400-30 px-3 py-2">
                <i class="ti ti-calendar me-1"></i> {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
            </span>
        </div>
    </div>

    <!-- 4 Kartu Metrik Utama -->
    <div class="row g-4 mb-4">
        <!-- Metrik Jurnal -->
        <div class="col-xl-3 col-sm-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <span class="text-muted fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Total Jurnal</span>
                        <h3 class="fw-bold text-dark mb-1 mt-1">{{ $jurnals }}</h3>
                        <a href="{{ route('jurnal.index') }}" class="text-ns-gold-400 small text-decoration-none d-inline-flex align-items-center gap-1">
                            <span>Kelola Jurnal</span>
                            <i class="ti ti-chevron-right ti-xs"></i>
                        </a>
                    </div>
                    <div class="avatar avatar-md bg-ns-gold-400-20 rounded-3 d-flex align-items-center justify-content-center text-ns-gold-400 p-3">
                        <i class="ti ti-book fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metrik Artikel Opini -->
        <div class="col-xl-3 col-sm-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <span class="text-muted fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Artikel Opini</span>
                        <h3 class="fw-bold text-dark mb-1 mt-1">{{ $opinies }}</h3>
                        <a href="{{ route('legal_opini.index') }}" class="text-ns-gold-400 small text-decoration-none d-inline-flex align-items-center gap-1">
                            <span>Kelola Artikel</span>
                            <i class="ti ti-chevron-right ti-xs"></i>
                        </a>
                    </div>
                    <div class="avatar avatar-md bg-ns-gold-400-20 rounded-3 d-flex align-items-center justify-content-center text-ns-gold-400 p-3">
                        <i class="ti ti-file-text fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metrik Berita -->
        <div class="col-xl-3 col-sm-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <span class="text-muted fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Total Berita</span>
                        <h3 class="fw-bold text-dark mb-1 mt-1">{{ $news }}</h3>
                        <a href="{{ route('news.index') }}" class="text-ns-gold-400 small text-decoration-none d-inline-flex align-items-center gap-1">
                            <span>Kelola Berita</span>
                            <i class="ti ti-chevron-right ti-xs"></i>
                        </a>
                    </div>
                    <div class="avatar avatar-md bg-ns-gold-400-20 rounded-3 d-flex align-items-center justify-content-center text-ns-gold-400 p-3">
                        <i class="ti ti-news fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metrik Tim / Partner -->
        <div class="col-xl-3 col-sm-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <span class="text-muted fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Advokat &amp; Partner</span>
                        <h3 class="fw-bold text-dark mb-1 mt-1">{{ $patners }}</h3>
                        <a href="{{ route('legal_patnership.index') }}" class="text-ns-gold-400 small text-decoration-none d-inline-flex align-items-center gap-1">
                            <span>Kelola Tim</span>
                            <i class="ti ti-chevron-right ti-xs"></i>
                        </a>
                    </div>
                    <div class="avatar avatar-md bg-ns-gold-400-20 rounded-3 d-flex align-items-center justify-content-center text-ns-gold-400 p-3">
                        <i class="ti ti-briefcase fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Rating dan Ulasan Klien -->
    <div class="card border-0 shadow-sm">
        <div class="card-header d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 py-3 px-4">
            <div>
                <h5 class="card-title text-dark mb-0 font-serif-heading">Rating &amp; Ulasan Klien</h5>
                <small class="text-muted">Masukan dan umpan balik langsung dari pengunjung website</small>
            </div>
            <span class="badge bg-ns-gold-400-20 text-ns-gold-400 border border-ns-gold-400-30 px-3 py-1 text-xs">
                {{ $reviews->count() }} Ulasan Masuk
            </span>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Nama Klien</th>
                        <th>Penilaian (Rating)</th>
                        <th>Pesan / Ulasan</th>
                        <th class="text-center pe-4" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviews as $row)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar avatar-sm rounded-circle bg-ns-gold-400-20 text-ns-gold-400 d-flex align-items-center justify-content-center fw-bold">
                                        {{ strtoupper(substr($row->name, 0, 1)) }}
                                    </div>
                                    <span class="fw-medium text-dark">{{ $row->name }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-inline-flex align-items-center gap-1 text-warning">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star {{ $i <= $row->rating ? 'checked text-ns-gold-400' : 'text-muted' }}" style="font-size: 0.85rem;"></i>
                                    @endfor
                                    <span class="ms-1 small text-muted">({{ $row->rating }}/5)</span>
                                </div>
                            </td>
                            <td class="text-wrap" style="max-width: 380px;">
                                <p class="mb-0 text-muted small lh-base">
                                    {{ $row->message }}
                                </p>
                            </td>
                            <td class="text-center pe-4">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow text-muted" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical fs-5"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end shadow-lg border">
                                        <form action="{{ route('reviews.destroy', $row->id) }}" method="POST" class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0);" class="dropdown-item btn-delete text-danger" data-name="{{ $row->name }}">
                                                <i class="ti ti-trash me-2"></i> Hapus Ulasan
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                                    <i class="ti ti-message-off fs-1 text-muted"></i>
                                    <span class="text-muted">Belum ada ulasan atau penilaian yang masuk</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const form = this.closest('form');
                const name = this.getAttribute('data-name');

                Swal.fire({
                    title: 'Hapus Ulasan?',
                    text: `Ulasan dari "${name}" akan dihapus secara permanen.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e02424',
                    cancelButtonColor: '#475569',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
