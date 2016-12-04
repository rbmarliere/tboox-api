<?php

namespace App\Http\Controllers\Api;

use App\Repositories\User as User;
use App\Serializers\Api as Serializer;
use App\Transformers\User as UserTransformer;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function __construct(User $model, Serializer $serializer, UserTransformer $transformer)
    {
        $this->includes = [];
        $this->model = $model;
        $this->serializer = $serializer;
        $this->transformer = $transformer;
    }
}

