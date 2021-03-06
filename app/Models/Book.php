<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'title',
        'synopsis'
    ];

    public function collections()
    {
        return $this->hasMany('App\Models\Collection');
    }
}
