<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviando req ajax</title>
</head>

<body>
    <form action="" name="formAjax">
        @csrf
        <input type="text" name="email" id="email">
        <p id="msgInput" style="display:none"></p>
        <button type="submit">Ok</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simple-ajax-uploader/2.6.7/SimpleAjaxUploader.min.js"></script>

    <script>
        $(function() {
            $("form[name=formAjax]").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    // pode ser passado dentro do laravel { route('nome') }
                    // serialize - pegar o formulario e pegar todos os atributos
                    // datatype o tipo de retorno esperado
                    url: "{{ route('apax-post') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#msgInput').show().text(response.message);
                        // --------------------------------
                        if (response.status) {
                            $('#msgInput').show().text(response.message);
                            setTimeout(() => {
                                window.location.href = response.route;
                            }, 1000);
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>
