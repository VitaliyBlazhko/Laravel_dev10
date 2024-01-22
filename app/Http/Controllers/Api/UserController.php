<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        return new UserCollection(User::query()->CursorPaginate(5));
    }

    public function getUser($id)
    {
        $user = User::query()->findOrFail($id);
        return new UserResource($user);
    }
    public function userUpdate(LoginFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $event = User::findOrFail($id);
        $event->update($validatedData);

        return new UserResource($event);

    }

    public function userDelete($id)
    {
        User::query()->findOrFail($id)->delete();

    }
}
