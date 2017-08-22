<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\UserFederationController;
use App\Model\Role;
use App\Model\UserFederation;
use App\Model\UserGroup;
use App\Model\UserInstitution;
use App\Model\UserOrganisation;
use App\Model\UserSportif;
use App\Model\UserStatus;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
        //dd('valdi');
        return Validator::make($data, [
            'username' => 'required|unique:users|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'discipline' => 'required|string',
            'pseudo' => 'required|string|min:4|unique:users',
            //'status_id' => 'required|numeric',
            'date_naiss' => 'required|date',
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
//dd('ici creat');

        $default_role = Role::where('name','client')->first();

        $user = User::create([
            'username' => $data['username'],
            'username_canonical' => str_replace(' ','_',$data['username']).'_'.str_replace(' ','_',$data['pseudo']),
            'email' => $data['email'],
            'discipline' => $data['discipline'],
            'pseudo' => $data['pseudo'],
            'user_status_id' => $data['status_id'],
            'password' => bcrypt($data['password']),
            'date_naiss' => $data['date_naiss'],
            'discr' => $data['discr'],
        ]);
        switch ($data['status_id']){
            case 0:
                UserSportif::create(['user_id'=>$user->id]);
                break;
            case 2:
               // dd('centre');
                UserGroup::create(['user_id'=>$user->id]);
                break;
            case 3:
               // dd('aggent');
                //UserManager::create(['user_id'=>$user->id]);
                break;
            case 4:
                //dd('organisatio');
                UserOrganisation::create(['user_id'=>$user->id]);
                break;
            case 5:
               // dd('federation');
                UserFederation::create(['user_id'=>$user->id]);
                break;
            case 5:
               // dd('istitution');
                UserInstitution::create(['user_id'=>$user->id]);
                break;
        }
        $user->roles()->attach($default_role);
        return $user;
    }
    /*
     * Customized to return to first step if id is not valid
     */
    public function showRegistrationForm($id = null)
    {
        $qry = UserStatus::where('id','=',$id);
        if ($qry->count() > 0){
            $status = $qry->first();
            return view('auth.register', compact('status'));
        }
        return view('auth.register_1');
    }
}
