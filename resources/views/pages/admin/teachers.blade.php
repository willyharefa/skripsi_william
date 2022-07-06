@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Teachers List</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Teachers</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#createTeacher">
            + Tambah Data Guru
        </button>

        <!-- MODAL CREATE -->
        <form action="{{ route('teacher.store') }}" method="post">
            @csrf
            <div class="modal fade" id="createTeacher" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Guru Baru<h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="nameStudent" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameStudent" name="name" value="{{ old('name') }}" title="Nama lengkap guru" required autocomplete="off" spellcheck="false">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="birthday" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" required value="{{ old('birthday') }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label">No. WA / Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}" autocomplete="off" spellcheck="false">
                                    <div class="form-text">No telepon minimal 7 karakter</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address') }}" autocomplete="off" spellcheck="false">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nuptk" class="col-sm-3 col-form-label">NUPTK Baru</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nuptk') is-invalid @enderror" id="nuptk" name="nuptk" required autocomplete="off" spellcheck="false" value="{{ old('nuptk') }}">
                                    <div class="form-text">NUPTK minimal 16 karakter</div>
                                </div>
                            </div>
                            <div class="my-3 row">
                                <label for="username" class="col-sm-3 col-form-label fw-bold">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autocomplete="off" spellcheck="false" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label fw-bold">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="off" spellcheck="false" value="{{ old('password') }}">
                                    <div class="form-text">Password minimal 6 karakter</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password_confirmation" class="col-sm-3 col-form-label fw-bold">Password Konfirmasi</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required autocomplete="off" spellcheck="false" value="{{ old('password_confirmation') }}">
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

        {{-- ERRORS MESSAGE --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger my-2" role="alert">
                {{ $error }}
            </div>
            @endforeach
        @endif
        {{-- END ERRORS MESSAGE --}}

        @if ($message = Session::get('success'))
        <div class="alert alert-success my-2" role="alert">
            {{ $message }}
        </div>
        @endif
        {{-- Table List Teachers --}}
        <div class="table-reponsive mb-5">
            <table id="dataTables" class="table align-middle text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col">NUPTK</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $key => $teacher)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->birthday->format('d F Y') }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td>{{ $teacher->nuptk }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTeacher-{{ $teacher->id }}">
                                    Edit
                                </button>
                                {{-- MODAL EDIT --}}
                                <form action="{{ route('teacher.update', $teacher->id) }}" method="post" class="d-inline-block">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal fade" id="editTeacher-{{ $teacher->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru<h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 row">
                                                        <label for="nameStudent" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nameStudent" name="new_name" title="Nama lengkap siswa" required value="{{ $teacher->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="birthday" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" id="birthday" name="new_birthday" required value="{{ $teacher->birthday->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="nuptk" class="col-sm-3 col-form-label">NUPTK</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nuptk" name="new_nuptk" required autocomplete="off" spellcheck="false" value="{{ $teacher->nuptk }}">
                                                            <div class="form-text">NUPTK minimal 16 karakter</div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="new_user" class="col-sm-3 col-form-label fw-bold">Username</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="new_user" name="new_user" required autocomplete="off" spellcheck="false" value="{{ $teacher->username }}">
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
                                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post" class="d-inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-delete-teacher" data-id="{{ $teacher->id }}" data-name="{{ $teacher->name }}">Hapus</button>
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
        const btnDelete = document.querySelectorAll('.btn-delete-teacher')
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
                    Swal.fire('Data berhasil dihapus!', 'success')
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