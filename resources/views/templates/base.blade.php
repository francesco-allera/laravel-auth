<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>

    <div id="app">
        @if (request()->is('product') && Route::has('login'))
        <div id="login">
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        </div>
        @endif

        <header>
            <h1>example base header</h1>
        </header>

        <main>
            <div class="container">

                @yield('content')

            </div>
        </main>

        <footer>
            <h4>example base footer</h4>
        </footer>
    </div>

</body>
</html>
