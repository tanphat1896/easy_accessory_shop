<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class CheckLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function check(Request $request) {
        $data = [
            'email' => $request->get('username'),
            'mat_khau' => bcrypt($request->get('password'))
        ];
        if (Auth::attempt($data)) {
            return redirect('/admin');
        }
        else {
            return redirect('/');
        }
    }

    public function username() {
        return 'email';
    }
}
