<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title }}</title>
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/messenger.css') }}" rel="stylesheet" />
        {{-- CSS Select2 Bootstrap --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        {{-- END --}}
        <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('dashboard.index') }}">SD IT</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('index') }}">Home</a></li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn dropdown-item btn-logout">Logout</button>
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('dashboard.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            {{-- MENU KHUSUS ADMIN --}}
                            
                            @if (Auth::guard('web')->check())
                            <div class="sb-sidenav-menu-heading">MENU ADMIN</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#menuAdmin" aria-expanded="false" aria-controls="menuAdmin">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="menuAdmin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('student.index') }}">Siswa</a>
                                    <a class="nav-link" href="{{ route('teacher.index') }}">Guru</a>
                                    <a class="nav-link" href="{{ route('subject.index') }}">Mata Pelajaran</a>
                                    <a class="nav-link" href="{{ route('classroom.index') }}">Kelas</a>
                                    <a class="nav-link" href="{{ route('academic.index') }}">TA</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#room" aria-expanded="false" aria-controls="room">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house-user"></i></div>
                                Ruangan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="room" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('room.index') }}">Pengajar</a>
                                    <a class="nav-link" href="{{ route('classgroup.index') }}">Siswa</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Messenger</div>
                            <a class="nav-link" href="{{ route('messenger.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                                Send Messenger
                            </a>
                            {{-- END MENU ADMIN --}}
                            @endif

                            {{-- MENU KHUSUS GURU --}}
                            @if (Auth::guard('teacher')->check())
                            <div class="sb-sidenav-menu-heading">MENU GURU</div>
                            <a class="nav-link" href="{{ route('absence.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Absen Kelas
                            </a>
                            <a class="nav-link" href="{{ route('teacher.assestment') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Nilai Siswa
                            </a>
                            @endif
                            {{-- END --}}

                            {{-- MENU KHUSUS ORTU --}}
                            @if (Auth::guard('ortu')->check())
                            <a class="nav-link" href="{{ route('ortu.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Anak
                            </a>
                            <a class="nav-link" href="{{ route('ortu.message') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                                Informasi
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Login sebagai:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SD IT Nurusalam Pekanbaru 2022</div>
                            <div>
                                <a href="#">Kebijakan Pribadi</a>
                                &middot;
                                <a href="#">Syarat &amp; Ketentuan</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- PLUGIN SELECT2 SEARCH --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        {{-- END --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/scripts.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables').DataTable({
                    "language":
                        {
                            "lengthMenu": "Tampilkan _MENU_ data",
                            "zeroRecords": "Data tidak tersedia.",
                            "info": "Halaman _PAGE_ dari _PAGES_",
                            "infoEmpty": "Data kosong",
                            "infoFiltered": "(Filter dari _MAX_ Total data)"
                        },
                    lengthMenu: [
                        [7, 12, 25, 50, 100, -1],
                        [7, 12, 25, 50, 100,'All'],
                    ],
                });
            });
            const btnLogout = document.querySelector('.btn-logout');
            btnLogout.addEventListener("click", (e) => {
                e.preventDefault();
                const form = btnLogout.parentElement;
                Swal.fire({
                    title: 'Logout?',
                    text: 'Anda yakin ingin ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((willLogOut) => {
                    if(willLogOut.isConfirmed) {
                        Swal.fire({
                            title: 'Berhasil Logout',
                            text: 'Jangan lupa mampir lagi yah :) hehehe',
                            icon: 'success',
                        });
                        setInterval(() => {
                            form.submit();
                        }, 1300);
                    }
                });
            });
        </script>
        {{-- My Script --}}
        @stack('script')
    </body>
</html>
