<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filter) {
            $users = User::where('role_id', '!=', 1)->where('skill_id', '=', $request->filter)->orderBy('price', $request->order)->get();
        } else {
            $users = User::where('role_id', '!=', 1)->get();
        }

        $skills = Skill::get();

        return view('users.index', ['users' => $users, 'skills' => $skills]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $skills = Skill::get();

        return view('users.edit', ['user' => $user, 'skills' => $skills]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'price' => 'required',
            'description' => 'required',
            'skill_id' => 'required'
        ]);

        $user = User::findOrFail($request->id);

        $user->price = $request->price;
        $user->description = $request->description;
        $user->skill_id = $request->skill_id;

        $user->save();

        return redirect('/users/' . $request->id);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users');
    }
}
