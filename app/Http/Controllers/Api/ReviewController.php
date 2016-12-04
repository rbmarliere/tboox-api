<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Review as Review;
use App\Serializers\Api as Serializer;
use App\Transformers\Review as ReviewTransformer;

class ReviewController extends ApiController
{
    public function __construct(Review $model, Serializer $serializer, ReviewTransformer $transformer)
    {
        $this->includes = [];
        $this->model = $model;
        $this->serializer = $serializer;
        $this->transformer = $transformer;
    }
}

