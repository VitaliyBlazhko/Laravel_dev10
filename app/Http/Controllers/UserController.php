<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use JetBrains\PhpStorm\NoReturn;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {

        return Redirect::route('register.index');
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'id' => ['required', 'exists:users,id'],
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'string', 'unique:users'],
            'password' => ['required', 'min:6']
        ]);
        $user = User::query()->findOrFail($data['id']);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return back()->with('success', 'User updated successfully.');

    }

    public function item($id)
    {
        $user = User::query()->findOrFail($id);
        $events = $user->events;
        return view('users.item', [
            'user' => $user,
            'events' => $events
        ]);
    }

    public function usersEvents($id)
    {
        $user = User::query()->findOrFail($id);
        $events = $user->events;
        return view('users.item', [
            'user' => $user,
            'events' => $events
        ]);
    }

    public function delete($id)
    {

        $user = User::query()->find($id)->delete();

        return Redirect::route('users.index');
    }
}

