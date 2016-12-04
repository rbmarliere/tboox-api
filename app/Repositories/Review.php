<?php

namespace App\Repositories;

use App\Models\Review as M_Review;

class Review extends BaseRepository
{
    public function __construct(M_Review $model)
    {
        $this->model = $model;
    }
}

