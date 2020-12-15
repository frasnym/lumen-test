<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $result = User::all();
        return response($result);
    }

    public function view(Request $request, string $user)
    {
    }
}
