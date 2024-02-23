@extends('layout')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        {{ isset(auth()->user()->username) ? 'Welcome, '.auth()->user()->nama_lengkap.' di web gallery' : 'belum login, login dulu'; }}
    </div>
@endsection