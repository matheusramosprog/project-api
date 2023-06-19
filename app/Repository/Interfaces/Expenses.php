<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface Expenses
{
    public function index(): Collection;

    public function show(int $id): Model;
    
    public function create(array $request): Model;

    public function update(array $request, int $id): bool;

    public function delete($id): bool;

}
