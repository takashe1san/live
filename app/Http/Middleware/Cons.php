<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ConsController;
use App\Models\Consultation;
use Closure;
use Illuminate\Http\Request;

class Cons
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $order = Consultation::where('con_id', $request->id)->first();
        if($order->username != session('info.username')){
            return redirect(route('showcon'));
        }
        return $next($request);
    }
}
