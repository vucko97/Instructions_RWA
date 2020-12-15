@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Roles

            <div class="my-4">
                <form action="{{ route('roles') }}" method="POST">
                    @csrf

                    <div>
                        <label for="name">Name:</label>
                        <input class="border" type="text" name="name" id="name">

                        <button type="submit" class="bg-green-500 text-white p-2 rounded">Submit</button>
                    </div>
                </form>
            </div>

            @if ($roles->count())
                @foreach ($roles as $role)
                    <div>
                        {{ $role->id }} - {{ $role->name }}
                    </div>
                @endforeach
            @else
                There are no roles
            @endif
        </div>
    </div>
@endsection
