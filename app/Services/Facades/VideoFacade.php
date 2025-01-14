<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class VideoFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'VideoService';
    }
}
