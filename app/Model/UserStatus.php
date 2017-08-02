<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_statuses';

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
    protected $fillable = ['nom', 'groupe', 'type', 'logo_url', 'enabled'];

    
}
