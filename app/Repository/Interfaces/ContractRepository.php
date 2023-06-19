<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ContractRepository
{
    public function findById(int $id): Model;

    public function findAll(): Collection;
}