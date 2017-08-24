<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    protected $providers = [
        'Barryvdh\Debugbar\ServiceProvider'
    ];

    protected $aliases = [
        'Debugbar' => 'Barryvdh\Debugbar\Facade'
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        app()->setLocale($request->segment(1));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal() && ! empty($this->providers)) {
            foreach ($this->providers as $provider) {
                $this->app->register($provider);
            }
            if ( ! empty($this->aliases)) {
                foreach ($this->aliases as $alias => $facade) {
                    $this->app->alias($alias, $facade);
                }
            }
        }
    }
}
