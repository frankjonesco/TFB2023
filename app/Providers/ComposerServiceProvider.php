<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // // Using class based composers...
        // View::composer(
        //     'profile', 'App\Http\ViewComposers\ProfileComposer'
        // );
 
        // // Using Closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });

        $this->globalThings();
    }

    private function globalThings()
    {
        // view()->composer(array('*.*'),function($view){
        //     //get the data however you want it!
        //     $view->with('global', Setting::find(1));
        // });
        $settings = Setting::find(1);
        Config::set(['color_theme_id' => $settings->color_theme_id]);
        Config::set(['date_format' => $settings->date_format]);
        Config::set(['time_format' => $settings->time_format]);
    }
}
