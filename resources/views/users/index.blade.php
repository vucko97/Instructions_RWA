@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Users

            @if ($users->count())
                <div class="grid grid-cols-1 lg:grid-cols-3 my-5">
                    @foreach ($users as $user)
                        <div class="p-4 m-2 border">
                            <div>{{ $user->name }}</div>
                            <div>{{ $user->email }}</div>
                            <div>{{ $user->price }} KM/h</div>
                            <div class="text-right">
                                <a class="underline" href="/users/{{ $user->id }}">Details</a>
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
