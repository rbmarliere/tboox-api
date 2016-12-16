<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Repository;
use App\Serializers\Api as Serializer;
use App\Traits\RemembersResponses;
use App\Transformers\Transformer;
use Illuminate\Http\Request;
use League\Fractal\TransformerAbstract;

class ApiController extends Controller
{
    use RemembersResponses;

    protected $includes;
    protected $model;
    protected $serializer;
    protected $transformer;

    public function __construct(Repository $model, Serializer $serializer, TransformerAbstract $transformer)
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
            $response = [
                'status' => '0',
                'message' => 'Remocao realizada com sucesso!'
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => '1',
                'message' => 'ERROR'
            ];
        }

        return response()->json($response);
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
        return $this->remember(function () use ($uuid) {
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'object' => 'required'
        ]);

        try {
            $this->model->createOrFail(request()->get('object'));
            $response = [
                'status' => '0',
                'message' => 'Registro realizado com sucesso!'
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => '1',
                'message' => 'ERROR'
            ];
        }

        return response()->json($response);
    }
}

