<?php

namespace App\DTO\Blog;

class CommentDTO
{
    public function __construct(
        protected readonly int    $user_id,
        protected readonly int    $post_id,
        protected readonly string $comment,
    ) {}

    public function all() : array
    {
        return [
            "user_id"  => $this->user_id,
            "post_id"  => $this->post_id,
            "comment"  => $this->comment,
        ];
    }
}
