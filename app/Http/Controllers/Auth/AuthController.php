<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectTo = ('/events');

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');

        $this->middleware('guest', ['except' => ['login','logout','getLogout']]);
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

            'user_name' => array( 'required', 'regex: /^[a-z0-9_-]{4,16}$/','unique:users'),
            'first_name' => ' required | alpha | between: 2,40',
            'last_name'  => ' required | alpha | between: 2,40',
            'Zip_code' => 'required | numeric | exists:cities,postal_code',
            'email' => 'required|email|max:255|unique:users',
            'password' => array(
                                'required',
                                'confirmed',
                                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,16}$/'
                                )
        ]);
    }

    protected function messages()
    {
        return [

            'password.regex' => 'Password should be a 8 - 16 characters, include one upper case letter,
            one lower case and one symbol',
            'Zip_code.min' => 'Not a valid Zip code'
        ];
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $zip = DB::table('cities')->where('postal_code' ,'=', $data['Zip_code'])->pluck('id');



        return User::create([

            'user_name' => $data['user_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'city_id' => $zip[0],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);


    }








}
