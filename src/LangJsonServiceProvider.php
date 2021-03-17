<?php

namespace Maksuco\LangJson;

use Illuminate\Support\ServiceProvider;

class LangJsonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->mergeConfigFrom(__DIR__ . '/config/langjson.php', 'langjson');

        $this->loadViewsFrom(__DIR__.'/views', 'langJsonViews');
        //$this->loadViewsFrom(app_path('vendors/maksuco/langjson/src/views'), 'langJsonViews');

        $this->publishes([
            __DIR__ . '/config/langjson.php' => config_path('langjson.php'),
            //__DIR__ . '/views' => resource_path('views/vendor/langjson')
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('langjson', function () {
          return new LangJson();
        });
    }
}
