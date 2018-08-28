<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public function postTag()
    {
        return $this->belongsTo(PostTag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
