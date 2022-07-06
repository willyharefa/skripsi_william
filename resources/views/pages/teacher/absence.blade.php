@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Absence Class</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('absence.index') }}">Kelas</a></li>
        <li class="breadcrumb-item active">Absen Kelas</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        @if ($attendances->isEmpty())
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#createAbsence">
            + Absen Sekarang
        </button>
        @endif
        
        <!-- MODAL CREATE -->
        <form action="{{ route('absence.store') }}" method="post">
            @csrf
            <div class="modal fade" id="createAbsence" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Kelas<h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="col-form-label">Mata Pelajaran</label>
                                <input type="text" class="form-control" readonly disabled value="{{ $subjects->name }}">
                                <input type="hidden" readonly value="{{ $subjects->id }}" name="subject_id">
                            </div>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Tanggal Absen</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Pulang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- DISINI MASIH BELUM DITAMBAHKAN ID GURU [SIAPA YANG ABSEN] --}}
                                    @foreach ($classgroup as $class)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::now()->format('d F Y') }}
                                            <input type="hidden" name="date_absence[]" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">    
                                        </td>
                                        <td>{{ $class->student->name }}
                                            <input type="hidden" name="student_id[]" value="{{ $class->student_id }}">
                                        </td>
                                        <td>{{ $class->classroom->name }}
                                            <input type="hidden" name="classroom_id[]" value="{{ $class->classroom_id }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="time_in[]" required autocomplete="off" spellcheck="false" placeholder="H=Hadir, S=Sakit, I=Izin, A=Alpha">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="time_out[]" required autocomplete="off" spellcheck="false" placeholder="H=Hadir, S=Sakit, I=Izin, A=Alpha">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            <table id="dataTables" class="table align-middle text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jam Masuk</th>
                        <th scope="col">Jam Pulang</th>
                        <th scope="col">Tanggal Absen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->student->name }}</td>
                        <td>{{ $item->classroom->name }}</td>
                        <td>{{ $item->time_in }}</td>
                        <td>{{ $item->time_out }}</td>
                        <td>{{ $item->date_absence->format('d F Y') }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAbsence-{{ $item->id }}">
                                Edit
                            </button>
                            
                            <!-- MODAL EDIT -->
                            <form action="{{ route('absence.update', $item->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="modal fade" id="editAbsence-{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Data Absen Siswa<h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name_student">Nama Siswa</label>
                                                    <input type="text" disabled readonly class="form-control" value="{{ $item->student->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_time_in">Jam Masuk</label>
                                                    <input type="text" class="form-control" value="{{ $item->time_in }}" name="new_time_in" required autocomplete="off" spellcheck="false">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_time_out">Jam Pulang</label>
                                                    <input type="text" class="form-control" value="{{ $item->time_out }}" name="new_time_out" required autocomplete="off" spellcheck="false">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_date_absence">Tanggal Absen</label>
                                                    <input type="date" class="form-control" value="{{ $item->date_absence->format('Y-m-d') }}" name="new_date_absence" required>
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
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

@endsection
@push('script')
@endpush