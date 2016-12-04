<?php

namespace App\Repositories;

use App\Models\Collection as M_Collection;

class Collection extends BaseRepository
{
    public function __construct(M_Collection $model)
    {
        $this->model = $model;
    }
}

