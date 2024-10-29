<?php

namespace App\Http\Middleware;

use App\LogAcesso;
use Closure;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {
        //dd($request);
        $ip = $request->ip();
        $rota = $request->server('REQUEST_URI');
        LogAcesso::create(['log'=>"O ip $ip Acessou a rota $rota"]);
        return $next($request);
    }
}
