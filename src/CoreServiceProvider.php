<?php

namespace LaraZeus\Core;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CoreServiceProvider extends PackageServiceProvider
{
    public function packageBooted(): void
    {
        // let me have my fun 🤷🏽‍
        Blade::directive('zeus', function () {
            return '<span class="text-secondary-700 group"><span class="font-semibold text-primary-600 group-hover:text-secondary-500 transition ease-in-out duration-300">Lara&nbsp;<span class="line-through italic text-secondary-500 group-hover:text-primary-600 transition ease-in-out duration-300">Z</span>eus</span></span>';
        });


        self::setThemePath('');

        View::share('theme', 'zeus::themes.' . config('zeus.theme', 'zeus'));
        App::singleton('theme', function () {
            return 'zeus::themes.' . config('zeus.theme', 'zeus');
        });
    }

    public static function setThemePath($path): void
    {
        $viewPath = 'zeus::themes.' . config('zeus.theme') . '.' . $path;
        View::share($path . 'Theme', $viewPath);
        App::singleton($path . 'Theme', function () use ($viewPath) {
            return $viewPath;
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('zeus')
            ->hasAssets()
            ->hasViews('zeus');
    }
}
