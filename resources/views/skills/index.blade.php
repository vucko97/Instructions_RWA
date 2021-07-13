@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="text-xl font-bold mb-4">
                Skills
            </div>

            <div class="my-4">
                <form action="{{ route('skills') }}" method="POST">
                    @csrf
                    
                    <div>
                        <label for="id">ID</label>
                        <input class="border rounded p-1" placeholder="ID" type="text" name="id" id="id">
                        <label for="name">Name</label>
                        <input class="border rounded p-1" placeholder="Name" type="text" name="name" id="name">

                        <button type="submit" class="bg-green-500 text-white p-2 rounded">Submit</button>
                    </div>
                </form>
            </div>

            @if ($skills->count())
                <table style="width: 100%;" class="text-left mt-5">
                    <tr class="border">
                        <th class="p-2">ID</th>
                        <th class="p-2">Name</th>
                        <th class="p-2">Actions</th>
                    </tr>
                    @foreach ($skills as $skill)
                        <tr class="border">
                            <td class="p-2">{{ $skill->id }}</td>
                            <td class="p-2">{{ $skill->name }}</td>
                            <td class="p-2">
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white p-2 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                There are no skill
            @endif
        </div>
    </div>
@endsection
