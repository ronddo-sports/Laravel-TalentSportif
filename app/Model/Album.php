<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Album extends Model
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    use SoftDeletes;

    protected $table = 'albums';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $dates = ['created_at','updated_at','parent_id','deleted_at'];

    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','name_canonical','auto_generated','user_id','post_id','active'];

    public function user()
	{
		return $this->belongsTo('App\Model\User');
	}
	
}
