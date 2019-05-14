<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

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
    protected $fillable = ['titre','titre_canonical','lieu','token',
        'tags','privacy', 'text', 'type', 'parent_id',
        'user_id'];

    public function media()
    {
        return $this->hasMany('App\Model\Media');
    }

}
