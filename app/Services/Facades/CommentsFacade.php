<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class CommentsFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'CommentsService';
    }
}
