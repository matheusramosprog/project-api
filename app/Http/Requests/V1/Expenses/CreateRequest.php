<?php

namespace App\Http\Requests\V1\Expenses;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'userId' => ['required', 'int'],
            'description' => ['required', 'string'],
            'value' => ['required', 'numeric'],
            'expenseDate' => ['required' , 'date'],
        ];
    }
}