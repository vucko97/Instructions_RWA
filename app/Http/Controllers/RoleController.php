<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function index()
    {
        $roles = Role::get();

        return view('roles.index', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Role::create($request->all());

        return back();
    }

    public function destroy($id)
    {
        $lecture = Role::findOrFail($id);

        $lecture->delete();

        return back();
    }
}
