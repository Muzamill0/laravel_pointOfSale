<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {

        $users = User::all();
        return view('users.index', ['users' => $users]);

    }

    public function create()
    {
        $data = [
            'roles' => Role::all(),
        ];
        return view('users.create', $data);
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);
        $result = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
            ])->assignRole($request->role);

            if ($result) {
                return redirect()->route('create.user')->with('success', 'User has been Added succesfully');
            } else {
            return redirect()->route('create.user')->with('failed', 'User has failed to Add');
        }
    }

    public function edit(User $user)
    {
        $data = [
            'user' => $user,
            'roles' => Role::all(),
        ];
        return view('users.edit', $data);
    }

    public function update(request $request , User $user){
        $request->validate([
            'name' => ['required'],
            'email' => ['required']
        ]);
        $result = User::find($user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);



        if ($result) {
            User::find($user->id)->removeRole($user->roles->first());
            User::find($user->id)->assignRole($request->role);
            return back()->with('success', 'User has been updated succesfully');
        } else {
            return back()->with('failed', 'User has failed to Update');
        }
    }


    public function destroy(User $user){

        $result = User::find($user->id)->delete();

        if ($result) {
            return redirect()->route('users')->with('success', 'User is deleted successfully');
        } else {
            return redirect()->route('users')->with('failed', 'User is failed to delete');
        }
    }
}

