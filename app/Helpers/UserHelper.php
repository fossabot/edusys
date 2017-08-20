<?php

namespace EduSys\Helpers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;

class UserHelper
{
    /**
     * @return string
     */
    public static function getUserLanguage()
    {
        $user = auth()->user();

        // we should always first try to use language from user settings
        if ($user != null && !empty($user->settings['language'])) {
// The locale _GET overwrites the user settings. We check if we have any
            if(Input::get('locale')){
                $settings = $user->settings;
                $settings['language'] = Input::get('locale');
                $user->settings = $settings;
                $user->save();
            }
            return $user->settings['language'];
        }

        $defaultLanguage = config('app.locale');

        // Check _GET locale
        if(Input::get('locale')){
            return (Input::get('locale'));
        }
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