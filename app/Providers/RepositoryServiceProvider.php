<?php

namespace App\Providers;

use App\Repository\Interfaces\Expenses as ExpensesContract;
use App\Repository\V1\Expenses;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ExpensesContract::class, function ($app) {
            return new Expenses();
        });

    }


    public function boot()
    {
    }
}
