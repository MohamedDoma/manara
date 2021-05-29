<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Section extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
