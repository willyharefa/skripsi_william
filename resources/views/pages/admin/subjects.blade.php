@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Subjects List</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Subjects</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#createTeacher">
            + Tambah Mata Pelajaran
        </button>

        <!-- MODAL CREATE -->
        <form action="{{ route('subject.store') }}" method="post">
            @csrf
            <div class="modal fade" id="createTeacher" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Mata Pelajaran Baru<h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" title="Nama mata pelajaran" required autocomplete="off" spellcheck="false">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- MESSAGE SUCCESS --}}
        @if ($message = Session::get('success'))
        <div class="alert alert-success my-2" role="alert">
            {{ $message }}
        </div>
        @endif
        {{-- END MESSAGE SUCCESS --}}

        {{-- Table List Subjects --}}
        <div class="table-reponsive mb-5">
            <table id="dataTables" class="table align-middle text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $key => $subject)
                        <tr>
                            <th scope="row">{{ $subjects = ($key + 1) }}</th>
                            <td>{{ $subject->name }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSubject-{{ $subject->id }}">
                                    Edit
                                </button>
                                {{-- MODAL EDIT --}}
                                <form action="{{ route('subject.update', $subject->id) }}" method="post" class="d-inline-block">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal fade" id="editSubject-{{ $subject->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Mata Pelajaran<h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 row">
                                                        <label for="new_name" class="col-sm-3 col-form-label">Nama Mata Pelajarn</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="new_name" name="new_name" title="Mata Pelajaran" required value="{{ $subject->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- END MODAL EDIT --}}
                                <form action="{{ route('subject.destroy', $subject->id) }}" method="post" class="d-inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-delete-subject" data-id="{{ $subject->id }}" data-name="{{ $subject->name }}">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
@push('script')
    <script>
        const btnDelete = document.querySelectorAll('.btn-delete-subject')
        btnDelete.forEach(btnDelete => {
            btnDelete.addEventListener("click", (e) => {
            e.preventDefault();
            const form = btnDelete.parentElement;
            const attName = btnDelete.getAttribute('data-name');
            const attId = btnDelete.getAttribute('data-id');
            Swal.fire({
                title: 'Yakin hapus data ini?',
                text: 'Data '+ attName + ' akan dihapus dari database!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((willDelete) => {
                if(willDelete.isConfirmed) {
                    Swal.fire('Data berhasil dihapus!', '', 'success')
                    setInterval(() => {
                        form.submit();
                    }, 1100);
                } else {
                    Swal.fire('Data batal dihapus!', '', 'info')
                }
                });
            })
        })
    </script>
@endpush