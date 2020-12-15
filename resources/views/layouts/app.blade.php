<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instructions</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="p-3">
                <a href="">Home</a>
            </li>
            <li class="p-3">
                <a href="">Professors</a>
            </li>
            <li class="p-3">
                <a href="">Appointments</a>
            </li>
        </ul>

        @auth
            <ul class="flex items-center">
                <li class="p-3">
                    <a href="">My profile</a>
                </li>
                <li class="p-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
            </ul>
        @endauth
        @guest

            <ul class="flex items-center">
                <li class="p-3">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        @endguest
    </nav>

    @yield('content')
</body>

</html>
