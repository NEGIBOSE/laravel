<?php
declare(strict_types=1);

use League\CommonMark\Environment\Environment;

if(! function_exists('image_url')) {
    function image_url(string $path): string
    {
        if (app()->environment('production')) {
            return (string) app()->make(\Cloudinary\Cloudinary::class)
            ->image($path)->secure();
        }
        return asset('storage/images/' . $path);
    }
}