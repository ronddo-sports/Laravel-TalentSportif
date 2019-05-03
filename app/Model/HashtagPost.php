<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HashtagPost extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hashtag_posts';

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
    protected $fillable = ['id_hashtag', 'id_post', 'date_exp'];


}
