@extends('admin.layouts.app')

@section('contents')
    <!-- Bootstrap Table with Header - Footer -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-header">Jurnals</h5>
                <button type="button" class="btn btn-primary me-6" data-bs-toggle="modal" data-bs-target="#tambahJurnal">
                    Tambah Jurnal
                </button>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>File</th>
                            <th>Sampul</th>
                            <th>Deskripsi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jurnals as $row)
                            <tr>
                                <td>
                                    {{ $row->title }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $row->thumbnail) }}" alt="Gambar {{ $row->name }}"
                                        class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>
                                    <a href="{{ asset('storage/' . $row->pdf_file) }}" class="btn btn-primary"
                                        target="_blank">Lihat File</a>
                                </td>
                                <td>
                                    {{ Str::limit($row->description, 200) }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#editArtikel{{ $row->id }}"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>


                                            <form action="{{ route('jurnal.destroy', $row->id) }}" method="POST"
                                                class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0);" class="dropdown-item btn-delete"
                                                    data-name="{{ $row->title }}">
                                                    <i class="ti ti-trash me-1"></i> Delete
                                                </a>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada Jurnal yang tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap Table with Header - Footer -->

    <!-- Tambah Artikel Modal -->
    <div class="modal fade" id="tambahJurnal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Tambah Jurnal</h4>
                    </div>
                    <form class="row g-6" method="POST" action="{{ route('jurnal.store') }}" enctype="multipart/form-data"
                        id="formJurnal" onsubmit="document.getElementById('loading-screen').style.display = 'flex';">
                        @csrf
                        <!-- Judul -->
                        <div class="col-12">
                            <label class="form-label" for="title">Judul</label>
                            <input type="text" id="title" name="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" />
                            @error('title')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Sampul -->
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="thumbnail">Sampul</label>
                            <input type="file" id="thumbnail" name="thumbnail"
                                class="form-control @error('thumbnail') is-invalid @enderror" />
                            @error('thumbnail')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- File PDF -->
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="pdf_file">File PDF</label>
                            <input type="file" id="pdf_file" name="pdf_file"
                                class="form-control @error('pdf_file') is-invalid @enderror" />
                            @error('pdf_file')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-12">
                            <label class="form-label" for="description">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary me-3">Submit</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @foreach ($jurnals as $data)
        <!-- Edit Artikel Modal -->
        <div class="modal fade" id="editArtikel{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <h4 class="mb-2">Edit Jurnal</h4>
                        </div>
                        <form class="row g-6" method="POST" action="{{ route('jurnal.update', $data->id) }}"
                            enctype="multipart/form-data" id="formJurnal"
                            onsubmit="document.getElementById('loading-screen').style.display = 'flex';">
                            @method('PUT')
                            @csrf
                            <!-- Judul -->
                            <div class="col-12">
                                <label class="form-label" for="title">Judul</label>
                                <input type="text" id="title" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $data->title) }}" />
                                @error('title')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Sampul -->
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="thumbnail">Sampul</label> <br>
                                <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="Gambar {{ $data->title }}"
                                    class="img-fluid mb-2" style="max-width: 100px; max-height: 100px;">
                                <input type="file" id="thumbnail" name="thumbnail"
                                    class="form-control @error('thumbnail') is-invalid @enderror" />
                                @error('thumbnail')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- File PDF -->
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="pdf_file">File PDF</label> <br>
                                <a href="{{ asset('storage/' . $data->pdf_file) }}" class="btn btn-primary mb-2"
                                    target="_blank">Lihat File</a>
                                <input type="file" id="pdf_file" name="pdf_file"
                                    class="form-control @error('pdf_file') is-invalid @enderror" />
                                @error('pdf_file')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-12">
                                <label class="form-label" for="description">Deskripsi</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $data->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol Submit -->
                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary me-3">Submit</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
                        title: 'Apakah kamu yakin?',
                        text: `Data "${name}" akan dihapus permanen!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
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
