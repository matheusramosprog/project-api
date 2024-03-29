<?php

namespace App\Repository\V1;

use App\Repository\Interfaces\Expenses as Contract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Expenses extends Repository implements Contract
{
    public function index(): Collection
    {
        return $this->model::where('user_id', Auth::guard('api')->user()->id)->get();
    }

    public function show(int $id): Model
    {
        return $this->findById($id);
    }
    
    public function create(array $request): Model
    {
        return $this->model::create($request);
    }

    public function update(array $request, int $id): bool
    {
        $expense = $this->show($id);
        return $expense->update($request);
    }

    public function delete($id): bool
    {
        $expense = $this->show($id);
        return $expense->delete();
    }
}
