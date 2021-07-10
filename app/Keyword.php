<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Keyword extends Model
{
    public $fillable = ['word','content'];
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
