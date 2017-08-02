<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_groups';

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
    protected $fillable = ['type', 'institution', 'user_institution_id', 'user_id'];

    
}
