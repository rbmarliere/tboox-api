<?php

namespace App\Repositories;

use App\Models\Review as M_Review;
use App\Repositories\Collection;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Review extends BaseRepository
{
    public function __construct(M_Review $model, Collection $collection)
    {
        $this->model = $model;
        $this->collection = $collection;
    }

    public function createOrFail(array $fields) : Model
    {
        $fields['uuid'] = Uuid::uuid4()->toString();
        $fields['collection_id'] = $this->collection->show($fields['collection_id'])->id;

        return $this->model
            ->create($fields);
    }
}

