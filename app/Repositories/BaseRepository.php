<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements Repository
{
    protected $model;

    public function createOrFail(array $fields) : integer
    {
        $fields['uuid'] = Uuid::generate();

        return $this->model
            ->create($fields);
    }

    public function destroyOrFail(integer $uuid) : integer
    {
        $deleted = $this->show($uuid);

        return $deleted
            ->delete();
    }

    public function index() : Collection
    {
        return $this->model
            ->all();
    }

    public function show(integer $uuid) : Model
    {
        return $this->model
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}

