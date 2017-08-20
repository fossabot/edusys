<?php

namespace Prexle\Helpers;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;

class UserHelper
{
    /**
     * @return string
     */
    public static function getUsersLanguage()
    {
        $user = auth()->user();

        // we should always first try to use language from user settings
        if ($user != null && !empty($user->settings['language'])) {
            return $user->settings['language'];
        }

        $defaultLanguage = config('app.locale');

        // check if user has language cookie
        if (Cookie::has('language')) {
            return Cookie::get('language');
        }

        // determine users country by IP and try to get language by country code
        $location = \GeoIP::getLocation();
        $countryCode = strtolower($location->iso_code);
        $mapKey = 'countryLanguage.' . $countryCode;

        return config($mapKey, $defaultLanguage);
    }
}