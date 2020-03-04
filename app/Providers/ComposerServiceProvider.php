<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin.menu-left'], function ($view) {
            if (\LaravelLocalization::getCurrentLocale() == 'ru') {
                $current_route_name = \Request::segment(1);
            } else {
                $current_route_name = \Request::segment(2);
            }
            /**
             * @var $view \Illuminate\View\View|\Illuminate\Contracts\View\Factory
             */
            $view->with('current_route_name', $current_route_name);
        });
    }
}
