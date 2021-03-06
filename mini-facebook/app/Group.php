<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";

    protected $fillable = [
        'user_ids', 'name', 'group_avatar'
    ];
}
