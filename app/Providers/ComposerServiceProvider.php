<?php

namespace App\Providers;

use App\Domain\ServiceCategories\Models\ServiceCategory;
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

        view()->composer(['site.header'], function ($view) {
            $serviceCategories = ServiceCategory::withTranslation()
                ->orderBy('order')->limit(5)->get();

            /**
             * @var $view \Illuminate\View\View|\Illuminate\Contracts\View\Factory
             */
            $view->with('serviceCategories', $serviceCategories);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
