@extends('layouts.base')

@section('content')

    <div class="page-header">
        <h1>Data Rekanan</h1>
    </div>
    <div class="col-xs-10">
        <a href="/rekanan/tambah">Tambah Rekanan</a>
    </div>

    <div class="col-xs-12">
        <table class="table table-bordered table-hover" id="tabel1">
           <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Rekanan</th>
                    <th>Alamat rekanan</th>
                    <th>NPWP</th>
                    <th>Owners</th>
                    <th>Action</th>

                </tr>
           </thead>
           <tbody>
               @php
                   $no = 1
               @endphp
               @foreach ($rekanan as $rek)
                   <tr>
                       <th>{{$no++}}</th>
                       <th>{{$rek->nama_rekanan}}</th>
                       <th>{{$rek->alamat}}</th>
                       <th>{{$rek->npwp}}</th>
                       <th>{{$rek->owner}}</th>
                       <th>
                            <a href="rekanan/edit/{{$rek->id}}  "><button class="btn btn-xs btn-info">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                            </button></a>
                            <form action="rekanan/hapus/{{$rek->id}}" method="post">
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

    {{-- <div class="text-center">
        {{ $rekanan->links() }}
    </div> --}}

@endsection

@section('customjs')
<script>
    jQuery(function($) {
        var tableId = '#tabel1'
        var $_table = $(tableId).DataTable()
    })
</script>
@endsection
