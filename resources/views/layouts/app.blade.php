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
    <nav class="px-6 py-2 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="p-3">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="p-3">
                <a href="{{ route('users') }}">Instructors</a>
            </li>
            @auth
                <li class="p-3">
                    <a href="{{ route('appointments') }}">Appointments</a>
                </li>
            @endauth
            @if (Auth::user() && Auth::user()->role_id == 1)
                <li class="p-3">
                    <a href="{{ route('skills') }}">Skills</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('roles') }}">Roles</a>
                </li>
            @endif
        </ul>

        @auth
            <ul class="flex items-center">
                <li class="p-3">
                    <a href="{{ route('users.show', auth()->user()->id) }}</a>
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
