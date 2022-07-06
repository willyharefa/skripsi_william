@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Data Class</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Absen Kelas</li>
    </ol>

    <section>
        <div class="row g-0 gap-3">
            @foreach ($squads as $squad)
                <button type="butotn" class="btn btn-primary col-lg-3 py-3 btn-absence" data-id-room="{{ $squad->classroom_id }}" data-subject="{{ $squad->subject_id }}">
                    <h2>Kelas {{ $squad->classroom->name }}</h2>
                    <h6>{{ $squad->subject->name }}</h6>
                </button>
            @endforeach
        </div>
    </section>
@endsection
@push('script')
    <script>
        const btnAbsence = document.querySelectorAll(".btn-absence");
        btnAbsence.forEach(btnAbsence => {
            btnAbsence.addEventListener("click", () => {
                const attNameClass = btnAbsence.getAttribute('data-id-room');
                const idSubject = btnAbsence.getAttribute('data-subject');
                location.href = '/absence/'+attNameClass+'/'+idSubject;
            });
        })
    </script>
@endpush