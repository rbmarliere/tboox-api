<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller as Controller;

class ApiController extends Controller
{
    use RemembersResponses;

    private $includes;
    private $model;
    private $serializer;
    private $transformer;

    public function destroy($uuid)
    {
        try {
            $this->model->destroy($uuid);
            $response = [ 'message' => 'OK' ];
        } catch (Exception $e) {
            $response = [ 'message' => 'FAILURE' ];
        } finally {
            return response()->json($response);
        }
    }

    public function index()
    {
        $response =
            fractal()->
            collection($this->model->index())->
            transformWith($this->transformer)->
            parseIncludes($this->includes)->
            serializeWith($this->serializer)->
            toArray();

        $this->remember($response);

        return response()->json($response);
    }

    public function show($uuid)
    {
        $response =
            fractal()->
            collection($this->model->show($uuid))->
            transformWith($this->transformer)->
            parseIncludes($this->includes)->
            serializeWith($this->serializer)->
            toArray();

        $this->remember($response);

        return response()->json($response);
    }

    public function store()
    {
        try {
            $this->model->createOrFail(request()->all());
            $response = [ 'message' => 'OK' ];
        } catch (Exception $e) {
            $reponse = [ 'message' => 'FAILURE' ];
        } finally {
            return response()->json($response);
        }
    }
}

