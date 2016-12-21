<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function createOrFail(array $fields) : Model;
    public function destroyOrFail(string $uuid);
    public function index() : Collection;
    public function show(string $uuid) : Model;
}

