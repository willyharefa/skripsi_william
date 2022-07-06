@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Students List</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Students</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#createStudent">
            + Tambah Siswa Baru
        </button>
        
        <!-- MODAL CREATE -->
        <form action="{{ route('student.store') }}" method="post">
            @csrf
            <div class="modal fade" id="createStudent" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Siswa Baru<h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="nameStudent" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameStudent" name="name" value="{{ old('name') }}" title="Nama lengkap siswa" required autocomplete="off" spellcheck="false">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="birthday" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" required value="{{ old('birthday') }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                        <option selected disabled>Pilih jenis kelamin</option>
                                        <option value="Pria" {{ old('gender') === "Pria" ? "selected" : "" }}>Pria</option>
                                        <option value="Perempuan" {{ old('gender') === "Perempuan" ? "selected" : "" }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nisn" class="col-sm-3 col-form-label">NISN Baru</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" required autocomplete="off" spellcheck="false" value="{{ old('nisn') }}">
                                    <div id="emailHelp" class="form-text">NISN minimal 10 karakter</div>
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

        @if ($message = Session::get('success'))
        <div class="row g-0">
            <div class="alert alert-success my-2" role="alert">
                {{ $message }}
            </div>
        </div>
        @endif
            
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger my-2" role="alert">
                {{ $error }}
            </div>
            @endforeach
        @endif

        {{-- Table List Student --}}
        <div class="table-reponsive mb-5">
            <table id="dataTables" class="table align-middle text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->birthday->format('d F Y') }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->nisn }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editStudent-{{ $student->id }}">
                                    Edit
                                </button>
                                {{-- MODAL EDIT --}}
                                <form action="{{ route('student.update', $student->id) }}" method="post" class="d-inline-block">
                                    @method('put')
                                    @csrf
                                    <div class="modal fade" id="editStudent-{{ $student->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa<h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 row">
                                                        <label for="nameStudent" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nameStudent" name="new_name" title="Nama lengkap siswa" required value="{{ $student->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="birthday" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" id="birthday" name="new_birthday" required value="{{ $student->birthday->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-9">
                                                            <select name="new_gender" id="gender" class="form-select" required>
                                                                <option {{ $student->gender === "Pria" ? "selected" : "" }} value="Pria">Pria</option>
                                                                <option {{ $student->gender === "Perempuan" ? "selected" : "" }} value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="nisn" class="col-sm-3 col-form-label">NISN Baru</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nisn" name="new_nisn" required autocomplete="off" spellcheck="false" value="{{ $student->nisn }}">
                                                            <div id="emailHelp" class="form-text">NISN minimal 10 karakter</div>
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
                                <form action="{{ route('student.destroy', $student->id) }}" method="post" class="d-inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-delete-student" data-id="{{ $student->id }}" data-name="{{ $student->name }}">Hapus</button>
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
        const btnDelete = document.querySelectorAll('.btn-delete-student')
        btnDelete.forEach(btnDelete => {
            btnDelete.addEventListener("click", (e) => {
                const form = btnDelete.parentElement;
            e.preventDefault();
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