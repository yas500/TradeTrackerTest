<?php

namespace Mg\TradeTracker\Providers;

use Illuminate\Support\ServiceProvider;

class TradeTrackerServiceProvider extends ServiceProvider
{

    /**
     * boot package 
     */
    public function boot()
    {
        $this->loadRoutesFrom(mg_config_path('routes.php'));
        $this->loadViewsFrom(mg_path('views'), 'tradetracker');

        $this->publishes([
            mg_config_path('config.php') => config_path('tradetracker.php'),
            mg_path('views') => resource_path('views/vendor/tradetracker'),
            mg_path('theme/app') => mg_public_path()], 'tradetracker');
    }

}
