<?php

namespace App\Http\Controllers\api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use RemembersResponses;
    use ValidatesRequests;

    private $includes;
    private $repository;
    private $serializer;
    private $transformer;

    public function destroy($uuid)
    {
        try {
            $this->repository->destroy($uuid);
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
            collection($this->repository->index())->
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
            collection($this->repository->show($uuid))->
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
            $this->repository->createOrFail(request()->all());
            $response = [ 'message' => 'OK' ];
        } catch (Exception $e) {
            $reponse = [ 'message' => 'FAILURE' ];
        } finally {
            return response()->json($response);
        }
    }
}

