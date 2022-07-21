@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Messenger</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Messenger</li>
    </ol>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mb-3">
            {{ $message }}
        </div>
    @endif

    <form action="{{ route('messenger.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                Kirim Pemberitahuaan
            </div>
            <div class="card-body">
                <div class="form-floating mb-2">
                    <textarea class="form-control" placeholder="Leave a comment here" name="chat" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>
                <label for="exampleDataList" class="form-label">Orangtua Pesan Penerima</label>
                <select class="form-select single-select-field" data-placeholder="Pilih nama guru" name="recipent" required>
                    <option></option>
                    @foreach ($ortus as $ortu)
                    <option value="{{ $ortu->id }}">{{ $ortu->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-4">Kirim Pesan</button>
            </div>
        </div>
    </form>
@endsection
@push('script')
    <script>
        $( '.single-select-field' ).select2( {
            theme: "bootstrap-5",
            width: '100%',
            placeholder: $( this ).data( 'placeholder' ),
            
        });
    </script>
@endpush