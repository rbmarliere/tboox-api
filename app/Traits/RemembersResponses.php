<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait RemembersResponses
{
    private function cache_key($prefix)
    {
        return $prefix . '_' . substr(md5($prefix), 0, 4);
    }

    private function remember(array $response)
    {
        $prefix = request()->path() . '_' . auth()-user()->id;
        $cache_key = cache_key($prefix);

        Cache::add($cache_key, $response, 1440);

        return Cache::get($cache_key);
    }
}

