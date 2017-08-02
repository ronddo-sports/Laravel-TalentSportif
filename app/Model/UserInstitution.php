<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInstitution extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_institutions';

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
    protected $fillable = ['president', 'federation_id', 'user_id'];

    
}
