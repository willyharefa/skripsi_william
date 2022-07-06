@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Data Ruangan Siswa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Ruangan Kelas</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#create">
            + Ruangan Siswa
        </button>

        <!-- MODAL CREATE -->
        <form action="{{ route('classgroup.store') }}" method="post">
            @csrf
            <div class="modal fade createRoomStudents" id="create">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Ruangan Siswa<h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="teacher" class="col-form-label">Nama Wali Kelas</label>
                                <select class="form-select single-select" data-placeholder="Pilih nama guru / walikelas" name="teacher_id" required>
                                    <option></option>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="class" class="col-form-label">Kelas</label>
                                <select class="form-select single-select" data-placeholder="Pilih nama mata pelajaran" name="classroom_id" required>
                                    <option></option>
                                    @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Nama Siswa</label>
                                <select class="form-select" id="multiple-select-field" data-placeholder="Pilih nama siswa" name="student_id[]" multiple>
                                    <option></option>
                                    @foreach ($students as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
        <div class="table-reponsive mb-5 border border-1 hadow-sm p-3 rounded-3">
            <table id="dataTables" class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Wali Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classgroups as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->student->name }}</td>
                        <td>{{ $item->classroom->name }}</td>
                        <td>{{ $item->teacher->name }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editClassgroup-{{ $item->id }}">
                                Edit
                            </button>
                            {{-- MODAL EDIT --}}
                            <form action="{{ route("classgroup.update", $item->id) }}" method="post" class="d-inline-block">
                                @method('PUT')
                                @csrf
                                <div class="modal fade" id="editClassgroup-{{ $item->id }}">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Walikelas<h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- STUDENT SELECTED --}}
                                                <div class="mb-3">
                                                    <label for="new_student_id" class="form-label">Nama Siswa</label>
                                                    <select name="new_student_id" id="new_student_id" class="form-select">
                                                        @foreach ($students as $student)
                                                        <option {{ $student->id === $item->student_id ? "selected" : "" }} value="{{ $student->id }}">{{ $student->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- TEACHER SELECTED --}}
                                                <div class="mb-3">
                                                    <label for="new_teacher_id" class="form-label">Nama Wali Kelas</label>
                                                    <select name="new_teacher_id" id="new_teacher_id" class="form-select">
                                                        @foreach ($teachers as $teacher)
                                                        <option {{ $teacher->id === $item->teacher_id ? "selected" : "" }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- CLASS SELECTED --}}
                                                <div class="mb-3">
                                                    <label for="new_classroom_id" class="form-label">Nama Kelas</label>
                                                    <select name="new_classroom_id" id="new_classroom_id" class="form-select">
                                                        @foreach ($classrooms as $classroom)
                                                        <option {{ $classroom->id === $item->classroom_id ? "selected" : "" }} value="{{ $classroom->id }}">{{ $classroom->name }}</option>
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
                            {{-- END --}}
                            <form action="{{ route('classgroup.destroy', $item->id) }}" method="post" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-delete-classgroup" data-name="{{ $item->student->name }}" data-class="{{ $item->classroom->name }}">Hapus</button>
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
        const btnDelete = document.querySelectorAll('.btn-delete-classgroup')
        btnDelete.forEach(btnDelete => {
            btnDelete.addEventListener("click", (e) => {
            e.preventDefault();
            const form = btnDelete.parentElement;
            const attName = btnDelete.getAttribute('data-name');
            const attClassName = btnDelete.getAttribute('data-class');
            Swal.fire({
                title: 'Hapus ?',
                text: 'Anda yakin ingin menghapus '+ attName + ' dari kelas '+ attClassName + '!',
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
        $('.single-select').select2( {
            theme: "bootstrap-5",
            width: '100%',
            dropdownParent: $("#create"),
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            
        });

        $( '#multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: '100%',
            dropdownParent: $("#create"),
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
            tags: true
            
        });
    </script>
@endpush