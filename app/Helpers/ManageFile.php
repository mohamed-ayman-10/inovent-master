<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ManageFile
{

    public static function uploadImage($disk, $path, $file)
    {
        return Storage::disk($disk)->put($path, $file);
    }

    public static function deleteImage($disk, $file)
    {
        return Storage::disk($disk)->delete($file);
    }
}
