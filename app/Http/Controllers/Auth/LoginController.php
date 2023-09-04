<?php

namespace App\Http\Controllers\Auth;

use Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
{
        if(Auth::user()){
            return redirect()->intended('home');
        }

        return view('auth\login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
           ]);


           $kredensial = $request->only('email', 'password');

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            Alert::success('Sukses', 'Login Berhasil');
            return redirect()->intended('home');
        }
        $kredensial['nip']=$request->email;
        unset($kredensial['email']);
        // dd($kredensial);
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            Alert::success('Sukses', 'Login Berhasil');
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Maaf nip/Email atau Password anda Salah..!',
        ])->onlyInput('email');


    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();
    Alert::success('Info', 'Anda Telah Logout');
    return redirect('/');
}

    protected function authenticate(Request $request, $user)
    {
            // $credentials = $request->validate([
            //     'email' => ['required', 'email'],
            //     'password' => ['required'],
            // ]);

            // if (Auth::attempt($credentials)) {
            //     $request->session()->regenerate();

            //     return redirect()->intended('home');
            // } else {
            //     $credentials =['nip'=>$request->email,'password'=>$request->password];
            //     dd($credentials);
            // if (Auth::attempt($credentials)) {
            //     $request->session()->regenerate();

            //     return redirect()->intended('home');
            // }
            // }


            // // return back()->withErrors([
            // //     'email' => 'The provided credentials do not match our records.',
            // // ])->onlyInput('email');

            // $field = filter_var($request->get($this->nip()), FILTER_VALIDATE_EMAIL)
            //         ? $this->nip()
            //         : 'nip';
            //         return[
            //             $field => $request->get($this->nip()),
            //             'password' => $request->password,
            //         ];
        Alert::success('Sukses', 'Login Berhasil');
    }

    // protected function credentials(Request $request)
    // {
    //     $field = filter_var($request->get($this->nip()), FILTER_VALIDATE_EMAIL)
    //         ? $this->nip()
    //         : 'nip';
    //         return[
    //             $field => $request->get($this->nip()),
    //             'password' => $request->password,
    //         ];
    // }
}
