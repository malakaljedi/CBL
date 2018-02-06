<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewUserWelcome;
use Mail;

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
    protected $redirectTo = '/home';

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
    protected function validator(array $data)
    {
        $toValidate=[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|integer|max:2',
            //make conditionally required:solved
            //needed to add bottom paramenters in comments for each $data item;
            'faculty' => 'required_if:user_type,==,1',
            //'faculty' =>'string|min:2|max:50',
            'org_name' => 'required_if:user_type,==,2',
            //'org_name' => 'string|min:2|max:100',
            'org_location' => 'required_if:user_type,==,2',
            //'org_location' => 'string|min:2|max:100' ,
        ];

        return Validator::make($data,$toValidate);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $create_user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_type' => $data['user_type'],
            $user_type=$data['user_type'],
        ]);
        //to get FK value;
        $pk=$create_user->id;
        if($user_type==1){
           $create_teacher=Teacher::create([
            'faculty' => $data['faculty'],
            'user_id'=>$pk,
        ]);

        }elseif($user_type==2){
            $create_partner=Partner::create([
            'org_name' => $data['org_name'],
            'org_location'=>$data['org_location'],
            'user_id'=>$pk,
        ]);
        
        }
        Mail::to($data['email'])->send(new NewUserWelcome());
        return $create_user;
    }
}
