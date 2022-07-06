@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Assestment Class</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active">Tahun Ajaran</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5 py-2" data-bs-toggle="modal" data-bs-target="#createAcademicYears">
            + Tahun Ajaran 
        </button>
        
        <!-- MODAL CREATE -->
        <form action="{{ route('academic.store') }}" method="post">
            @csrf
            <div class="modal fade" id="createAcademicYears" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data TA<h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Semester</label>
                                <input type="text" class="form-control" name="grade" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">TA</label>
                                <input type="text" class="form-control" name="ta" placeholder="2022/2023" required>
                                <div class="form-text">Isikan data tahun ajaran dari awal dan akhir tiap semester.</div>
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


        @if ($message = Session::get("success"))
        <div class="alert alert-success my-2" role="alert">
            {{ $message }}
        </div>
        @endif

        {{-- TABLE LIST ABSENCE --}}
        <div class="table-reponsive mb-5">
            <table class="table text-nowrap" id="dataTables">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Semester</th>
                        <th>TA</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($academicYears as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->grade }}</td>
                        <td>{{ $item->ta }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAcademicYears-{{ $item->id }}">
                                Edit 
                            </button>
                            
                            <!-- MODAL EDIT -->
                            <form action="{{ route('academic.update', $item->id) }}" method="post" class="d-inline-block">
                                @method('PUT')
                                @csrf
                                <div class="modal fade" id="editAcademicYears-{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data TA<h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="new_grade" class="form-label">Semester</label>
                                                    <input type="text" class="form-control" name="new_grade" id="new_grade" value="{{ $item->grade }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_ta" class="form-label">TA</label>
                                                    <input type="text" class="form-control" name="new_ta" id="new_ta" placeholder="2022/2023" value="{{ $item->ta }}" required>
                                                    <div class="form-text">Isikan data tahun ajaran dari awal dan akhir tiap semester.</div>
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
                            <form action="{{ route('academic.destroy', $item->id) }}" method="post" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-delete-ta">Hapus</button>
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
        const btnDeleteTa = document.querySelector('.btn-delete-ta');
            btnDeleteTa.addEventListener("click", (e) => {
                e.preventDefault();
                const form = btnDeleteTa.parentElement;
                Swal.fire({
                    title: 'Hapus?',
                    text: 'Anda yakin ingin ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((willDelete) => {
                    if(willDelete.isConfirmed) {
                        Swal.fire({
                            title: 'Hore',
                            text: 'Data anda berhasil dihapus',
                            icon: 'success',
                            showConfirmButton: false,
                        });
                        setInterval(() => {
                            form.submit();
                        }, 1300);
                    }
                });
            });
    </script>
@endpush