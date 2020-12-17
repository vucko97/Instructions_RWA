@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg text-center">
            <div class="text-xl">
                Welcome!

                <div class="mt-10">
                    <button class="bg-blue-500 rounded text-white p-4">
                        <a href="{{ route('users') }}">Find instructors</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
