@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="text-lg font-bold mb-4">Edit user</div>

            <form action="/users/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div>Name: <b>{{ $user->name }}</b></div>
                <div>Email: <b>{{ $user->email }}</b></div>

                <div class="my-2">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" value="{{ $user->price }}" placeholder="Price"
                        class="bg-gray-100 border rounded p-1">
                </div>

                <div class="my-2">
                    <label for="skill">Skill</label>
                    <select class="border p-1 bg-gray-100 rounded" name="skill_id" id="skill">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-2">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="10" rows="4"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg"
                        placeholder="Description">{{ $user->description }}</textarea>
                </div>


                <div class="text-right">
                    <button type="submit" class="bg-yellow-500 text-white p-2 rounded">Edit</button>
                </div>
                </v-form>
        </div>
    </div>
@endsection
