<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function showRegister(): View
	{
		return view('client.user.register');
	}

	public function register(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'email', 'max:255', 'unique:users,email'],
			'password' => ['required', 'string', 'min:6', 'confirmed'],
			'account_level' => 'normal',
		]);

		$user = User::create([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'password' => Hash::make($validated['password']),
		]);

		Auth::login($user, true);
		return redirect()->route('home');
	}

	public function showLogin(): View
	{
		return view('client.user.login');
	}

	public function login(Request $request): RedirectResponse
	{
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required', 'string'],
			'remember' => ['nullable'],
		]);

		$remember = (bool) $request->boolean('remember');
		if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remember)) {
			$request->session()->regenerate();
			return redirect()->route('home');
		}

		return back()->withErrors([
			'email' => 'Thông tin đăng nhập không đúng.',
		])->onlyInput('email');
	}

	public function logout(Request $request): RedirectResponse
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('home');
	}
}



