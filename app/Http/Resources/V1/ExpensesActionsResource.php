<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpensesActionsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "message" => $this['message'],
            "statusCode" => $this['statusCode'],
        ];
    }
}