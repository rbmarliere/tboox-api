<?php

namespace App\Repositories;

interface Repository
{
    public function createOrFail(array $fields);
    public function destroyOrFail(integer $uuid);
    public function index();
    public function show(integer $uuid);
}

