@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Appointments

            <div class="my-4">
                <form action="{{ route('appointments') }}" method="POST">
                    @csrf

                    <div class="my-2">
                        <label for="time">Time</label>
                        <input class="border" type="time" name="time" id="time">
                    </div>

                    <div class="my-2">
                        <label for="date">Date</label>
                        <input class="border" type="date" name="date" id="date">
                    </div>

                    <div class="my-2">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="10" rows="4"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Description"></textarea>
                    </div>

                    <div class="my-2">
                        <label for="contact">Contact</label>
                        <input class="border" type="text" name="contact" id="contact">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-green-500 text-white p-2 rounded">Submit</button>
                    </div>
                </form>
            </div>

            @if ($appointments->count())
                <div class="grid grid-cols-1 lg:grid-cols-3 my-5">
                    @foreach ($appointments as $appointment)
                        <div class="p-4 m-2 border">
                            <div>{{ $appointment->time }}</div>
                            <div>{{ $appointment->date }}</div>
                            <div>{{ $appointment->description }}</div>
                            <div>{{ $appointment->contact }}</div>
                            <div>{{ $appointment->user_id }}</div>
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
