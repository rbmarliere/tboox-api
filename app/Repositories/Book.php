<?php

namespace App\Repositories;

use App\Models\Book as M_Book;

class Book extends BaseRepository
{
    public function __construct(M_Book $model)
    {
        $this->model = $model;
    }
}

