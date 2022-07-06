@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">List Classrooms</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Kelas</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#createClassroom">
            + Data Kelas
        </button>

        <!-- MODAL CREATE -->
        <form action="{{ route('classroom.store') }}" method="post">
            @csrf
            <div class="modal fade" id="createClassroom" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Kelas<h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="col-form-label">Nama Kelas</label>
                                <input type="text" class="form-control" name="name" id="name" required autocomplete="off" spellcheck="false">
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

        {{-- SUCCESS MESSAGE --}}
        @if ($message = Session::get('success'))
        <div class="alert alert-success my-2" role="alert">
            {{ $message }}
        </div>
        @endif
        {{-- END SUCCESS MESSAGE --}}

        
        {{-- Table List Room --}}
        <div class="table-reponsive mb-5 border border-1 hadow-sm p-3 rounded-3">
            <table id="dataTables" class="table align-middle ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classrooms as $key => $room)
                    <tr>
                        <td>{{ $classrooms = ($key + 1) }}</td>
                        <td>{{ $room->name }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editClassroom-{{ $room->id }}">
                                Edit
                            </button>

                            <!-- MODAL EDIT -->
                            <form action="{{ route('classroom.update', $room->id) }}" method="post" class="d-inline-block">
                                @method('PUT')
                                @csrf
                                <div class="modal fade" id="editClassroom-{{ $room->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Kelas<h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="new_name" class="col-form-label">Nama Kelas</label>
                                                    <input type="text" class="form-control" name="new_name" id="new_name" value="{{ $room->name }}" required autocomplete="off" spellcheck="false">
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
                            <form action="{{ route('classroom.destroy', $room->id) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-delete-classroom" data-name="{{ $room->name }}">Hapus</button>
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
        const btnDelete = document.querySelectorAll('.btn-delete-classroom')
        btnDelete.forEach(btnDelete => {
            btnDelete.addEventListener("click", (e) => {
            e.preventDefault();
            const form = btnDelete.parentElement;
            const attName = btnDelete.getAttribute('data-name');
            Swal.fire({
                title: 'Hapus?',
                text: 'Anda yakin menghapus data kelas '+ attName + ' ini?',
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