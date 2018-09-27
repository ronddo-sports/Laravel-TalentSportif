<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,Messagable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $dates = ['last_login', 'date_naiss', 'created_at'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'pseudo','username_canonical', 'email', 'password', 'confirmation_token',
        'remember_token','api_token', 'password_requested_at', 'last_login', 'date_naiss',
        'description', 'discipline', 'tel', 'pays', 'ville', 'adresse', 'status'
        , 'discr', 'salt', 'enabled', 'group_id', 'user_status_id'];

    protected $hidden = [
        'password', 'remember_token','confirmation_token'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach ($roles as $ro){
                if($this->hasRole($ro)){
                    return true;
                }
            }
        }elseif($this->hasRole($roles)){
            return true;
        }

        return false;
    }

    public function hasRole($role)
    {
        if (is_string($role)){
            return $this->roles->contains('name',$role);
        }
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return [];
    }
}
