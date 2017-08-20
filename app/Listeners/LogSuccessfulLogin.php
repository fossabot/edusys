<?php

namespace EduSys\Listeners;

use EduSys\Helpers\UserHelper;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Set the user default language after successful login.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $userDefaultLanguage = UserHelper::getUserLanguage();
        Cookie::make('language', $userDefaultLanguage, 1440);

    }
}
