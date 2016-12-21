<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class BaseRepository implements Repository
{
    protected $model;

    public function createOrFail(array $fields) : Model
    {
        $fields['uuid'] = Uuid::uuid4()->toString();

        return $this->model
            ->create($fields);
    }

    public function destroyOrFail(string $uuid)
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

    public function show(string $uuid) : Model
    {
        return $this->model
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}

