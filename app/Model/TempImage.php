<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TempImage extends Model
{
    protected $table = "temp_images";

    protected $fillable = ["url",'deleted','user_id'];

    protected $dates = ['created_at','updated_at'];
}
