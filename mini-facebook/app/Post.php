<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    const CREATED_AT = 'creation_date';
//    const UPDATED_AT = 'last_update';

    protected $table = "posts";

    protected $fillable = [
        'post_content', 'image_path', 'post_id', 'user_id'
    ];
}
