<?php

namespace EduSys\Providers;

use EduSys\Helpers\UserHelper;
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
        view()->composer('*', function ($view) {
            $language = UserHelper::getUserLanguage();
            $textDirection = $language == 'ar' ? 'rtl':'ltr';

            // Share the language and dir variables on all views
            view()->share('language', $language);
            view()->share('dir', $textDirection);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
