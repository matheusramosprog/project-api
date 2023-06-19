<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Models\V1\Expenses' => 'App\Policies\ExpensesPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();
    }
}
