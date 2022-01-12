@extends('layouts.base')

@section('content')
{{-- {{dd($date->translatedFormat('Y'));}} --}}


{{-- ERROR --}}
    <div class="page-header">
        <h1>
            Edit Surat Pesanan Barang
        </h1>
    </div>
        @php
            $no = $spb->no_surat;
            $split = explode('/',$no);
        @endphp

    <div class="container ">
        <form method="post" action="/db_spb">
            @csrf
            <div class="form-group row"> {{-- Nomor Surat --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="sbd"> Nomor Surat</label>
                <div class="col-sm-1">
                    <input type="text" title="Nomor Surat Terakhir" class="form-control" name="nomor" placeholder="000" id="nomor" value="{{$split[0]}}" >
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="sp" placeholder="SP" value="{{$split[1]}}" id="sp">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="tki" placeholder="C" value="{{$split[2]}}" id="tki">
                </div>
                <div class="col-sm-1">
                    <input type="text" title="Tanggal Pembuatan" class="form-control" name="tgl_surat" placeholder="Tanggal" id="tgl_surat" value="{{$split[3]}}">
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="thn_surat" placeholder="Tahun" id="thn_surat" value="{{$split[4]}}">

                </div>
            </div>
            <div class="form-group row"> {{-- Form Kepada --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="kepada"> Kepada</label>
                <div class="col-sm-4">
                    <select name="rekanan_nama" class="chosen-select form-control" id="kepada" data-placeholder="Rekanan" onchange="set_alamat()">
                        <option value="{{$spb->kepada_rekanan->id}}">{{$spb->kepada_rekanan->nama_rekanan}}</option>
                            @foreach ($rekanan as $rekanan)
                                <option value="{{$rekanan->id}}">{{$rekanan->nama_rekanan}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="col-sm-4">
                    <input name="rekanan_alamat" type="text" class="form-control" id="alamat" value="{{$spb->kepada_rekanan->alamat}}">
                </div>
            </div>

            <div class="form-group row"> {{-- Penerimaan Barang --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="pb"> Penerima Barang</label>
                <div class="col-sm-4">
                    <select name="penerima_nama" class="chosen-select form-control" id="pb" onchange="set_nip(this, 'nip_0')">
                        <option value="{{$spb->penerima_pejabat->id}}">{{$spb->penerima_pejabat->nama_pejabat}}</option>
                        @foreach ($pejabat as $pej)
                            <option value="{{$pej->id}}">{{$pej->nama_pejabat}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <input name="penerima_nip" type="text" class="form-control" disabled=True id="nip_0" value="{{$spb->penerima_pejabat->nip}}">
                </div>
            </div>

            <div class="form-group row"> {{-- Keperluan --}}

                <label for="kpln" class="col-sm-3 col-form-label-sm text-right"> Keperluan</label>
                <div class="col-sm-8">
                    <input name="keperluan" type="text" id="kpln" class="form-control @error('kpln') is-invalid @enderror" placeholder="Keperluan" value="{{$spb->keperluan}}">
                </div>
            </div>

            {{-- <div class="form-group row"> text 1 --}}

                {{-- <label for="text1" class="col-sm-3 col-form-label-sm text-right"> text1</label>
                <div class="col-sm-8" >
                    <textarea name="text1" id="text1" class="col-sm-8" style="width: 100%" rows="3">Pembayaran akan dilaksanakan setelah barang-barang yang dipesan diterima oleh penyimpan / pengurus barang unit Dinas Kominfo Kabupaten Karanganyar, dengan ketentuan sebagai berikut :</textarea>
                </div>
            </div> --}}

            <div class="form-group row"> {{-- Tanggal Pengiriman --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="tgl_pngrmn"> Tanggal Pengiriman</label>
                <div class="col-sm-8">
                    <div class="col-sm-8">
                        <input type="date" name="tgl_pengiriman" id="tgl_pngrmn" value="{{$spb->tgl_pengiriman}}">
                    </div>
                </div>
            </div>

            <div class="form-group row"> {{-- Jenis Kegiatan --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="kegiatan" > Jenis, Harga dan Jumlah Kegiatan</label>

                <div>
                    <table class="table table-bordered col-sm-5">
                        <div>
                            <thead>
                                <tr>
                                    <th class="col-xs-1 text-center">No</th>
                                    <th class="text-center">Jenis Kegiatan</th>
                                    <th class="text-center">Volume</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($spb->kegiatan as $item)
                                <tr>
                                    <th class="text-center align-middle">1</th>
                                    <th><input type="text" id="kgtn-1"  class="form-control" placeholder="Kegiatan" name="kgtn[]" value="{{$item->kegiatan}}"></th>
                                    <th><input type="text" id="vlm-1" class="form-control" placeholder="Volume" onchange="tambahTotal(1)" name="vlm[]" value="{{$item->value}}"></th>
                                    <th><input type="text" id="hrg-1" class="form-control" placeholder="Harga" onchange="tambahTotal(1)" name="hrg[]" value="{{$item->harga}}"></th>
                                    <th><input type="text" id="ttl-1" class="form-control" disabled=True placeholder="" value="{{$item->value * $item->harga}}" name=""></th>
                                    <th></th>
                                </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
                    <div class="pull-right">
                        <button class="btn btn-success" type="button" id="addBtn">
                            <i class="glyphicon glyphicon-plus"></i>
                          </button>
                    </div>
                </div>
            </div>

            <div class="form-group row"> {{-- Tanggal Pembuatan --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="tgl_pmbtn"> Tanggal Pembuatan : </label>
                <div class="col-sm-8">
                    <div class="col-sm-8    ">
                        <span>Karanganyar</span>
                        <input type="date" name="tgl_pembuatan" id="tgl_pmbtn" value="{{$spb->tgl_pembuatan}}">
                    </div>
                </div>
            </div>

            <div class="row"> {{-- Pengesahan --}}
                <div class="col-sm-6">
                    <label for="pngshn" class="text-center"> Pengesahan 1 </label>
                    <select name="pengesahan1" id="pngshn" class="chosen-select form-control" onchange="set_nip(this, 'nip_1')">
                        <option value="{{$spb->pengesahan1_pejabat->id}}">{{$spb->pengesahan1_pejabat->nama_pejabat}}</option>
                        @foreach ($pejabat as $pej)
                        <option value="{{$pej->id}}">{{$pej->nama_pejabat}}</option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control" value="{{$spb->pengesahan1_pejabat->nip}}" id="nip_1" name="pengesahan1_nip" placeholder="SP" value="NIP"  disabled=True style="margin-top: 0.4em">
                </div>
                <div class="col-sm-6">
                    <label for="pngshn" class="text-center"> Pengesahan 2 </label>
                    <select class="chosen-select form-control" name="pengesahan2" id="pengesahan2" data-placeholder="pengesahan2" width: 50px onchange="set_nip(this, 'nip_2')">
                        <option value ="{{$spb->pengesahan2_pejabat->id}}" >{{$spb->pengesahan2_pejabat->nama_pejabat}}</option>
                        @foreach ($pejabat as $pej2)
                        <option value="{{$pej2->id}}">{{$pej2->nama_pejabat}}</option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control" value="{{$spb->pengesahan2_pejabat->nip}}" name="pengesahan2_nip" placeholder="SP" disabled=True value="NIP" id="nip_2" style="margin-top: 0.4em">
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-submit" style="margin-top: 0.5em">
        </form>

    </div>

    {{-- Error --}}

@endsection

@section('customjs')
    <script>
        async function set_nip(data, nip) {
            pb = data
            console.log(pb.value);
            response = await fetch('/spb/pb1/'+pb.value)  // `/spb/pb1/${pb.value}`
            if (response.ok) {
                let json = await response.json();
                console.log(json.nip);
                document.getElementById(nip).value = json.nip
            }
        }

        async function setidpejabat(data, idpejabat) {
            pb = data
            // console.log(pb.value);
            response = await fetch('/spb/pb1/'+pb.value)  // `/spb/pb1/${pb.value}`
            if (response.ok) {
                let json = await response.json();
                // console.log(json[0].nip);
                document.getElementById(nip).value = json.nip
            }
        }

        async function set_alamat() {
            pb = document.getElementById('kepada')
            console.log(kepada.value);
            response = await fetch('/spb/alamat/'+kepada.value)  // `/spb/pb1/${pb.value}`
            if (response.ok) {
                let json = await response.json();
                console.log(json.alamat);
                document.getElementById('alamat').value = json.alamat
            }

        }

        $(document).ready(function () {
            var rowIdx = 1;
            // jQuery button click event to add a row
            $('#addBtn').on('click', function () {
                // Adding a row inside the tbody.
                $('#tbody').append(`<tr id="${++rowIdx}">
                    <td class="text-center align-middle">${rowIdx}</td>
                    <td><input type="text" id="kgtn-${rowIdx}" name="kgtn[]" class="form-control" placeholder="Kegiatan"></td>
                    <td><input type="text" id="vlm-${rowIdx}" name="vlm[]" class="form-control" placeholder="Volume" onchange="tambahTotal(${rowIdx})"></td>
                    <td><input type="text" id="hrg-${rowIdx}" name="hrg[]" class="form-control" placeholder="Harga" onchange="tambahTotal(${rowIdx})"></td>
                    <td><input type="text" id="ttl-${rowIdx}" name="" disabled=True class="form-control" placeholder="Total"></td>
                    <td class="text-center">
                        <button class="btn btn-danger remove"
                        type="button"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                    </tr>`
                );
             });

             $('#tbody').on('click', '.remove', function () {

            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest('tr').nextAll();

            // Iterating across all the rows
            // obtained to change the index
            child.each(function () {

                // Getting <tr> id.
                var id = $(this).attr('id');

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children('.row-index').children('p');

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`Row ${dig - 1}`);

                // Modifying row id.
                $(this).attr('id', `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest('tr').remove();

            // Decreasing total number of rows by 1.
            rowIdx--;
            });

        });

        function tambahTotal(id) {
            volume = document.getElementById(`vlm-${id}`).value
            harga = document.getElementById(`hrg-${id}`).value
            total = parseInt(volume) * parseInt(harga)
            document.getElementById(`ttl-${id}`).value = total
        }

    </script>
@endsection
