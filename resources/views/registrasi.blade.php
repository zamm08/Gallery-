@extends('layout')

@section('content')
    <div class="container">
        <form action="post-registrasi" class="pt-5 pb-3" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="isi username anda">
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="isi nama lengkap anda">
                @if ($errors->has('nama_lengkap'))
                    <span class="text-danger">{{ $errors->first('nama_lengkap') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="isi alamat lengkap anda"></textarea>
                @if ($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="isi email anda">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="isi password anda">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Kirim Data</button>
        </form>
    </div>
@endsection