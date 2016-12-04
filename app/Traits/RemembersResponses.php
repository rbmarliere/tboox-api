<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait RemembersResponses
{
    private function cache_key($prefix)
    {
        return $prefix . '_' . substr(md5($prefix), 0, 4);
    }

    private function remember(\Closure $response)
    {
        $cache_key = $this->cache_key(request()->path());
        return Cache::remember($cache_key, 1440, $response);
    }
}

