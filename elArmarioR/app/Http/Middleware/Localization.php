<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/* Esto archivo Localization.php creado nuevo.

TUTORIAL COMPLETO: 
https://lokalise.com/blog/laravel-localization-step-by-step/
https://github.com/lokalise/lokalise-tutorials/tree/main/laravel-i18n
*/
class Localization
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}
