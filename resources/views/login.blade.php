@extends('formlogin')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="text-center pt-5">Login</h1>
        <div class="d-flex justify-content-center">
        <form action="{{ route('post-login') }}" class="pt-5 pb-3" method="POST">
            @csrf
            <div class="form-floating mb-3" style="width: 400px">
                <input type="text" class="form-control" id="floatingInput" placeholder="isi username anda" name="username">
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
                <label for="floatingInput">Isi username anda...</label>
            </div>
            <div class="form-floating" style="width: 400px; margin-bottom: 12px;">
                <input type="password" class="form-control" id="floatingPassword" placeholder="isi password anda" name="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <label for="floatingPassword">Isi Password anda...</label>
            </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a class="btn btn-primary flex-end" href="registrasi">Daftar</a>
        </form>
        </div>
    </div>
@endsection