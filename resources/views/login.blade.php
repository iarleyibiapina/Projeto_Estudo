@extends('index')

@section('content')
<h2>Criar Login</h2>
<a href="{{ route('index') }}">voltar</a>


@if(!auth()->check()) 

<div class="messageErrorRequest false-alert"></div>

<h2>ABA DE LOGIN</h2>
    @error('error')
        <span>{{ $message }}</span>
    @enderror
    <form name="formAJAX" >
        @csrf
        <input type="text" id="email" name="email" value="um@um.com">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <input type="password" id="password" name="password" value="admin">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">Enviar</button>
    </form>

    <script>
        $(function(){
            $('form[name="formAJAX"]').submit(function(event){
                event.preventDefault();

                if($('#email').val() == ''){
                    alert('Email não informado');
                    return;
                }
                if($('#password').val() == ''){
                    alert('password não informado');
                    return;
                }
                    



                $.ajax({
                    url: "{{ route('login.store') }}",
                    type: "post",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response){
                        alert(response.message)
                        
                        if(response['success'] === true){
                            setTimeout(() => {
                                window.location.href = response['route'];
                            }, 2000);
                        } 
                            
                    }
                });
            })
        });

        function alert(msg){
            $('.messageErrorRequest').removeClass("false-alert").html(msg);
        }
    </script>

@endif
@endsection