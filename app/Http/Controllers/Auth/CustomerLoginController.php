<?php

namespace App\Http\Controllers\Auth;

use App\Acme\Repository\Cart\CartRepository;
use App\Helper\FrontendHelper;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CustomerLoginController extends Controller {

    public function __construct() {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function showLoginForm() {
        return view('auth.customer_login');
    }

    public function login(Request $request) {

        //$this->validateLogin($request);

        if (! $this->attemptLogin($request))
            return redirect('/')->with('error', 'Sai tài khoản hoặc mật khẩu!');

        FrontendHelper::migrateToMemberCart();

        return $this->sendLoginResponse($request);
    }

//    private function validateLogin(Request $request) {
//        $this->validate($request, [
//            'email' => 'required|email',
//            'password' => 'required|min:6'
//        ]);
//    }

    private function attemptLogin(Request $request) {
        return ($this->guard()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]) || $this->guard()->attempt([
                'username' => $request->email,
                'password' => $request->password
            ]));
    }

    private function sendLoginResponse(Request $request) {
        $request->session()->regenerate();

        return back();
    }

    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    private function guard() {
        return Auth::guard('customer');
    }
}