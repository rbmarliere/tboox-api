<?php

namespace App\Http\Controllers\Api;

use App\Repositories\User as User;
use App\Transformers\User as UserTransformer;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->transformer = new UserTransformer();
    }
}

