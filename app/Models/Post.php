<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        "title_posts",
        "content_posts",
        "created_at_time_posts",
        "id_users",
    ];
    public $timestamps = false;
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'id_posts', 'id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id_users', 'id');
    }
}