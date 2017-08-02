<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserFederation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_federations';

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
    protected $fillable = ['president', 'Organisation', 'user_organisation_id', 'user_id'];

    
}
