<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Carton extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cartons';

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
    protected $fillable = ['couleur', 'post_id', 'user_id'];

    
}
