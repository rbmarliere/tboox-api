<?php

namespace App\Http\Controllers\api;

use App\Repositories\Book as Book;
use App\Transformers\Book as BookTransformer;
use Illuminate\Http\Request;

class BookController extends ApiController
{
    public function __construct(Book $model)
    {
        $this->model = $model;
        $this->transformer = new BookTransformer();
    }
}

