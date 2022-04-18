<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        "content_comments",
        "created_at_time_comments",
        "id_posts",
    ];
    public $timestamps = false;
    public function post()
    {
        return $this->hasMany(Post::class, 'id_posts', 'id');
    }
}
