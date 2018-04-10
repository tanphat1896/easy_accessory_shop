<?php
//
//namespace App\Http\Controllers\Auth;
//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
//use Auth;
////class LoginController extends Controller
////{
////    public function __construct()
////    {
////        $this->middleware('guest:user');
////    }
////    public function login(Request $request)
////    {
////        // Validate the form data
////        $this->validate($request, [
////            'email'   => 'required|email',
////            'password' => 'required|min:6'
////        ]);
////        dd($request);
////        // Attempt to log the user in
////        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
////            // if successful, then redirect to their intended location
//////            return redirect()->intended(route('admin.dashboard'));
////            return back()->with('success', 'Đăng nhập thành công');
////
////        }
////        dd($request);
////        // if unsuccessful, then redirect back to the login with the form data
////        return redirect()->back()->withInput($request->only('email', 'remember'));
////    }
////}

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin';

    public function authenticate(Request $data) {
//        dd($data);
        if (Auth::attempt([
            'email' => $data['username'],
            'mat_khau' => $data['password']
        ]))
            return $this->redirectTo('/admin');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }
}
