<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $authUserRole = Auth::user()->role;

        // Check if user has the correct role
        if (($role === 'admin' && $authUserRole == 0) || ($role === 'student' && $authUserRole == 'student')) {
            return $next($request);
        }

        // admin
        if ($authUserRole == 0 && !$request->routeIs('admin')) {
            return redirect()->route('admin');
        }

        if ($authUserRole == 0 && !$request->routeIs('student.list')) {
            return redirect()->route('student.list');
        }

        if ($authUserRole == 0 && !$request->routeIs('student.add')) {
            return redirect()->route('student.add');
        }

        if ($authUserRole == 0 && !$request->routeIs('student.save')) {
            return redirect()->route('student.save');
        }

        if ($authUserRole == 0 && !$request->routeIs('subject.list')) {
            return redirect()->route('subject.list');
        }

        if ($authUserRole == 0 && !$request->routeIs('enroll.add')) {
            return redirect()->route('enroll.add');
        }

        if ($authUserRole == 0 && !$request->routeIs('enroll.add')) {
            return redirect()->route('enroll.add');
        }
        
        



        //student

        if ($authUserRole == 'student' && !$request->routeIs('student.dashboard')) {
            return redirect()->route('student.dashboard');
        }

        if ($authUserRole == 'student' && !$request->routeIs('enroll.add')) {
            return redirect()->route('enroll.add');
        }
        
        return redirect()->route('login');
    }
}
