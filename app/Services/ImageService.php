<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    public static function upload($imageFile, $folderName, $width, $height)
    {
        if (is_array($imageFile)) {
            $file = $imageFile['image'];
        } else {
            $file = $imageFile;
        }

        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $extension = $file->extension();
        $fileNameToStore = $fileName . '.' . $extension;
        $resizedImage = Image::make($file)->resize($width, $height)->encode();

        Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage);

        return $fileNameToStore;
    }

    public static function uploadUser($imageFile, $folderName)
    {
        $width = 320;
        $height = 240;

        return self::upload($imageFile, $folderName, $width, $height);
    }

    public static function uploadBigThumbnail($imageFile, $folderName)
    {
        $width = 1920;
        $height = 1080;

        return self::upload($imageFile, $folderName, $width, $height);
    }

    public static function uploadMiddleThumbnail($imageFile, $folderName)
    {
        $width = 880;
        $height = 640;

        return self::upload($imageFile, $folderName, $width, $height);
    }

    public static function uploadSmallThumbnail($imageFile, $folderName)
    {
        $width = 640;
        $height = 480;

        return self::upload($imageFile, $folderName, $width, $height);
    }

    public static function uploadLogo($imageFile, $folderName)
    {
        $width = 120;
        $height = 120;

        return self::upload($imageFile, $folderName, $width, $height);
    }
}
