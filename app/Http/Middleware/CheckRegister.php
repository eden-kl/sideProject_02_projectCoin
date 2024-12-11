<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRegister
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $flag = true;
        if ($flag) {
            session()->flash('error', '暫不開放註冊');
            return redirect()->route('login.index');
        }
        return $next($request);
    }
}
