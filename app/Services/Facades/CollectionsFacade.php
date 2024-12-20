<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class CollectionsFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'CollectionsService';
    }
}
