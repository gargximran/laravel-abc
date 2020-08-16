<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }




    public function showRegistrationForm()
    {
        $getAllUser = User::orderBy('id','asc')->where('role',1)->get();

        if( count($getAllUser) == NULL ){
        return view('auth.register');
        }else{
            return redirect()->route('login');
        }
    }





    public function superAdminRegister(Request $request){

        $getAllUser = User::orderBy('id','asc')->where('role',1)->get();

        if( count($getAllUser) == NULL ){
            $request->validate(
                [
                    'name' => 'required',
                ],
                [
                    'email' => 'required',
                ],
                [
                    'password' => 'required',
                ],
                [
                    'password_confirmation' => 'required',
                ],
                [
                    'role' => 'required',
                ]
            );

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role'      => $request['role'],
            ]);
            return redirect()->intended('/login');
        }
        else{
            return redirect()->route('register')->with('registerFailed', 'You can not register more than one super admin');
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
            'role' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
