<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('with')) {
            try {
                $result = User::with(explode(',', $request->query('with')))->get();

                return $this->responseJSEND('success', 200, $result);
            } catch (\Exception $e) {
                return $this->responseJSEND('fail', 404, null, 'Error field(s)');
                // return $this->responseJSEND('fail', 404, null, $e->getMessage());
            }
        }
        $users = User::all();
        return $this->responseJSEND('success', 200, $users);
    }

    public function view(Request $request, string $user)
    {
        $users = User::find($user);
        if ($users) {
            return $this->responseJSEND('success', 200, $users);
        }
        return $this->responseJSEND('fail', 404);
    }
}
