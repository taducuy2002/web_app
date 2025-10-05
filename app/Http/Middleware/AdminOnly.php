<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
	public function handle(Request $request, Closure $next): Response
	{
		// $user = $request->user();
		// if (!$user || !$user->is_admin) {
		// 	abort(403);
		// }
		// return $next($request);
		if(Auth::check() && Auth::user()->is_admin === 1) {
			return $next($request);
		}
		return redirect('/')->with('error', 'Bạn không có quyền truy cập');
	}
}



