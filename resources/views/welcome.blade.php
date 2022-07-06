@extends('layouts.homepage')
@section('content')
    <section class="headline-banner">
        <div class="glide">
            <div class="text-headline">
                <h1 class="display-3 fw-bold"><span class="fw-light">WELCOME TO</span> <br>SD IT NURUSALAM PEKANBARU</h1>
            </div>
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides overlay-wrapper">
                    <div class="glide__slide"><img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80" ></div>
                    <div class="glide__slide"><img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1832&q=80" ></div>
                    <div class="glide__slide"><img src="https://images.unsplash.com/photo-1604134967494-8a9ed3adea0d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1548&q=80" ></div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="about">
        <div class="container-custom">
            <div class="row g-0 gap-4">
                <div class="title-row my-5">
                    <h2 class="mb-0 text-muted">TENTANG KAMI</h2>
                    <h2 class="display-5">SD IT NURUSALAM PEKANBARU</h2>
                </div>
                <div class="col-md-5 col-sm-12">
                    <img src="{{ asset('/img/school_1.jpeg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-5 col-sm-12">
                    <p style="font-size: 18px">
                        Sekolah Kami merupakan sekolah negeri yang memfasilitas kegiatan belajar mengajar bagi peserta didik berlokasi di daerah Pekanbaru. Sekolah Kami menyediakan pendidikan jenjang SD dan peserta didik terdaftar sekitar 120 murid, tidak termasuk alumni yang sudah lulus. 
                        <br> <br>
                        Sekolah Kami menyediakan semua perlengkapan belajar dan kebutuhan pendukung seperti ruangan olahraga, mushola dan makanan saat jam sekolah. Sebelumnya, lokasi yang kami tempati sekarang berada di Jln. Sudirman - Pekanbaru. 
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="head-of-school">
        <div class="bg-overlay">
            <div class="container-custom">
                <div class="row g-0 gap-3">
                    <h2 class="text-center">KEPALA SEKOLAH</h2>
                    <img src="https://images.pexels.com/photos/1832326/pexels-photo-1832326.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="img-profile" alt="">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>Tindakan menyalahkan hanya akan membuang waktu. Sebesar apapun kesalahan yang Anda timpakan ke orang lain, dan sebesar apapun Anda menyalahkannya, hal tersebut tidak akan mengubah Anda</p>
                        </blockquote>
                            <figcaption class="blockquote-footer mt-3">
                            EVI RAHAYU <cite title="Source Title">Kepala Sekolah SD IT Nurusalam Pekanbaru</cite>
                            </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="facilities">
        <div class="container-custom">
            <div class="row gap-5 g-0 row-facilities">
                <div class="col col-md-5 col-sm-12">
                    <i class="fas fa-university icon"></i>
                    <div class="detail">
                        <h1 class="display-2 mb-0"><strong>16</strong></h1>
                        <p>JUMLAH RUANGAN</p>
                    </div>
                </div>
                <div class="col col-md-5 col-sm-12">
                    <i class="fas fa-users icon"></i>
                    <div class="detail">
                        <h1 class="display-2 mb-0"><strong>4500</strong></h1>
                        <p>JUMLAH SISWA</p>
                    </div>
                </div>
                <div class="col col-md-5 col-sm-12">
                    <i class="fas fa-user-tie icon"></i>
                    <div class="detail">
                        <h1 class="display-2 mb-0"><strong>34</strong></h1>
                        <p>JUMLAH PENGAJAR</p>
                    </div>
                </div>
                <div class="col col-md-5 col-sm-12">
                    <i class="fas fa-award icon"></i>
                    <div class="detail">
                        <h1 class="display-2 mb-0"><strong>B</strong></h1>
                        <p>AKREDITAS SEKOLAH</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection