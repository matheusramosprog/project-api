<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\V1\Controller;
use Illuminate\Http\Request;
use App\Models\V1\User;
use Illuminate\Http\Response;
use App\Http\Resources\V1\AuthUserResource;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        User::create($request->all());
    }

    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $expense = User::findOrFail($id);
        $expense->update($request->all());
    }

    public function destroy(string $id)
    {
        $expense = User::findOrFail($id);
        $expense->delete();
    }

    public function authUser(Request $request): AuthUserResource
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
        }

        return new AuthUserResource(["token" => $token]);
    }
}
