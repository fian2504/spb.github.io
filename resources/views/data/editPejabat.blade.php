@extends('layouts.base')
@section('content')
{{-- {{dd($pejabat);}} --}}
<div class="page-header">

    <h1>
        Edit Data Pejabat
    </h1>
</div>
<div class="container ">
    <form method="post" action="/pejabat/{{$data->id}}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="nip">Nip Pejabat : </label>
            <input type="text" class="form-control" name="nip" value="{{$data->nip}}" id="nip">
        </div>
        <div class="form-group row">
            <label for="nama_pejabat">Nama Pejabat :</label>
            <input type="text" class="form-control" id="nama_pejabat" value="{{$data->nama_pejabat}}" name="nama_pejabat">
        </div>

        <div class="form-group row">
            <label for="jabatan">Jabatan :</label>
            <input type="text" class="form-control" id="jabatan" value="{{$data->jabatan}}" name="jabatan">
        </div>

        <div>
            <button class="btn btn-primary">Submit</button>
        </div>


    </form>
</div>
@endsection
