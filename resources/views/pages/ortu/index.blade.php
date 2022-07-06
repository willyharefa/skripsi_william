@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Data anak saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard Orang tua / wali murid</li>
    </ol>

    <section>
        <div class="row g-0 my-5">
            <div class="col-md-3 col-lg-2 mb-3">
                <img src="http://via.placeholder.com/200/200.jpeg" style="width:100px; height:100px; background-size: cover; object-fit:cover; object-position:center; border-radius:50%" alt="">        
            </div>
            <div class="col text-start">
                <h2>{{ $student->name }}</h2>
                <p class="text-muted">Data diri anak anda</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Data Siswa
            </div>
            <div class="card-body">
                <div class="row g-0 gap-4">
                    <div class="col-lg-6">
                        <h5 class="text-muted">ABSEN HARI INI</h5>
                        <table class="table table-borderless text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Masuk</th>
                                    <th>Pulang</th>
                                    <th>Tanggal Absen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absents as $absent)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absent->subject->name }}</td>
                                    <td>{{ $absent->time_in }}</td>
                                    <td>{{ $absent->time_out }}</td>
                                    <td>{{ $absent->date_absence->format('d F Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>

                <div class="row g-0 mt-5">
                    <div class="table-responsive">
                        <h5 class="text-muted">NILAI SISWA</h5>
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bahasa Indonesia</th>
                                    <th>Bahasa Inggris</th>
                                    <th>Bahasa Daerah</th>
                                    <th>Seni Budaya</th>
                                    <th>PPKN</th>
                                    <th>Matematika</th>
                                    <th>PJOK</th>
                                    <th>IPA</th>
                                    <th>IPS</th>
                                    <th>Pengembangan Diri</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assestments as $assestment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assestment->bindo }}</td>
                                    <td>{{ $assestment->bingg }}</td>
                                    <td>{{ $assestment->bdaer }}</td>
                                    <td>{{ $assestment->sbd }}</td>
                                    <td>{{ $assestment->ppkn }}</td>
                                    <td>{{ $assestment->mtk }}</td>
                                    <td>{{ $assestment->pjok }}</td>
                                    <td>{{ $assestment->ipa }}</td>
                                    <td>{{ $assestment->ips }}</td>
                                    <td>{{ $assestment->pd }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('script')
    <script>

    </script>
@endpush