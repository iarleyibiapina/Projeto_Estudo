<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Blog\Post;
use App\Models\Blog\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // @Blog
    public function posts()
    {
        return $this->hasMany(Post::class, "id_post");
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,"id_comment");
    }

    // se eu colocar getXXXAttribute() eu consigo acessar como propriedade $user->xxx
    public function getExemploAttribute(): string
    {
        return "Valor Exemplo";
    }
}
