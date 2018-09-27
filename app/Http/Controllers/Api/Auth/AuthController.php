<?php

namespace App\Http\Controllers\Api\Auth;

use App\Model\Role;
use App\Model\User;
use App\Model\UserFederation;
use App\Model\UserGroup;
use App\Model\UserInstitution;
use App\Model\UserOrganisation;
use App\Model\UserSportif;
use App\Model\UserStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('Auth:api', ['except' => ['login']]);
    }


    public function login(Request $request)
    {
        $credentials = (array)json_decode($request->data);
        $qry = User::where('email','=',$credentials['email'])
            ->orWhere('username','=',$credentials['email'])
            ->orWhere('pseudo','=',$credentials['email']);
        if($qry->count())
        {
            $user = $qry->first();
            if( Hash::check($credentials['password'], $user->password))
            {

                $user->last_login = Carbon::now();
                $user->save();
                $user->photo_url = profilePicFromUserId($user->id);
                $user->baniere_url = banierePicFromUserId($user->id);

                return response()->json(['user'=>$user]);
            }
        }

       return response()->json(['error'=>'Bad credentials']);
    }

    public function getStatus()
    {
        $status = UserStatus::where('enabled','=',true)->get();
        return response()->json(['status'=> $status]);
    }


    public function verifyUnique(Request $request)
    {
        $credentials = (array)json_decode($request->data);
        if(isset($credentials['email'])){
            $qry = User::where('email','=',$credentials['email']);
        }elseif (isset($credentials['pseudo'])){
            $qry = User::where('pseudo','=',$credentials['pseudo']);
        }
        if (isset($qry) && $qry->count()){
            return response()->json(['resp'=>true]);
        }
        return response()->json(['resp'=>false]);
    }

    public function Register(Request $request)
    {
        $credentials = (array)json_decode($request->data);
       $user = (array)$credentials['user'];
        $status = (array)$credentials['status'];
        $default_role = Role::where('name','=','client')->first();

        $user_cr = User::create([
            'username' => $user['username'],
            'username_canonical' => str_replace(' ','_',$user['username']).'_'.str_replace(' ','_',$user['pseudo']),
            'email' => $user['email'],
            'api_token' => str_replace(' ','_',$user['username']).'_'.str_random(10),
            'discipline' => $user['discipline'],
            'pseudo' => $user['pseudo'],
            'user_group_id' => $status['groupe'],
            'user_status_id' => $status['id'],
            'password' => bcrypt($user['password']),
            'date_naiss' => $user['date_naiss'],
            'discr' => 'user',
        ]);

        switch ($status['groupe']){
            case 0:
                UserSportif::create(['user_id'=>$user_cr->id]);
                break;
            case 2:
                // dd('centre');
                UserGroup::create(['user_id'=>$user_cr->id]);
                break;
            case 3:
                // dd('aggent');
                //UserManager::create(['user_id'=>$user->id]);
                break;
            case 4:
                //dd('organisatio');
                UserOrganisation::create(['user_id'=>$user_cr->id]);
                break;
            case 5:
                // dd('federation');
                UserFederation::create(['user_id'=>$user_cr->id]);
                break;
            case 6:
                // dd('istitution');
                UserInstitution::create(['user_id'=>$user_cr->id]);
                break;
        }
        $user_cr->roles()->attach($default_role);
        $user_cr->last_login = Carbon::now();
        $user_cr->save();
        $user_cr->photo_url = profilePicFromUserId($user_cr->id);
        $user_cr->baniere_url = banierePicFromUserId($user_cr->id);

        return response()->json(['user'=>$user_cr]);
    }
}
