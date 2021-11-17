<?php

namespace App\Services\Menu\Repositories;

use App\Models\Dish;
use App\Services\AbstractRepositories\AbstractRepositories;
use Illuminate\Database\Eloquent\Collection;

class MenuRepository extends AbstractRepositories
{
    protected $model = Dish::class;
    public function index(): Collection
    {
//        $this->setModel('Dish');
        return $this->getBy();
    }
}
