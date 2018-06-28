<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        session()->put('previousUrl', url()->previous());
        return view('auth.login');
    }

    // override logout so cart contents remain:
    // https://github.com/Crinsane/LaravelShoppingcart/issues/253
    public function logout(Request $request)
    {
        $cart = collect(session()->get('cart'));

        $destination = \Auth::logout();

        if (!config('cart.destroy_on_logout')) {
            $cart->each(function ($rows, $identifier) {
                session()->put('cart.' . $identifier, $rows);
            });
        }

        return redirect()->to($destination);
    }

    public function redirectTo()
    {
        return str_replace(url('/'), '', session()->get('previousUrl', '/'));
    }


    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = User::where('email' ,$request->email)->first();


            if($user->role_id == 2 || $user->role_id == 1)
            {
                return redirect()->route('landing-page');
            }
                Auth::logout();
                return redirect()->back()->with('success_message','Account not verified yet!.Please wait for your account to be verified.');

        }
        return redirect()->back();
    }
}
