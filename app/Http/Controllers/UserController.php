<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'price' => 'required',
            'description' => 'required',
        ]);

        $user = User::findOrFail($request->id);

        $user->price = $request->price;
        $user->description = $request->description;

        $user->save();

        return back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users');
    }
}
