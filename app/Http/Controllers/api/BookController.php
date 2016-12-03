<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Repositories\Book as Book;

class BookController extends ApiController
{
    public function __construct(Book $model)
    {
        $this->model = $model;
    }
}

