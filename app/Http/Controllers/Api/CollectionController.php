<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Collection as Collection;
use App\Serializers\Api as Serializer;
use App\Transformers\Collection as CollectionTransformer;

class CollectionController extends ApiController
{
    public function __construct(Collection $model, Serializer $serializer, CollectionTransformer $transformer)
    {
        $this->includes = [];
        $this->model = $model;
        $this->serializer = $serializer;
        $this->transformer = $transformer;
    }
}

