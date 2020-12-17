@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="bg-gray-200 rounded p-4">
                <div>Name: <b>{{ $user->name }}</b></div>
                <div>Email: <b>{{ $user->email }}</b></div>
                @if ($user->skill_id)
                    <div>Skill: <b>{{ $user->skill->name }}</b></div>
                @endif
                <div class="text-right text-2xl">Price: <b class="text-blue-500">{{ $user->price }} $/h</b></div>
                <div>Description:</div>
                <div class="border bg-gray-300 p-2 rounded">
                    <em>{{ $user->description }}</em>
                </div>

                @if (Auth::user() && (Auth::user()->id == $user->id || Auth::user()->role_id == 1))
                    <div class="flex justify-end mt-4">
                        <a class="bg-yellow-500 text-white p-2 rounded mr-3" href="/users/{{ $user->id }}/edit">Edit</a>

                        <form action="/users/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white p-2 rounded">Delete</button>
                    </div>
                @endif
            </div>

            <hr class="my-5">

            <div class="flex justify-center">
                <div class="border bg-blue-100 rounded p-4">
                    <div class="text-lg mb-5">Send email to <b>{{ $user->email }}</b></div>

                    <form action="mailto:{{ $user->email }}" method="POST" enctype="text/plain">
                        Name:<br>
                        <input class="border p-2 rounded" type="text" placeholder="Name" name="name"><br>
                        Message:<br>
                        <textarea placeholder="Write a message." name="message" class="border p-2 rounded" cols="30"
                            rows="10"></textarea>
                        <br>
                        <div class="text-right">
                            <button class="bg-blue-500 text-white p-2 rounded" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
