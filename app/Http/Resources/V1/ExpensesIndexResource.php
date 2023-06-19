<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExpensesIndexResource extends ResourceCollection
{
    public function toArray($request)
    {
        $collection = $this->collection;
        return $collection->map(function ($item) {
            return [
                "id" => $item->id,
                "userId" => $item->user_id,
                "description" => $item->description,
                "value" => $item->value,
                "expenseDate" => $item->expense_date,
            ];
        })->toArray();
    }
}