<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'GRHUM — Serviced Accommodation, UK & Ireland')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome (used for feature icons: fa-bed, fa-bath, etc.) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Hanken Grotesk',-apple-system,sans-serif;color:#2A2620;background:#F6F1E8;-webkit-font-smoothing:antialiased}
        a{text-decoration:none;color:inherit}
        ::selection{background:#C2A06B;color:#fff}
        input,select,button{font-family:inherit}
        input[type=date]::-webkit-calendar-picker-indicator{opacity:.5;cursor:pointer}

        /* hover states (ye style-hover ki jagah aaye) */
        .nav-link:hover{color:#1E3A30}
        .btn-dark:hover{background:#16291F}
        .search-field:hover{background:#FAF6EE}
        .guest-btn:hover{border-color:#1E3A30}
        .btn-gold:hover{background:#B5925C}
        .solution-card:hover{border-color:#C2A06B}
        .feature-cell:hover{background:#224337}
        .location-card:hover{opacity:.94}
        .btn-wa:hover{background:rgba(246,241,232,.18)}
        .foot-link:hover{color:#fff}
    </style>

    @stack('styles')
    @stack('scripts-head')
</head>
<body>
    <div style="background:#F6F1E8;min-height:100vh;width:100%;overflow-x:hidden">
        @include('partials.header')

        @yield('content')

        @include('partials.locations-map')
        @include('partials.footer')
    </div>

    <!-- Bootstrap 5 JS (includes Popper, needed for collapse/dropdown) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @stack('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({ duration: 800, once: true, offset: 80, easing: 'ease-out-cubic' });
    </script>
</body>
</html>