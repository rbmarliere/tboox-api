<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\RemembersResponses;

class ApiController extends Controller
{
    use RemembersResponses;

    private $includes;
    private $model;
    private $serializer;
    private $transformer;

    public function __construct()
    {
        parent::__construct();
        $this->serializer = new ApiSerializer();
        $this->includes = [];
    }

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
            $response = [ 'message' => 'OK' ];
        } catch (Exception $e) {
            $reponse = [ 'message' => 'FAILURE' ];
        } finally {
            return response()->json($response);
        }
    }
}

