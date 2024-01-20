@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Tabel Barang Keluar</div>

                <div class="card-body">
                    <form method="POST" action="{{url('updateBarangKeluar')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="idBarang" class="col-md-4 col-form-label text-md-end">ID Barang</label>

                            <div class="col-md-6">
                                <select name="idBarang" id="idBarang" class="form-control">
                                    <option value="">Pilih Barang</option>
                                    @foreach ($data_barang as $d)
                                        <option value="{{$d->nama_barang}}" {{$data->id_barang == $d->id ? 'selected' : ''}}>{{$d->id}} - {{$d->nama_barang}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="namaBarang" class="col-md-4 col-form-label text-md-end">Nama Barang</label>
                            <input type="hidden" value="{{$data->id}}" name="id">

                            <div class="col-md-6">
                                <input id="namaBarang" disabled type="text" class="form-control @error('namaBarang') is-invalid @enderror" name="namaBarang" value="{{ old('namaBarang', $data->nama_barang) }}" required autocomplete="namaBarang">

                                @error('namaBarang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stok" class="col-md-4 col-form-label text-md-end">Stok</label>

                            <div class="col-md-6">
                                <input id="stok" type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok',  $data->stok) }}" required >

                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="idBagPenjualan" class="col-md-4 col-form-label text-md-end">ID Bagian Penjualan</label>

                            <div class="col-md-6">
                                <select name="idBagPenjualan" id="idBagPenjualan" class="form-control">
                                    <option value="">Pilih Bagian Penjualan</option>
                                    @foreach ($data_bag_penjualan as $d)
                                        <option value="{{$d->user}}" {{$data->id_bagian_penjualan == $d->id ? 'selected' : ""}}>{{$d->id}} - {{$d->user}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="namaBagPenjualan" class="col-md-4 col-form-label text-md-end">Nama Bagian Penjualan</label>

                            <div class="col-md-6">
                                <input id="namaBagPenjualan" disabled type="text" class="form-control @error('namaBagPenjualan') is-invalid @enderror" name="namaBagPenjualan" value="{{ old('namaBagPenjualan',  $data->nama_bagian_penjualan) }}" required autocomplete="namaBagPenjualan">

                                @error('namaBagPenjualan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hargaJual" class="col-md-4 col-form-label text-md-end">Harga Jual</label>

                            <div class="col-md-6">
                                <input id="hargaJual" type="text" class="form-control @error('hargaJual') is-invalid @enderror" name="hargaJual" value="{{ old('hargaJual',  $data->harga_jual) }}" required autocomplete="hargaJual">

                                @error('hargaJual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-4 text-center">
                        <div class="col-md-12">
                            <button type="submit" onclick="goToFrontPage()" class="btn btn-dark">
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    function goToFrontPage() {
        window.location.href='/data-barang-keluar'
    }
    $(document).ready( function() {
        $('#idBarang').on('change', function() {
        debugger
            $('#namaBarang').val($(this).val());
            console.log($('#namaBarang').val());
        });

        $('#idBagPenjualan').on('change', function() {
            $('#namaBagPenjualan').val($(this).val());
        });
    });
</script>