<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecureController extends Controller
{
	public function profile(Request $request)
	{
		return $this->responseJSEND('success', 200, $request->user);
	}
}
