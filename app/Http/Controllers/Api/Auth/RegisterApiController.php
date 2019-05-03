<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\UserFederationController;
use App\Model\Album;
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

class RegisterApiController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getStatuses()
    {
        $stats = UserStatus::where('enabled','=', true)
            ->get();
       return response()->json($stats);
    }


    protected function create(array $data)
    {
//dd('ici creat');

        $default_role = Role::where('name','client')->first();
        $canonical = str_replace(' ','_',strtolower($data['username'])).'_'.str_replace(' ','_',strtolower($data['pseudo']));
        $user = User::create([
            'username' => $data['username'],
            'username_canonical' => $canonical,
            'email' => $data['email'],
            'api_token'=> $canonical.str_random(10),
            'discipline' => $data['discipline'],
            'pseudo' => $data['pseudo'],
            'user_status_id' => $data['status_id'],
            'password' => bcrypt($data['password']),
            'date_naiss' => $data['date_naiss'],
            'discr' => $data['discr'],
        ]);

        Album::create(['owner_id'=>$user->id,'owner_table'=>'users',
            'name'=>'uploads','name_canonical'=>'uploads_'.str_random(10)]);
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
            case 6:
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
            return view('Auth.register', compact('status'));
        }
        return view('Auth.register_1');
    }
}
