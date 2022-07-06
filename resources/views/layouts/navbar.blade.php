<nav class="navbar navbar-expand-lg bg-white navbar-light">
    <div class="container-custom navbar-top">
        <a class="navbar-brand fw-bold" href="/">SD IT</a>
            <button class="navbar-toggler" id="btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-md-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ANNOUNCEMENT
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">PENERIMAAN PESERTA DIDIK BARU</a></li>
                        <li><a class="dropdown-item" href="#">KELULUSAN</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">KARIR</a></li>
                    </ul>
                </li>
            </ul>
            @if (Auth::guard('teacher')->check()||Auth::guard('web')->check()||Auth::guard('ortu')->check())
            <a href="{{ route('dashboard.index') }}" class="btn btn-primary d-sm-inline-block d-flex">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary d-sm-inline-block d-flex">LOGIN</a>  
            @endif
        </div>
    </div>
</nav>