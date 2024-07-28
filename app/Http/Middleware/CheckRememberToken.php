<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRememberToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $remember_token = $request->header("Remember-Token");
        if (empty($remember_token)) {
            return response()->json(["message" => "Unauthorized"], 401);
        }
        if (User::where("remember_token", $remember_token)->where("id", $request->route("id"))->exists()) {
            return response()->json(["message" => "Unauthorized"], 401);
        }
        return $next($request);
    }
}
