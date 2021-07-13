@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="text-xl font-bold mb-4">
                Instructors
            </div>

            <form action="{{ route('users') }}">
                <div class="my-2">
                    <label for="filter">Filter</label>
                    <select class="border p-2 rounded bg-gray-200" name="filter" id="filter">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>

                    <label for="order">Order by price</label>
                    <select class="border p-2 rounded bg-gray-200 mr-2" name="order" id="order">
                        <option value="asc">ascening</option>
                        <option value="desc">descending</option>
                    </select>

                    <button type="submit" class="bg-blue-200 rounded p-2 mr-2">Filter</button>
                    <button type="submit" class="bg-blue-500 text-white rounded p-2 my-2"><a href="{{ route('users') }}">Remove
                            filters</a></button>
            </form>
        </div>

        <hr>

        @if ($users->count())
            <div class="grid grid-cols-1 lg:grid-cols-3 my-5">
                @foreach ($users as $user)
                    <div class="p-4 m-2 bg-gray-200 rounded border">

                        <div>Name: <b>{{ $user->name }}</b></div>
                        <div>Email: <b>{{ $user->email }}</b></div>
                        @if ($user->skill_id)
                            <div>Skill: <b>{{ $user->skill->name }}</b></div>
                        @endif
                        <div>Price: <b class="text-blue-500">{{ $user->price }} $/h</b></div>
                        <div class="text-right">
                            <a class="underline text-blue-600" href="{{ route('users.show', $user->id) }}">Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            There are no users
        @endif
    </div>
    </div>
@endsection
