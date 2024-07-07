<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageHelper{
    public static function upload(UploadedFile $file, $path){
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $filepath = $file->storeAs($path, $filename, 'public');

        return $filepath;
    }
}