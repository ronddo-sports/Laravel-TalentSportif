<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Glide\ServerFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Pour les images ( Glide )

        $this->app->singleton('League\Glide\Server', function($app) {


            return ServerFactory::create([
                'source' => storage_path('/app/image'),
                'cache' => storage_path('/app/image/.cache'),
                'cache_path_prefix' => '.cache',
                'base_url' => '/img/'
            ]);
        });

        //end glide

        if ($this->app->environment() == 'local') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }
}
