<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Review as M_Review;

class Review extends TransformerAbstract
{
    public function transform(M_Review $model) : array
    {
        return [
            'uuid' => $model->uuid,
            'collection_id' => $model->collection_id,
            'rating' => $model->rating,
            'description' => $model->description,
            'created_at' => $model->created_at->format("Y-m-d")
        ];
    }
}

