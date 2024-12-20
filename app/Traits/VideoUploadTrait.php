<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait VideoUploadTrait
{
    /**
     * Uploads a video to the specified disk and folder.
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param string $disk
     * @return string The path of the uploaded video
     */
    public function uploadVideo(UploadedFile $file, string $folder = 'videos', string $disk = 'public'): string
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $filename, $disk);
    }

    /**
     * Deletes a video from the storage.
     *
     * @param string $filePath
     * @param string $disk
     * @return bool
     */
    public function deleteVideo(string $filePath, string $disk = 'public'): bool
    {
        if (Storage::disk($disk)->exists($filePath)) {
            return Storage::disk($disk)->delete($filePath);
        }
        return false;
    }

    /**
     * Get the full URL of a video file.
     *
     * @param string $filePath
     * @param string $disk
     * @return string
     */
    public function getVideoUrl(string $filePath, string $disk = 'public'): string
    {
        return Storage::disk($disk)->url($filePath);
    }
}
