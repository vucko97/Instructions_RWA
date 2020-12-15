@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Skills

            <div class="my-4">
                <form action="{{ route('skills') }}" method="POST">
                    @csrf

                    <div>
                        <label for="name">Name:</label>
                        <input class="border" type="text" name="name" id="name">

                        <button type="submit" class="bg-green-500 text-white p-2 rounded">Submit</button>
                    </div>
                </form>
            </div>

            @if ($skills->count())
                @foreach ($skills as $skill)
                    <div>
                        {{ $skill->name }}
                    </div>
                @endforeach
            @else
                There are no skills
            @endif
        </div>
    </div>
@endsection
