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

    public function timeline()
    {
        return $this->remember(function () {
            return response()->json(
                fractal()->
                collection($this->model->timeline(auth()->user()->uuid))->
                transformWith($this->transformer)->
                parseIncludes($this->includes)->
                serializeWith($this->serializer)->
                toArray()
            );
        });
    }

    public function subscriptions()
    {
        return $this->remember(function () {
            return response()->json(
                fractal()->
                collection($this->model->subscriptions(auth()->user()->uuid))->
                transformWith($this->transformer)->
                parseIncludes($this->includes)->
                serializeWith($this->serializer)->
                toArray()
            );
        });
    }

    public function subscribe($uuid)
    {
        try {
            $this->model->subscribe($uuid, auth()->user()->uuid);
            $response = [
                'status' => '0',
                'message' => 'Subscricao realizada com sucesso!'
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => '1',
                'message' => 'ERROR'
            ];
        }

        return response()->json($response);
    }

    public function unsubscribe($uuid)
    {
        try {
            $this->model->unsubscribe($uuid, auth()->user()->uuid);
            $response = [
                'status' => '0',
                'message' => 'Subscricao apagada com sucesso!'
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => '1',
                'message' => 'ERROR'
            ];
        }

        return response()->json($response);
    }

    public function login()
    {
        return response()->json('hello');
    }
}

