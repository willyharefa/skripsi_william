<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS Select2 Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    {{-- END --}}

    <link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">
    {{-- Plugin --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.5.0/css/glide.core.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>

    <title>{{ $title }}</title>
</head>
<body>
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')

    {{-- Option 1: Bootstrap Bundle with Popper --}}
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    {{-- Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.5.0/glide.min.js"></script>
    {{-- Font Plugin --}}
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    {{-- My Script --}}
    @stack('script')
    <script>
        
        const config =  {
            type: 'carousel',
            startAt: 0,
            gap: 0,
            autoplay: 3500,
            perView: 1,
        }
        new Glide('.glide', config).mount();
    </script>
</body>
</html>