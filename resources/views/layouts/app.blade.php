<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials/head')
    <title>@yield('titolo')</title>
</head>
<body>

        <header>
            @include('partials/header')
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="ombra">
            @unless (request()->is('login', 'register'))
                @include('partials/footer')
            @endunless
        </footer>


</body>
</html>
