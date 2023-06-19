<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpensesShowResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "userId" => $this->user_id,
            "description" => $this->description,
            "value" => $this->value,
            "expenseDate" => $this->expense_date,
        ];
    }
}