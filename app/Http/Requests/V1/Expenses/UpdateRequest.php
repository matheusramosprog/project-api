<?php

namespace App\Http\Requests\V1\Expenses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'userId' => ['int'],
            'description' => ['string'],
            'value' => ['numeric'],
            'expenseDate' => ['date'],
        ];
    }
}