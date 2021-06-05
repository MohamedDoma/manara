<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Section extends Model
{
    protected $fillable = ['content'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
