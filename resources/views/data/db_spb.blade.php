@extends('layouts.base')
@section('content')

    <div class="page-header">
        <h1>Data Surat Pengadaan Barang</h1>
    </div>
    <div class="col-xs-10">
        {{-- <a href="/spb">Tambah SPB</a> --}}
        <a href="/spb" class="btn btn-lg btn-success"><i class="ace-icon glyphicon glyphicon-plus"></i>Tambah SPB</a>
    </div>
    <div class="col-xs-12">
        <table class="table table-bordered table-hover" id="tabel1">
            <thead>
                <tr>
                    <th>No</th>
                    <th> Nomor Surat</th>
                    <th>Keperluan</th>
                    <th>Penerima</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1
                @endphp
                @foreach ($spb as $item)
                    <tr>
                        <th>{{$no++}}</th>
                        <th>{{$item->no_surat}}</th>
                        <th>{{$item->keperluan}}</th>
                        <th>{{$item->penerima_pejabat->nama_pejabat}}</th>
                        <th>
                            <a class="btn btn-xs btn-info" href="db_spb/{{$item->id}}/edit">
                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                            </a>
                            <form action="db_spb/hapus/{{$item->id}}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin menghapus data')">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </button>
                            </form>

                            <a href="/db_spb/{{$item->id}}/print" target="_blank" class="btn btn-success btn-xs">
                                <i class="ace-icon fa fa-print"></i>
                                Print
                            </a>

                        </th>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
