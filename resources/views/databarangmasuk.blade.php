@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Tabel Barang Masuk</div>

                <div class="card-body">
                    <form method="POST" action="createDataBarangMasuk">
                        @csrf

                        <div class="row mb-3">
                            <label for="namaBarang" class="col-md-4 col-form-label text-md-end">Nama Barang</label>

                            <div class="col-md-6">
                                <input id="namaBarang"  type="text" class="form-control @error('namaBarang') is-invalid @enderror" name="namaBarang" value="{{ old('namaBarang') }}" required autocomplete="namaBarang">

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
                                <input id="stok" type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" required autocomplete="stok">

                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="idSupplier" class="col-md-4 col-form-label text-md-end">ID Supplier</label>
                            <div class="col-md-6">
                                <select name="idSupplier" id="idSupplier" class="form-control">
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($data_supplier as $d)
                                        <option value="{{$d->nama_supplier}}">{{$d->id}} - {{$d->nama_supplier}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="namaSupplier" class="col-md-4 col-form-label text-md-end">Nama Supplier</label>

                            <div class="col-md-6">
                                <input id="namaSupplier" disabled type="text" class="form-control @error('namaSupplier') is-invalid @enderror" name="namaSupplier" value="{{ old('namaSupplier') }}" required autocomplete="namaSupplier">

                                @error('namaSupplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hargaBeli" class="col-md-4 col-form-label text-md-end">Harga Beli</label>

                            <div class="col-md-6">
                                <input id="hargaBeli" type="text" class="form-control @error('hargaBeli') is-invalid @enderror" name="hargaBeli" value="{{ old('hargaBeli') }}" required autocomplete="hargaBeli">

                                @error('hargaBeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Kategori</label>

                            <div class="col-md-6">
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $d)
                                        <option value="{{$d->id}}">{{$d->nama_kategori}}</option>
                                    @endforeach
                                </select>
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
                            <button onclick="goToFrontPage()" class="btn btn-dark">
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
    $(document).ready( function() {
        $('#idSupplier').on('change', function() {
            $('#namaSupplier').val($(this).val());
        });
    });
</script>