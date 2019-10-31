<?php

namespace App\Http\Middleware;

use App\Model\Chotel\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //dd(Auth::user()->username);
        //Get role of current user
        $obj_role = new Role();
        $role_current = $obj_role->getRoleById(Auth::user()->role_id)->role;
        //dd($role);

        if (strpos($role, $role_current) === false) {
            return redirect()->route('admin.user.index')->with('error', 'Ban khong co quyen');
        }
        return $next($request);
    }
}
