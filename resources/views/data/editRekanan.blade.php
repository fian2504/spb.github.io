@extends('layouts.base')

@section('content')

    <div class="Page-Header">
        <h1>
            Edit Rekanan
        </h1>
    </div>

    <div>
        <form action="/rekanan/" method="POST">
            <input type="text" value="">
            <input type="text" value="">
            <input type="text" value="">
            <input type="text" value="}">
            <input type="hidden" name="__method" value="PUT">
        </form>
    </div>

@endsection
