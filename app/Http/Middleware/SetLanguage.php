<?php

namespace EduSys\Http\Middleware;

use Closure;
use EduSys\Helpers\UserHelper;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $language = UserHelper::getUserLanguage();

        App::setLocale($language);

        return $next($request);
    }
}
