<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class CustomerLoginController extends Controller
{
    private $guard = 'customer';

    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        return view('auth.customer_login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard($this->guard)->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->remember)) {

            return back();
        }

        return redirect('/');
    }

    public function logout() {
        Auth::guard($this->guard)->logout();

        return back();
    }
}