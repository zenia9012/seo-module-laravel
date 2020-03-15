<?php

namespace Yevhenii\Seo;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Yevhenii\Seo\Models\Seo;
use Yevhenii\Seo\Http\Middleware\Authenticate;

class SeoServiceProvider extends ServiceProvider {

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'seo');
        $this->mergeConfigFrom(__DIR__ . '/config/seo.php', 'seo');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        app('router')->aliasMiddleware('seo-auth', Authenticate::class);

        $this->publishes([__DIR__ . '/public/css/' => public_path('vendor/seo'),], 'public');
        $this->publishes([__DIR__ . '/public/js/' => public_path('vendor/seo'),], 'public');
        $this->publishes([__DIR__ . '/database/migrations/' => database_path('migrations')]);
        $this->publishes([__DIR__ . '/resources/views/' => resource_path('views/vendor/seo')]);
        $this->publishes([__DIR__ . '/config/seo.php' => config_path('seo.php')]);

        $this->shareSeo();

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/seo.php', 'seo');

        // Register the service the package provides.
        $this->app->singleton('seo', function ($app) {
            return new Seo;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['seo'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/config/seo.php' => config_path('seo.php'),
        ], 'seo.config');

        // Publishing the views.
        $this->publishes([
            __DIR__ . '/resources/views' => base_path('resources/views/vendor/seo'),
        ], 'seo.views');
    }

    /**
     * share seo for current page
     */
    public function shareSeo()
    {
        // checking if seos table exists
        if (!Schema::hasTable('seos')) {
            return $this->shareSeoFromConfig();
        }

        // slug of page
        $slug = \Request::path();

        // get seo for page by slug
        $seo = Seo::getBySlug($slug);

        // checking if seo of current page exists
        if ($seo == null) {

            // if seo not exists get seo for main page
            $seo = Seo::getBySlug('/');
        }

        // if seo for main page not exists get seo from config
        if ($seo == null) {
            // seo from config
            return $this->ShareSeoFromConfig();
        }

        // share seo
        return view()->share([
            'seo_title' => $seo->title,
            'seo_description' => $seo->description,
            'seo_keywords' => $seo->keywords,
            'og_image' => $seo->og_image,
            'og_title' => $seo->og_title,
            'og_description' => $seo->og_description,
            'og_type' => $seo->og_type,
        ]);
    }


    /*
     * Share default SEO information
     */
    public function shareSeoFromConfig()
    {
        view()->share(config('seo'));
    }
}
