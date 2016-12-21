<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait RemembersResponses
{
    private function cache_key()
    {
        $prefix = auth()->user()->id . "_" . request()->path();
        return $prefix . '_' . substr(md5($prefix), 0, 4);
    }

    private function remember(\Closure $response)
    {
        return Cache::remember($this->cache_key(), 1440, $response);
    }

    private function forget()
    {
        // todo: figure out a a better way
        //return Cache::forget($this->cache_key());
        return Cache::flush();
    }
}

