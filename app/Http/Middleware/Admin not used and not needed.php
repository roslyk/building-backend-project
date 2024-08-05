<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // If the user is not authenticated
        // OR the user is autenticated and not
        // 'chrisser' then deny access to admin pages
        if(auth()->user()== null || auth()->user()->username != 'chrisser'){

            return abort(403, 'access denied');

        }

        // If there is an authenticated user
        // and said name is 'chrisser' all is
        // well and the next request should be returned
        if (auth()->user()->username == 'chrisser')
        {

            return $next($request);


        }
        

        // or just:

        // if (auth()->user()?->username == 'chrisser')
        // {

        //     return $next($request);


        // }
        // else
        // {

        //     return abort(403, 'access denied');

        // }




    }
}
