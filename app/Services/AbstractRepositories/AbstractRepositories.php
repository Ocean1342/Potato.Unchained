<?php

namespace App\Services\AbstractRepositories;

use Barryvdh\Reflection\DocBlock;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepositories
{
    protected Model $model;

    abstract protected function setModel();

    protected function getModel(): Model
    {

        $model = $this->setModel();
        return $model;
    }

    public function getBy(array $filters = [], int $limit = 50, int $offset = 0): Collection
    {
        $model = $this->getModel();
        $qb = $model::query();
        $this->applyFilters($qb, $filters);

        $qb->take($limit);
        $qb->skip($offset);

        return $qb->get();
    }

    protected function applyFilters(Builder $qb, array $filters): void
    {
        if (!empty($filters['title'])) {
            $qb->where('title','LIKE','%'.$filters['title'].'%');
        }
        if (!empty($filters['id'])) {
            $qb->where(['id' => $filters['id']]);
        }
        if (!empty($filters['start'])) {
            $qb->whereDate(
                'created_at',
                '>=',
                $filters['start']
            );
        }
        if (!empty($filters['end'])) {
            $qb->whereDate(
                'created_at',
                '<=',
                $filters['end']
            );
        }
    }

}
