<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Repository;
use App\Serializers\Api as Serializer;
use App\Traits\RemembersResponses;
use App\Transformers\Transformer;

class ApiController extends Controller
{
    use RemembersResponses;

    protected $includes;
    protected $model;
    protected $serializer;
    protected $transformer;

    public function __construct(Repository $model, Serializer $serializer, Transformer $transformer)
    {
        $this->includes = [];
        $this->model = $model;
        $this->serializer = $serializer;
        $this->transformer = $transformer;
    }

    public function destroy($uuid)
    {
        try {
            $this->model->destroyOrFail($uuid);
            $response = [ 'status' => '0' ];
        } catch (Exception $e) {
            $response = [ 'status' => '1' ];
        } finally {
            return response()->json($response);
        }
    }

    public function index()
    {
        return $this->remember(function () {
            return response()->json(
                fractal()->
                collection($this->model->index())->
                transformWith($this->transformer)->
                parseIncludes($this->includes)->
                serializeWith($this->serializer)->
                toArray()
            );
        });
    }

    public function show($uuid)
    {
        return $this->remember(function () {
            return response()->json(
                fractal()->
                item($this->model->show($uuid))->
                transformWith($this->transformer)->
                parseIncludes($this->includes)->
                serializeWith($this->serializer)->
                toArray()
            );
        });
    }

    public function store()
    {
        try {
            $this->model->createOrFail(request()->all());
            $response = [ 'status' => '0' ];
        } catch (Exception $e) {
            $reponse = [ 'status' => '1' ];
        } finally {
            return response()->json($response);
        }
    }
}

