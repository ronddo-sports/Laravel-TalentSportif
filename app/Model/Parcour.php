<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Parcour extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parcours';

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
    protected $fillable = ['description', 'user_id'];

    public function user()
	{
		return $this->belongsTo('App\Model\User');
	}
	
}
