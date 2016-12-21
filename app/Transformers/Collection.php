<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Collection as M_Collection;

class Collection extends TransformerAbstract
{
    public function transform(M_Collection $model) : array
    {
        return [
            'uuid' => $model->uuid,
            'book_id' => $model->book()->first()->uuid,
            'created_at' => $model->created_at->format("Y-m-d")
        ];
    }
}

