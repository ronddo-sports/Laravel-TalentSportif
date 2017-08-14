<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    protected $fillable = ['username', 'pseudo', 'email', 'password', 'confirmation_token',
        'remember_token', 'password_requested_at', 'last_login', 'date_naiss',
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
}
