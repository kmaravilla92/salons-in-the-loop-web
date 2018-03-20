<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Sentinel;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $user_type = null, $extra = [])
    {

        /*if(Sentinel::getUser()){
            return $next($request);
        }

        $redirect_uri = $request->input('redirect_uri');

        switch($user_type){
            case 'client':
                switch($redirect_uri){
                    case '#/name-my-own-price':
                        return redirect(
                            route('frontsite.guests.user-registration.step-2', [
                                'type'=>'client',
                                'redirect_uri' => $redirect_uri
                            ])
                        );
                    break;
                }
            break;
        }*/

        return $next($request);
    }
}
