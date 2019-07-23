<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function listUsers()
    {
        $users = User::all();
        if ($users->isEmpty()) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $userCollection = UserResource::collection($users);
        return response()->json($userCollection, 200);
    }

    public function listActiveUsers()
    {
        $users = User::all()->where('active', '==', '1');
        if ($users->isEmpty()) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $userCollection = UserResource::collection($users);
        return response()->json($userCollection, 200);
    }

    public function findUser($user)
    {
        if (!User::find($user)) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(new UserResource(User::find($user)), 200);
    }

    public function addUser($user)
    {
        if (!User::find($user)) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(new UserResource(User::find($user)), 200);
    }
}
