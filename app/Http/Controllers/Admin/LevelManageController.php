<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelManageController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->with('users')->paginate(10);
        return view('admin.levelAdmins.all' , compact('roles'));
    }

    public function create()
    {
        $users = User::whereLevel('admin')->get();
        $roles = Role::all();
        return view('admin.levelAdmins.create' , compact('users' , 'roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'user_id' => "required",
            'role_id' => "required",
        ]);

        User::find($request->input('user_id'))->roles()->sync($request->input('role_id'));

        return redirect(route('level.index'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.levelAdmins.edit' , compact('user' , 'roles'));
    }

    public function update(Request $request , User $user)
    {
       // dd($request->input('role_id'));
        $user->roles()->sync($request->input('rol_id'));
        return redirect(route('level.index'));
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        return redirect(route('level.index'));
    }
}
