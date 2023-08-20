<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($id){
        $user = User::findorfail($id);
        return view('users.show', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index')->with('success', 'create user successfully');
    }

    public function edit($id){
        $user = User::findorfail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users.index')->with('success', 'update user successfully');
    }

    public function destroy($id){
        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'delete user successfully');
    }
}
