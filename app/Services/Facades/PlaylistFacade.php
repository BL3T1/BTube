<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class PlaylistFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'PlaylistService';
    }
}
