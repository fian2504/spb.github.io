
@extends('layouts.base')

@section('content')
    <div class="page-header">
        <h1>List User</h1>
    </div>
    <div class="col-xs-10">

        <a href="/akun/tambah" class="btn btn-lg btn-success"><i class="ace-icon glyphicon glyphicon-plus"></i>Tambah User</a>
    </div>
    <div class="col-xs-12">
        <table class="table table-bordered table-hover" id="tabel1">
            <thead>
                <tr>
                    <th class="text-center"> No</th>
                    <th class="text-center"> Nama</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1
                @endphp
                @foreach ($user as $item)
                    <tr>
                        <th>{{$no++}}</th>
                        <th>{{$item->name}}</th>
                        <th>{{$item->email}}</th>
                        <th>
                            <a href="pejabat/edit/{{$item->id}}  "><button class="btn btn-xs btn-info">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                            </button></a>
                            <form action="pejabat/hapus/{{$item->id}}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin menghapus data')">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </button>
                            </form>
                        </th>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('customjs')
<script>
    jQuery(function($) {
        var tableId = '#tabel1'
        var $_table = $(tableId).DataTable()
    })
</script>
@endsection


