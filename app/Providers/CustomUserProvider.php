<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 9/7/2017
 * Time: 10:36
 */

namespace App\Providers;
use App\Model\User; use Carbon\Carbon;
use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomUserProvider implements UserProvider {

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        // TODO: Implement retrieveById() method.


        $qry = User::where('id','=',$identifier);

        if($qry->count() >0)
        {
            $user = $qry->first();

           /* $attributes = array(
                'id' => $user->dj_id,
                'dj_name' => $user->dj_name,
                'password' => $user->password,
                'email' => $user->email,
                'name' => $user->first_name . ' ' . $user->last_name,
            );*/

            return $user;
        }
        return null;
    }

    /**
     * Retrieve a user by by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        // TODO: Implement retrieveByToken() method.
        $qry = User::where('id','=',$identifier)->where('remember_token','=',$token);

        if($qry->count() >0)
        {
            $user = $user = $qry->first();

            /*$attributes = array(
                'id' => $user->dj_id,
                'dj_name' => $user->dj_name,
                'password' => $user->password,
                'email' => $user->email,
                'name' => $user->first_name . ' ' . $user->last_name,
            );*/

            return $user;
        }
        return null;



    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  string $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // TODO: Implement updateRememberToken() method.
        $user->setRememberToken($token);

        $user->save();

    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {

        // TODO: Implement retrieveByCredentials() method.
        $qry = User::where('email','=',$credentials['email']);

        if($qry->count() > 0)
        {
            $user = $qry->first();
            return $user;
        }else{
            $qry = User::where('pseudo','=',$credentials['email']);
            if($qry->count() > 0)
            {
                $user = $qry->first();
                return $user;
            }
        }

        return null;


    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // TODO: Implement validateCredentials() method.
        // we'll assume if a user was retrieved, it's good

        // DIFFERENT THAN ORIGINAL ANSWER

        if($user->pseudo == $credentials['email'] || $user->email == $credentials['email'] || $user->username == $credentials['email'] )
        {
            if( Hash::check($credentials['password'], $user->getAuthPassword()))
            {

                $user->last_login = Carbon::now();
                $user->save();

                return true;
            }
        }

        return false;


    }
}