@extends('layouts.base')

@section('content')
    <div class="page-header">
        <h1> Tambah Data Rekanan</h1>
    </div>
    <div class="container ">
        <form method="post" action="/rekanan">
            @csrf

            <div class="form-group row">
                <label for="nama_rekanan">Nama Rekanan : </label>
                <input type="text" class="form-control" name="nama_rekanan" id="nama_rekanan">
            </div>

            <div class="form-group row">
                <label for="alamat">Alamat :</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>

            <div class="form-group row">
                <label for="npwp">NPWP :</label>
                <input type="text" class="form-control" id="npwp" name="npwp">
            </div>
            <div class="form-group row">
                <label for="owner">Owners :</label>
                <input type="text" class="form-control" id="owner" name="owner">
            </div>
            <div class="form-group row">
                <button class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
