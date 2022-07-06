@extends('layouts.homepage')
@section('content')
    <section class="section-registration">
        <div class="container-registration">
            <h4>Form Registrasi</h4>
            <p class="form-text">Silahkan lengkapi data dibawah</p>
            @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $error }}
                </div>
                @endforeach
            @endif

            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="row justify-content-between">
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="off" spellcheck="false" value="{{ request('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="off" spellcheck="false" value="{{ request('address') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telepon / WA </label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="off" spellcheck="false" value="{{ request('phone') }}">
                            <div class="form-text">Pastikan nomor telepon yang anda masukan aktif.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label"><strong>Username</strong></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="off" spellcheck="false" value="{{ request('username') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><strong>Password</strong></label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror password-input" required id="password" name="password">
                                <button class="input-group-text show-pass" id="show-pass">
                                    <i class="fas fa-eye show-on"></i>
                                    <i class="fas fa-eye-slash show-off"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label"><strong>Password Konfirmasi</strong></label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror password-input" required id="password_confirmation" name="password_confirmation">
                                <button class="input-group-text show-pass" id="show-pass">
                                    <i class="fas fa-eye show-on"></i>
                                    <i class="fas fa-eye-slash show-off"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="student" class="form-label">Nama Anak</label>
                        <select class="form-select" id="single-select-field" data-placeholder="Pilih data anak anda" name="student_id" required>
                            <option></option>
                            @foreach ($students as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} | {{ $item->nisn }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Mohon Perhatian!</h4>
                            <p>Pastikan memilih nama anak anda pada menu ini untuk mengaitkan akun anda dengan peserta didik. Jika anda merasa data diri anak anda tidak tersedia, silahkan hubungi pihak administrasi sekolah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <button type="submit" class="btn btn-primary px-3 py-2 mb-3 text-center">Daftar Sekarang</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
                $( '#single-select-field' ).select2( {
                theme: "bootstrap-5",
                width: '100%',
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
            });
        });

        const   btnShowPass = document.querySelectorAll(".show-pass");
                btnShowPass.forEach( (btnShowPass, indexBtn) => {
                    btnShowPass.addEventListener("click", (e) => {
                        e.preventDefault();
                        btnShowPass.classList.toggle("show-eyes");
                        const   inputPass = document.querySelectorAll(".password-input");
                        inputPass.forEach( (inputPass, indexInput) => {
                            if(indexBtn === indexInput) {
                                if(inputPass.type === "password") {
                                    inputPass.type = "text";
                                } else {
                                    inputPass.type = "password";
                                }
                            }
                        });
                    });
                });
    </script>
@endpush