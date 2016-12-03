<?php

namespace App\Http\Controllers\api;

use App\Repositories\Collection as Collection;
use App\Transformers\Collection as CollectionTransformer;
use Illuminate\Http\Request;

class CollectionController extends ApiController
{
    public function __construct(Collection $model)
    {
        $this->model = $model;
        $this->transformer = new CollectionTransformer();
    }
}

