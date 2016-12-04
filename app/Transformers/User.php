<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User as M_User;

class User extends TransformerAbstract
{
    public function transform(M_User $model) : array
    {
        return [
            'uuid' => $model->uuid,
            'name' => $model->name,
            'created_at' => $model->created_at->format("Y-m-d")
        ];
    }
}

