<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleWare
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
            return redirect()->route('login');
        } elseif ($admin && auth()->user()->role_id === $admin->id) {
            return $next($request);
        } else {
            return redirect()->route('my_feedback');
        }
    }
}
