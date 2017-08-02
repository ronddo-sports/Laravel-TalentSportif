<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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

        /*$this->app->singleton('League\Glide\Server', function($app) {
            $storageDriver = Storage::getDriver();

            return ServerFactory::create([
                'source' => $storageDriver,
                'cache' => $storageDriver,
                'cache_path_prefix' => '.cache',
                'base_url' => '/img/'
            ]);
        });*/

        //end glide

        if ($this->app->environment() == 'local') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }
}
