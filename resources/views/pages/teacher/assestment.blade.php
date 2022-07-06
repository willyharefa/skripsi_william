@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Assestment Class</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Nilai Kelas</li>
    </ol>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5 py-2" data-bs-toggle="modal" data-bs-target="#createAbsence">
            + Nilai Kelas 
        </button>
        
        <!-- MODAL CREATE -->
        <form action="{{ route('assestment.store') }}" method="post">
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
                                <label for="academic_id" class="form-label fw-bold">Tahun Ajaran | Semester</label>
                                <select id="academic_year_id" name="academic_year_id" class="form-select" required>
                                    <option></option>
                                    @foreach ($academicYears as $item)
                                        <option value="{{ $item->id }}">{{ $item->grade }} | {{ $item->ta }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>B.Indo</th>
                                        <th>B.Ingg</th>
                                        <th>B.Daer</th>
                                        <th>SBD</th>
                                        <th>PPKn</th>
                                        <th>MTK</th>
                                        <th>PJOK</th>
                                        <th>IPA</th>
                                        <th>IPS</th>
                                        <th>PD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classgroups as $classgroup)
                                    <tr>
                                        <td>{{ $classgroup->student->name }}
                                            <input type="hidden" class="form-control" name="student_id[]" value="{{ $classgroup->student_id }}" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="bindo[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="bingg[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="bdaer[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="sbd[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="ppkn[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="mtk[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="pjok[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="ipa[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="ips[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="pd[]" required>
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
            <table class="table text-nowrap" id="dataTables">
                <thead>
                    <tr>
                        <th>Ali</th>
                        <th>B.Indo</th>
                        <th>B.Ingg</th>
                        <th>B.Daer</th>
                        <th>SBD</th>
                        <th>PPKn</th>
                        <th>MTK</th>
                        <th>PJOK</th>
                        <th>IPA</th>
                        <th>IPS</th>
                        <th>PD</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assestments as $item)
                    <tr>
                        <td>{{ $item->student->name }}</td>
                        <td>{{ $item->bindo }}</td>
                        <td>{{ $item->bingg }}</td>
                        <td>{{ $item->bdaer }}</td>
                        <td>{{ $item->sbd }}</td>
                        <td>{{ $item->ppkn }}</td>
                        <td>{{ $item->mtk }}</td>
                        <td>{{ $item->pjok }}</td>
                        <td>{{ $item->ipa }}</td>
                        <td>{{ $item->ips }}</td>
                        <td>{{ $item->pd }}</td>
                        <td>{{ $item->academicYear->grade }}</td>
                        <td>
                            <button class="btn btn-warning">Edit</button>
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