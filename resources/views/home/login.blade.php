@extends('layouts.homepage')
@section('content')
    <section class="section-login">
        <div class="container-login">
            @if ($message = session('success'))
            <div class="alert alert-success mb-3" role="alert">
                {{ $message }}
            </div>
            @endif
            @if ($message = session('error'))
            <div class="alert alert-danger mb-3" role="alert">
                {{ $message }}
            </div>
            @endif
            <h4>Form Login</h4>
            <p class="form-text">Silahkan login terlebih dahulu</p>
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required autocomplete="off" spellcheck="false">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="row g-0">
                    <button type="submit" class="btn btn-primary px-3 py-2 mb-3 text-center">Masuk</button>
                </div>
                
                <p class="text-center">Belum punya akun ? Buat <a href="{{ route('create') }}">disini</a></p>
            </form>
        </div>
    </section>
@endsection