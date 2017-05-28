<?php

namespace App\Http\Middleware;
use Alert;
use Closure;
use Illuminate\Support\Facades\Auth;

class MustInventory
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
      $user = $request->user();
      $classUser = Auth::user()->class;
      if ($user && $classUser == '2'||$classUser == '4') {
        return $next($request);
      }
      Alert::error('คุณไม่มีสิทธิการใช้งานหน้านี้');
      return back();
    }
}
