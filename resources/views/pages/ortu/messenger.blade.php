@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Messenger</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Messenger</li>
    </ol>


    <div class="card col-md-7 col-sm-12">
        <h5 class="card-header">Pemberitahuan</h5>
        <div class="card-body">
            @foreach ($messages as $item)
            <div class="mb-3 chats">
                <img src="{{ asset('/img/avatar-sender.png') }}" alt="">
                <div class="time-send">
                    <p>{{ $item->chat }}</p>
                    <label class="form-label">{{ $item->created_at->diffForHumans() }}</label>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection