<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\Blog\CommentFactory> */
    use HasFactory;

    protected $primaryKey = "id_comment";
    protected $table = "comments";
    protected $fillable = [
        "user_id",
        "post_id",
        "comment",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Pode retornar um instancia de qualquer modelo que seja "commentable"
    // definir na claasse pai(Model) o relacionamento "morphMany"
    // public function commentable()
    // {
    //     return $this->morphTo();
    // }

    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
