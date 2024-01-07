<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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


        $user = User::create([
            'name' => 'Name 1',
            'email' => 'email1@example.com',
            'password' => 'password1'
        ]);
        $user->save();
        return Redirect::route('users.index');
    }

    public function update($id)
    {
        $user = User::query()->findOrFail($id);
        $user->update([
            'name' => 'Name 15',
            'email' => 'email15@example.com',
            'password' => 'password15'
        ]);

        $user->save();
        return Redirect::route('users.index');
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

