<?php

namespace App\Services\Contracts;

interface CollectionsContract
{
    public function addCollection();

    public function updateCollection();

    public function removeCollection();

    public function addFavorite();

    public function updateFavorite();

    public function removeFavorite();
}
