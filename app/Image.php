<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Image extends Model
{
    protected $fillable = ['image'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
