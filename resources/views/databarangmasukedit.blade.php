@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Tabel Barang Masuk</div>

                <div class="card-body">
                    <form method="POST" action="{{url('updateBarangMasuk')}}">
                        @csrf

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
                                <input id="stok" type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok', $data->stok) }}" required autocomplete="stok">

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
                                        <option value="{{$d->nama_supplier}}" {{$data->id_supplier == $d->id ? 'selected' : ""}}>{{$d->id}} - {{$d->nama_supplier}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="namaSupplier" class="col-md-4 col-form-label text-md-end">Nama Supplier</label>

                            <div class="col-md-6">
                                <input id="namaSupplier" disabled type="text" class="form-control @error('namaSupplier') is-invalid @enderror" name="namaSupplier" value="{{ old('namaSupplier', $data->nama_supplier) }}" required autocomplete="namaSupplier">

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
                                <input id="hargaBeli" type="text" class="form-control @error('hargaBeli') is-invalid @enderror" name="hargaBeli" value="{{ old('hargaBeli', $data->harga_beli) }}" required>

                                @error('hargaBeli')
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
        window.location.href = '/data-barang-masuk'
    }
    $(document).ready( function() {
        $('#idSupplier').on('change', function() {
            $('#namaSupplier').val($(this).val());
        });
    });
</script>