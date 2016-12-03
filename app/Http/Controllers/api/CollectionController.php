<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Repositories\Collection as Collection;

class CollectionController extends ApiController
{
    public function __construct(Collection $model)
    {
        $this->model = $model;
    }
}

