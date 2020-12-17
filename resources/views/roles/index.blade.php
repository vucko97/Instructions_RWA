@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="text-xl font-bold mb-4">
                Roles
            </div>

            <div class="my-4">
                <form action="{{ route('roles') }}" method="POST">
                    @csrf

                    <div>
                        <label for="name">Name:</label>
                        <input class="border rounded p-1" placeholder="Name" type="text" name="name" id="name">

                        <button type="submit" class="bg-green-500 text-white p-2 rounded">Submit</button>
                    </div>
                </form>
            </div>

            @if ($roles->count())
                <table style="width: 100%;" class="text-left mt-5">
                    <tr class="border">
                        <th class="p-2">ID</th>
                        <th class="p-2">Name</th>
                        <th class="p-2">Actions</th>
                    </tr>
                    @foreach ($roles as $role)
                        <tr class="border">
                            <td class="p-2">{{ $role->id }}</td>
                            <td class="p-2">{{ $role->name }}</td>
                            <td class="p-2">
                                <form action="/roles/{{ $role->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white p-2 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                There are no roles
            @endif
        </div>
    </div>
@endsection
