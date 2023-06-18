<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\V1\Controller;
use Illuminate\Http\Request;
use App\Models\V1\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'um';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'dois';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'tres';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'quatro';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'cinco';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'seis';
    }
}
