<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhotoProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photo_profiles';

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
    protected $fillable = ['discr', 'del', 'active', 'user_id'];

    public function user()
	{
		return $this->belongsTo('App\Model\User');
	}
	
}
