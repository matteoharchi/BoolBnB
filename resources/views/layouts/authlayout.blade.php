<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials/head')
        <title>@yield('titolo')</title>
    </head>
    <body>

            <div class="header">
                @include('partials/authheader')
            </div>

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
