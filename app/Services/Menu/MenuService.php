<?php

namespace App\Services\Menu;

use App\Services\Menu\Handlers\AllMenuHandler;
use App\Services\Menu\Repositories\MenuRepository;
use Illuminate\Database\Eloquent\Collection;

class MenuService
{
    public function __construct(
        private MenuRepository $menuRepository,
        private AllMenuHandler $allMenuHandler
    )
    {
    }

    public function index(array $data): Collection
    {
//        dd();
        return $this->allMenuHandler->handle($data);
    }
}
