<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { background-color: #f8f9fa; padding: 10px; text-align: center; border-bottom: 1px solid #ddd; }
        .content { padding: 20px; }
        .comment-box { background-color: #f1f1f1; padding: 15px; border-left: 4px solid #007bff; margin: 15px 0; font-style: italic; }
        .btn { display: inline-block; padding: 10px 20px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px; margin-top: 10px; }
        .footer { margin-top: 20px; font-size: 0.8em; color: #777; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Novo Comentário!</h2>
    </div>

    <div class="content">
        <p>Olá,</p>

        <p>O utilizador <strong>{{ $userComment->name }}</strong> acabou de deixar um comentário no seu post:</p>

        <h3>{{ $post->title }}</h3>

        <p>O comentário diz:</p>

        <div class="comment-box">
            "{{ $commentContent }}"
        </div>

        <p>Podes ver o comentário completo e responder clicando no botão abaixo:</p>

        {{-- Aqui está o link com a rota nomeada e o slug --}}
        <a href="{{ route('blog.post.findBySlug', ['slug' => $post->slug]) }}" class="btn">
            Ver Post
        </a>
    </div>

    <div class="footer">
        <p>Este é um e-mail automático do seu Blog.</p>
    </div>
</div>

</body>
</html>
