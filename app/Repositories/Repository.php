<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function createOrFail(array $fields) : integer;
    public function destroyOrFail(integer $uuid) : integer;
    public function index() : Collection;
    public function show(integer $uuid) : Model;
}

