<?php

namespace App\Services\Contracts;

interface VideoContract
{
    public function addVideo(): string;

    public function updateVideo(): string;

    public function deleteVideo(): string;

    public function viewVideo();
}
