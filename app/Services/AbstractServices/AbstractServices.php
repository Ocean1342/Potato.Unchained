<?php

namespace App\Services\AbstractServices;

use Illuminate\Database\Eloquent\Collection;

abstract class AbstractServices
{
    abstract public function index(array $data): Collection;
}
