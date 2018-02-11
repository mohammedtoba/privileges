<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Departments;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    public function ShowRegForm(){
        $dep = Departments::where('dept_actv','Y')->get();
    
        return view ("auth.register",['dept' => $dep]); 
        }

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';

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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'empno' => 'required|integer|max:99999|unique:users',
            'usrtype' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'depno' => 'required|string',
            'password' => 'required|string|min:6',
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
        $user = User::create([
            'name' => $data['name'],
            'name_ar' => $data['name_ar'],
            'empno' => $data['empno'],
            'usrtype' => $data['usrtype'],
            'depno' => $data['depno'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
/**
 * undocumented constant
 **/
            //dd($user->id );
        if ( $data['usrtype']== 'M') {
                $user->MedicalStaff()->create([                          
                    'first_name' => $data['name'],
                    'family_name' => $data['name_ar'],
                    'user_id' => $user->id,
                    'empno' => $data['empno'],                          
                    'depno' => $data['depno'],
                    'med_actv' => 'I',
                ]);}
                return $user;
            }
}
    
