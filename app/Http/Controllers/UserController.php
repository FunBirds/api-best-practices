<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class   UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = User::paginate(15);
        if ($all->isEmpty()) {
            return response()->json(["message" => "No users found"], 404);
        }
        return response()->json($all, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $credentials = $request->validated();
        $credentials["password"] = Hash::make($credentials["password"]);
        $credentials["remember_token"] = Str::random(32);
        $user = User::create($credentials);
        return response()->json([
            "message" => "User created successfully",
            "user" => $user
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user->load('article'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $credentials = $request->validated();
        if (isset($credentials["password"])) {
            $credentials["password"] = Hash::make($credentials["password"]);
        }
        $user->update($credentials);
        return response()->json([
            "message" => "User updated successfully",
            "user" => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user->findOrFail($id)->delete();
        return response()->json(["message" => "User deleted successfully"], 200);
    }
}
