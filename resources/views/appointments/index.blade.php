@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="text-xl font-bold mb-4">
                Appointments
            </div>

            <div class="my-4">
                <form action="{{ route('appointments') }}" method="POST">
                    @csrf

                    <div class="my-2">
                        <label for="time">Time:</label>
                        <input class="border rounded p-1" type="time" name="time" id="time">
                    </div>

                    <div class="my-2">
                        <label for="date">Date:</label>
                        <input class="border rounded p-1" min="{{ now()->toDateString('Y-m-d') }}" type="date" name="date"
                            id="date">
                    </div>

                    <div class="my-2">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="10" rows="4"
                            class="bg-gray-100 border w-full p-4 rounded" placeholder="Description"></textarea>
                    </div>

                    <div class="my-2">
                        <label for="contact">Contact:</label>
                        <input class="border rounded p-1" placeholder="Contact" type="text" name="contact" id="contact">
                    </div>

                    <div class="mt-4 text-right">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Submit</button>
                    </div>
                </form>
            </div>

            <hr class="my-2">

            <div class="text-xl">
                Your appointments
            </div>

            @if ($appointments->count())
                <div class="grid grid-cols-1 lg:grid-cols-3 my-5">
                    @foreach ($appointments as $appointment)
                        <div class="p-4 m-2 border rounded bg-gray-200">
                            <div>Time: <b>{{ $appointment->time }}</b></div>
                            <div>Date: <b>{{ $appointment->date }}</b></div>
                            <div>Description: <b>{{ $appointment->description }}</b></div>
                            <div>Contact: <b>{{ $appointment->contact }}</b></div>
                            @if (Auth::user()->role_id == 1)
                                <div>Owner: <b>{{ $appointment->user->email }}</b></div>
                            @endif

                            <div class="text-right">
                                <form action="/appointments/{{ $appointment->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white p-2 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div>
                    There are no appointments
                </div>
            @endif
        </div>
    </div>
@endsection
