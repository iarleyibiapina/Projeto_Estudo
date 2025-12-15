<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\Blog\PostFactory> */
    use HasFactory;

    protected $primaryKey = "id_post";
    protected $table = "posts";
    protected $fillable = [
        "user_id",
        "title",
        "slug",
        "thumbnail",
        "content",
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id", "id");
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,"post_id");
    }
}
