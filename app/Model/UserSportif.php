<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserSportif extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_sportifs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category', 'club_actuel', 'poid', 'taille', 'poste', 'user_id', 'user_manager_id', 'user_group_id'];

    
}
