<?php

namespace App\DTO\Blog;

use Str;

class PostDTO
{
    public function __construct(
        protected readonly int    $user_id,
        protected readonly string $title = "Titulo não informado",
        protected readonly string $thumbnail,
        protected readonly string $content = "Sem conteudo",
    ) {}

    public function all() : array
    {
        return [
            "user_id"  => $this->user_id,
            "title"    => $this->title,
            "slug"     => Str::slug($this->title),
            "thumbnail"=> $this->thumbnail,
            "content"  => $this->content,
        ];
    }
}
