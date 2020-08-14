<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $user = Auth::user();
        $route = $request->route()->getName();
        $user->can($route);
        // if($user->cant($route)){
        //     return redirect()->route('admin.error',['code' => 403]);
        // };

        return $next($request);
    }
}
