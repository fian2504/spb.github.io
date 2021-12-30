@extends('layouts.base')

@section('content')

    <div class="page-header">
        <h1>Data Rekanan</h1>
    </div>
    <div class="col-xs-10">
        <a href="/rekanan/tambah">Tambah Rekanan</a>
    </div>

    <div class="col-xs-12">
        <table class="table  table-bordered table-hover">
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
               @foreach ($rekanan as $rekanan)
                   <tr>
                       <th>{{$no++}}</th>
                       <th>{{$rekanan->nama_rekanan}}</th>
                       <th>{{$rekanan->alamat}}</th>
                       <th>{{$rekanan->npwp}}</th>
                       <th>{{$rekanan->owner}}</th>
                       <th>

                            <a href="rekanan/edit/{{$rekanan->id_rekanan}}  "><button class="btn btn-xs btn-info">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                            </button></a>
                            <a href="rekanan/hapus" class="delete" data-confirm="Are you sure to delete this item?"><button class="btn btn-xs btn-danger">
                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                            </button></a>

                        </th>
                   </tr>
               @endforeach
           </tbody>


        </table>
    </div>


    {{-- <div class="container">
        @foreach ($rekanan as $user)
            {{ $user->id_rekanan }}
        @endforeach
    </div>

    {{ $rekanan->links() }} --}}
<script>
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
</script>

@endsection
