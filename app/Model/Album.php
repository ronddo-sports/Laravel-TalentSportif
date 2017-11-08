<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    use SoftDeletes;

    protected $table = 'albums';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['owner_id','name_canonical','owner_table','name','del','active','user_id'];

    public function user()
	{
		return $this->belongsTo('App\Model\User');
	}
	
}
