<?php

namespace App\Business\V1;

use App\Business\V1\Business;
use Illuminate\Http\Response;
use App\Lib\Expenses\Validations;
use App\Models\V1\Expenses as Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Expenses
{
    use Business;

    public function index(): Collection
    {
        return $this->repository->index();
    }

    public function show(int $id): Repository
    {
        try {
            return $this->repository->show($id);
        } catch (\Exception $ex){
            abort(Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }

    public function create(Request $request): Repository {
        try {
            Validations::validRequest($request);
            return $this->repository->create($this->treatData($request));
        } catch (\Exception $ex){
            abort(Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }

    public function update(Request $request, int $id): bool {
        try {
            Validations::validRequest($request);
            return $this->repository->update($this->treatData($request), $id);
        } catch (\Exception $ex){
            abort(Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    private function treatData(Request $request): array {
        $data = [
            'user_id' => 'userId',
            'description' => 'description',
            'value' => 'value',
            'expense_date' => 'expenseDate'
        ];

        $treatData = array();
        $fields = $request->only('userId', 'description', 'value', 'expenseDate');
        foreach($fields as $key => $value)
        {
            $treatData[array_keys($data, $key)[0]] = $value;
        }
        return $treatData;
    }
    

    
}