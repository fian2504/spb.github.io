@extends('layouts.base')

@section('content')

    <div class="page-header">
        <h1>
            Surat Pesanan Barang
        </h1>
    </div>

    <div class="container ">
        <form action="post" action="/db_spb">
            @csrf
            <div class="form-group row"> {{-- Nomor Surat --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="sbd"> Nomor Surat</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="" placeholder="000" id="sbd">
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="" placeholder="SP" value="SP" id="sbd">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="" placeholder="C" value="TKI.Kominfo" id="sbd">
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="" placeholder="Tanggal" id="sbd">
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="" placeholder="Tahun" id="sbd">
                </div>
            </div>
            <div class="form-group row"> {{-- Form Kepada --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="kepada"> Kepada</label>
                <div class="col-sm-4">
                    <select name="kepada" class="chosen-select form-control" id="kepada" data-placeholder="Rekanan">
                        <option value=""></option>
                            @foreach ($rekanan as $rekanan)
                                <option value="{{$rekanan->id_rekanan}}">{{$rekanan->nama_rekanan}}</option>
                            @endforeach
                </div>

                <div class="col-sm-4">
                    <input name="kepada" type="text" class="form-control" name="" placeholder="Alamat" id="kepada">
                </div>
            </div>

            <div class="form-group row"> {{-- Penerimaan Barang --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="pb"> Penerima Barang</label>
                <div class="col-sm-4">
                    <select name="penerima" name="" class="chosen-select form-control" id="pb">
                        <option value=""></option>
                        @foreach ($pejabat as $pejabat)
                            <option value="{{$pejabat->id_pejabat}}">{{$pejabat->nama_pejabat}}</option>
                        @endforeach
                    </select>

                {{-- {{dd($pejabat)}} --}}
                </div>
                <div class="col-sm-4">
                    <input name="penerima" type="text" class="form-control" name="" placeholder="Nip" id="pb" value="">
                </div>
            </div>

            <div class="form-group row"> {{-- Keperluan --}}

                <label for="kpln" class="col-sm-3 col-form-label-sm text-right"> Keperluan</label>
                <div class="col-sm-8">
                    <input name="keperluan" type="text" id="kpln" class="form-control" placeholder="Keperluan">
                </div>
            </div>

            <div class="form-group row"> {{-- text 1 --}}

                <label for="text1" class="col-sm-3 col-form-label-sm text-right"> text1</label>
                <div>
                    <textarea name="" id="text1" class="col-sm-8" rows="3">Pembayaran akan dilaksanakan setelah barang-barang yang dipesan diterima oleh penyimpan / pengurus barang unit Dinas Kominfo Kabupaten Karanganyar, dengan ketentuan sebagai berikut :</textarea>
                </div>
            </div>

            <div class="form-group row"> {{-- Tanggal Pengiriman --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="tgl_pngrmn"> Tanggal Pengiriman</label>
                <div class="col-sm-8">
                    <div class="col-sm-8">
                        <input type="date" name="" id="tgl_pngrmn">
                    </div>
                </div>
            </div>

            <div class="form-group row"> {{-- Jenis Kegiatan --}}

                <label class="col-sm-3 col-form-label-sm text-right" for="kegiatan" > Jenis, Harga dan Jumlah Kegiatan</label>

                <div>
                    <table class="table table-bordered col-sm-5">
                        <thead>
                            <tr>
                                <th class="col-xs-1 text-center">No</th>
                                <th class="text-center">Jenis Kegiatan</th>
                                <th class="text-center">Volume</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th></th>
                                <th><input type="text" id="kgtn" class="form-control" placeholder="Kegiatan"></th>
                                <th><input type="text" id="vlm" class="form-control" placeholder="Volume"></th>
                                <th><input type="text" id="hrg" class="form-control" placeholder="Harga"></th>
                                <th><input type="text" id="ttl" class="form-control" placeholder=""></th>
                                <th><input type="button" value="deleted" class="btn "></th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <div> {{-- Pengesahan --}}
                <label for="pngshn" class="col-sm-3 col-form-label-sm text-right"> Pengesahan 1 </label>
                <label for="pngshn" class="col-sm-9 col-form-label-sm text-right"> Pengesahan 2 </label>
                <br>
                <div class="col-sm-5">
                    <select name="pengesahan1" id="pngshn" class="chosen-select form-control" >
                        <option value=""></option>
                        {{-- @foreach ($pejabat as $pejabat)
                            <option value="{{$pejabat->id_Pejabat}}">{{$pejabat->id_Pejabat}}</option>
                        @endforeach --}}
                    </select>

                    <br>

                    <input type="text" class="form-control" name="" placeholder="SP" value="NIP" id="sbd">
                </div>

                <div class="col-sm-6 col-form-label-sm">
                    <select class="chosen-select form-control" id="" data-placeholder="Rekanan" width: 50px>
                        <option value="">  </option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                    </select>
                    <br>

                    <input type="text" class="form-control" name="" placeholder="SP" value="NIP" id="">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary"> Create</button>
                <button type="preview" class="btn btn-primary"> preview</button>
            </div>
            <input type="submit" value="Submit" class="btn btn-submit">
        </form>
    </div>

@endsection
