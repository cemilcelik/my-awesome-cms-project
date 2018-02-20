<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'laravellocalization.supportedLocales' => [
                'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
                'tr' => ['name' => 'Turkish', 'script' => 'Latn', 'native' => 'Türkçe', 'regional' => 'tr_TR'],
            ],
            'laravellocalization.useAcceptLanguageHeader' => true,
            'laravellocalization.hideDefaultLocaleInURL' => false,
            'laravellocalization.localesOrder' => [],
        ]);
    }
}
