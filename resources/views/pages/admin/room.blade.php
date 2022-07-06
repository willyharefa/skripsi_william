@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Room Teachers</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengajar</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#createRoom">
            + Ruangan Pengajar
        </button>

        <!-- MODAL CREATE -->
        <form action="{{ route('room.store') }}" method="post">
            @csrf
            <div class="modal fade" id="createRoom">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Ruangan Pangajar<h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="teacher" class="col-form-label">Nama Guru</label>
                                <select class="form-select single-select-field" data-placeholder="Pilih nama guru" name="teacher_id" required>
                                    <option></option>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="col-form-label">Mata Pelajaran</label>
                                <select class="form-select single-select-field" data-placeholder="Pilih nama mata pelajaran" name="subject_id" required>
                                    <option></option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="class" class="col-form-label">Kelas</label>
                                <select class="form-select single-select-field" data-placeholder="Pilih nama mata pelajaran" name="classroom_id" required>
                                    <option></option>
                                    @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
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
        {{-- Table List Room --}}
        <div class="row g-0 gap-4">
            <div class="col-lg-7">
                <div class="table-reponsive mb-5 border border-1 hadow-sm p-3 rounded-3">
                    <table id="dataTables" class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Di Kelas</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($squads as $squad)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $squad->teacher->name }}</td>
                                <td>{{ $squad->classroom->name }}</td>
                                <td>{{ $squad->subject->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editRoom-{{ $squad->id }}">
                                        Edit
                                    </button>
                                    {{-- MODAL EDIT --}}
                                    <form action="{{ route("room.update", $squad->id) }}" method="post" class="d-inline-block">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade editRoom" id="editRoom-{{ $squad->id }}">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Rombangan Belajar<h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3 row">
                                                            <label for="new_teacher_id" class="col-sm-3 col-form-label">Guru Pengajar</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-select" data-placeholder="Pilih nama guru" name="new_teacher_id" required>
                                                                    @foreach ($teachers as $teacher)
                                                                    <option {{ $teacher->id === $squad->teacher_id ? "selected" : "" }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Kelas Pengajar</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-select" data-placeholder="Pilih nama kelas" name="new_classroom_id" required>
                                                                    @foreach ($classrooms as $class)
                                                                    <option {{ $class->id === $squad->classroom_id ? "selected" : "" }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-select" data-placeholder="Pilih nama mata pelajaran" name="new_subject_id" required>
                                                                    @foreach ($subjects as $subject)
                                                                    <option {{ $subject->id === $squad->subject_id ? "selected" : "" }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                    @endforeach
                                                                </select>
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
                                    {{-- BTN DELETE --}}
                                    <form action="{{ route('room.destroy', $squad->id) }}" method="post" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-delete-squad">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Perhatian!</h4>
                    <p>Input data ruangan pengajar dengan seksama karena data ini akan berpengaruh pada proses pengajar maupun wali kelas dalam menginput absensi dan nilai tiap kelas.</p>
                    <hr>
                    <p class="mb-0">Pastikan anda memilih tiap guru pengajar dan kelasnya disertai mata pelajaran yang diajarkan.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        const btnDelete = document.querySelectorAll('.btn-delete-squad');
        btnDelete.forEach(btnDelete => {
            btnDelete.addEventListener("click", (e) => {
            e.preventDefault();
            const form = btnDelete.parentElement;
            Swal.fire({
                title: 'Hapus ?',
                text: 'Anda yakin ingin menghapus data ini ? ',
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
        $( '.single-select-field' ).select2( {
            theme: "bootstrap-5",
            width: '100%',
            dropdownParent: $("#createRoom"),
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            
        });
    </script>
@endpush