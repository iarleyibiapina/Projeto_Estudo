@extends('Blog.master')

@section('header-intro')
    <div class="mb-4">
        <h1 class="fw-bold mb-3">Login</h1>
    </div>
@endsection

@section('main')
    <div class="col-lg-6 col-md-8 mx-auto">
        <form method="POST" action="{{ route('blog.auth.login') }}">
            @csrf

            <div class="mb-2">
                @if(session('password'))
                    <p class="text-danger">{{ session('password') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <p class="text-danger">{{ $errors->first('email') }}</p>
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <p class="text-danger">{{ $errors->first('password') }}</p>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
