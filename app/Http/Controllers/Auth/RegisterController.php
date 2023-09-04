<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index()
    {
        return view('auth\register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|unique:users',
            'name' => 'required',
            'email'  => 'required|unique:users|email:dns',
            'password' => 'required|min:8|max:255',
            'nohp' => 'required|unique:users',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        Alert::success('Sukses', 'Register Berhasil');
        return redirect()->route('home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'string', 'max:255','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'nohp' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nip' => $data['nip'],
            'name' => $data['name'],
            'nohp' => $data['nohp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
