<?php

namespace App\Policies;

use App\Models\V1\Expenses;
use App\Models\V1\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ExpensesPolicy
{
    use HandlesAuthorization;

    public function __construct(){}

    public function actionExpenses(User $user, Expenses $expense): bool
    {
        return Auth::guard('api')->user()->id == $expense->user_id;
    }

}
