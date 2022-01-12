@extends('layouts.base')

@section('content')

<div class="page-header">

    <h1>
        Edit Data Rekanan
    </h1>
</div>
<div class="container ">
    <form method="post" action="/rekanan/{{$data->id}}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="nama_rekanan">Nama Rekanan : </label>
            <input type="text" class="form-control" name="nama_rekanan" value="{{$data->nama_rekanan}}" id="nama_rekanan">
        </div>
        <div class="form-group row">
            <label for="alamat">Alamat Rekanan :</label>
            <input type="text" class="form-control" id="alamat" value="{{$data->alamat}}" name="alamat">
        </div>
        <div class="form-group row">
            <label for="npwp">NPWP :</label>
            <input type="text" class="form-control" id="npwp" value="{{$data->npwp}}" name="npwp">
        </div>
        <div class="form-group row">
            <label for="owner">Owner :</label>
            <input type="text" class="form-control" id="owner" value="{{$data->owner}}" name="owner">
        </div>

        <div>
            <button class="btn btn-primary">Submit</button>
        </div>


    </form>
</div>

@endsection
