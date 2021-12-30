@extends('layouts.base')

@section('content')
<div class="page-header">
    <h1>
        Tambah Data Pejabat
    </h1>
</div>
<div class="container ">
    <form method="post" action="/pejabat">
        @csrf

        <div class="form-group row">
            <label for="nip">Nip Pejabat : </label>
            <input type="text" class="form-control" name="nip" placeholder="00000000 000000 0 000" id="nip">
        </div>
        <div class="form-group row">
            <label for="nama_pejabat">Nama Pejabat :</label>
            <input type="text" class="form-control" id="nama_pejabat" name="nama_pejabat">
        </div>

        <div class="form-group row">
            <label for="jabatan">Jabatan :</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan">
        </div>
        <div>
            <button class="btn btn-primary">Submit</button>
        </div>


    </form>
</div>
@endsection
