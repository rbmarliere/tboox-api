<?php

namespace App\Http\Controllers\api;

use App\Repositories\Review as Review;
use App\Transformers\Review as ReviewTransformer;
use Illuminate\Http\Request;

class ReviewController extends ApiController
{
    public function __construct(Review $model)
    {
        $this->model = $model;
        $this->transformer = new ReviewTransformer();
    }
}

