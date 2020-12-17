@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div>Name: <b>{{ $user->name }}</b></div>
            <div>Email: <b>{{ $user->email }}</b></div>
            @if ($user->skill_id)
                <div>Skill: <b>{{ $user->skill->name }}</b></div>
            @endif
            <div>Price: <b class="text-blue-500">{{ $user->price }} $/h</b></div>
            <div>Description: <em>{{ $user->description }}</em></div>

            @if (Auth::user() && (Auth::user()->id == $user->id || Auth::user()->role_id == 1))
                <div class="flex justify-end mt-4">
                    <a class="bg-yellow-500 text-white p-2 rounded mr-3" href="/users/{{ $user->id }}/edit">Edit</a>

                    <form action="/users/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white p-2 rounded">Delete</button>
                </div>
            @endif

            <hr class="my-2">

            <div class="text-center">
                <h2>Send e-mail to {{ $user->email }}</h2>

                <form action="mailto:{{ $user->email }}" method="POST" enctype="text/plain">
                    Name:<br>
                    <input class="border p-2 rounded" type="text" name="name" value="{{ Auth::user()->name }}"><br>
                    Message:<br>
                    <textarea placeholder="Write a message." name="message" class="border p-2 rounded" cols="30"
                        rows="10"></textarea>
                    <br>
                    <button class="bg-blue-500 text-white p-2 rounded" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
