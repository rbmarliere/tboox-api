<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Repositories\User as User;

class UserController extends ApiController
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}

