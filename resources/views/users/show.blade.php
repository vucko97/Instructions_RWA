@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div>{{ $user->name }}</div>
            <div>{{ $user->email }}</div>
            <div>{{ $user->price }}</div>
            <div>{{ $user->description }}</div>

            <div class="flex justify-end mt-4">
                <a class="bg-yellow-500 text-white p-2 rounded mr-3" href="/users/{{ $user->id }}/edit">Edit</a>

                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white p-2 rounded">Delete</button>
            </div>
        </div>
    </div>
    </div>
@endsection
