<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Contracts\Auth\Guard;

class CatMiddleware
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->tipo) {
            case '4':
                return $next($request);
                break;
            
            default:
                return redirect("/");
        }
    }
}
