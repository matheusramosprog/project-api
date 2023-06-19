<?php

namespace App\Business\V1;

use App\Business\V1\Business;
use Illuminate\Http\Response;
use App\Models\V1\User as Repository;

class User
{
    use Business;

    public function show(int $id): Repository
    {
        $expense = $this->repository->findById($id);
        if($expense->user_id != auth()->user()->nivel_usuario){
            abort(Response::HTTP_FORBIDDEN, "Você não tem permissão para realizar essa ação.");
        }
        return $expense;
    }

    public function update(array $newData): bool
    {
        $moduleUpdate = $this->show($newData['id']);
        return $moduleUpdate->update($newData);
    }
}