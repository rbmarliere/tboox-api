<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Repositories\Review as Review;

class ReviewController extends ApiController
{
    public function __construct(Review $model)
    {
        $this->model = $model;
    }
}

