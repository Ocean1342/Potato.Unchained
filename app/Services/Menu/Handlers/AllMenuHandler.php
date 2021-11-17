<?php

namespace App\Services\Menu\Handlers;

use App\Services\Menu\Repositories\MenuRepository;
use Illuminate\Database\Eloquent\Collection;

class AllMenuHandler
{
    private MenuRepository $menuRepository;

    public function __construct(
        MenuRepository $menuRepository
    )
    {
        $this->MenuRepository = $menuRepository;
    }

    public function handle(array $data = []): Collection
    {
        return $this->MenuRepository->index();
    }

}
