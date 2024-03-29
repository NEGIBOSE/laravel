<?php

namespace App\Providers;

// use App\Models\ImageUpload\CloudinaryImageManager;
// use App\Models\ImageUpload\ImageManagerInterface;
// use App\Models\ImageUpload\LocalImageManager;
use Cloudinary\Cloudinary;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Cloudinary::class, function (){
            return new Cloudinary ([
                'cloud' => [
                    'cloud_name' => config('cloudinary.cloud_name'),
                    'api_key'    => config('cloudinary.api_key'),
                    'api_secret' => config('cloudinary.api_secret')
                ],
            ]);
        });
        // if ($this->app->environment('production')) {
        //     $this->app->bind(ImageManagerInterface::class,
        //     CloudinaryImageManager::class);
        // } else {
        //     $this->app->bind(ImageManagerInterface::class,
        //     LocalImageManager::class);
        // }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
