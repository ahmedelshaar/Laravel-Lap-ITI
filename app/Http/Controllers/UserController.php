<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findorfail($id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'create user successfully');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->except('password');
        if ($request->password) {
            $data['password'] = $request->password;
        }
        return redirect()->route('users.index')->with('success', 'update user successfully');
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'delete user successfully');
    }
}
