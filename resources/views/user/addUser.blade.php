@extends('layouts.base')
@section('content')
<div class="page-header">
    <h1>
        Tambah Data User
    </h1>
</div>
<div class="container ">
    <form method="post" action="/akun">
        @csrf

        <div class="form-group row">
            <label for="nama_user">Nama User : </label>
            <input type="text" class="form-control  @error('nama_user') is-invalid @enderror" name="nama_user" placeholder="Nama User" id="nama_user" value="{{old('nama_user')}}" autofocus required>
            @error('nama_user')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label for="username">Username :</label>
            <input type="text" class="form-control" id="username" placeholder="Username Buat Login" name="username" value="{{old('username')}}" required>
            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group row">
            <label for="jabatan">Password :</label>
            <input type="password" class="form-control" placeholder="Password Buat Login" id="password" name="password" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button class="btn btn-primary">Submit</button>
        </div>


    </form>
</div>
@endsection
