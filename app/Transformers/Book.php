<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Book as M_Book;

class Book extends TransformerAbstract
{
    public function transform(M_Book $model) : array
    {
        return $model->toArray();
    }
}

