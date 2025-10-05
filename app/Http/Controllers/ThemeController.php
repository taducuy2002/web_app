<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ThemeController extends Controller
{
	public function home(): View
	{
		return view('theme.home');
	}
}



