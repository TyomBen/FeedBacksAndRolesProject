<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthClientMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Role::where('role', 'admin')->first();
        if (!auth()->check()) {
            return redirect()->route('register');
        } elseif ($admin && auth()->user()->role_id === $admin->id) {
            return redirect()->route('feedbacks');
        }
        return $next($request);
    }
}
