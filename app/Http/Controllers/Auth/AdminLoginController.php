<?php

namespace App\Http\Controllers\Auth;
use App\Helper\AuthHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }
    public function login(Request $request)
    {
        if (!strpos($request->get('email'), '@'))
        {
            // Validate the form data
            $this->validate($request, [
                'email'   => 'required',
                'password' => 'required|min:6'
            ]);
            // Attempt to log the user in
            if (Auth::guard('admin')->attempt(['username' => $request->email, 'password' => $request->password], $request->remember)) {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('admin.dashboard'));
            }
            // if unsuccessful, then redirect back to the login with the form data
            return redirect()->back()->withInput($request->only('username', 'remember'));
        }
        else
        {
            // Validate the form data
            $this->validate($request, [
                'email'   => 'required|email',
                'password' => 'required|min:6'
            ]);
            // Attempt to log the user in
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('admin.dashboard'));
            }
            // if unsuccessful, then redirect back to the login with the form data
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }

    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    private function guard() {
        return Auth::guard('admin');
    }
}
