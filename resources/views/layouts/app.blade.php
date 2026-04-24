<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <!-- Header Navigation -->
    <header class="navbar">
    <nav class="nav-links">
        <a href="{{ route('home') }}">
            <i class="fa-solid fa-house"></i>
        </a>
        <a href="{{ route('clubs.index') }}">
            Clubs
        </a>
        <a href="{{ route('calendar.index') }}">
            <i class="fa-solid fa-calendar"></i>
        </a>
    </nav>
</header>


    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>CREATED BY ME</p>
    </footer>
</body>
</html>
