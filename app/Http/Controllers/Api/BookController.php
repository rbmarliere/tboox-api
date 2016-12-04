<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Book as Book;
use App\Serializers\Api as Serializer;
use App\Transformers\Book as BookTransformer;

class BookController extends ApiController
{
    public function __construct(Book $model, Serializer $serializer, BookTransformer $transformer)
    {
        $this->includes = [];
        $this->model = $model;
        $this->serializer = $serializer;
        $this->transformer = $transformer;
    }
}

