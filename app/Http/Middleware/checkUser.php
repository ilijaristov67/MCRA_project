<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeId = $request->route('id');
        $user = Auth::user();
        if ($routeId != Auth::id() && $user->role_id != 1) {
            return redirect()->back()->with('error', 'You do not have access to different profiles');
        }
        return $next($request);
    }
}
