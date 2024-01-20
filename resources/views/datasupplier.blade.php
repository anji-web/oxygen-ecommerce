@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Tabel Supplier</div>

                <div class="card-body">
                    <form method="POST" action="createDataSupplier">
                        @csrf

                        <div class="row mb-3">
                            <label for="namaSupplier" class="col-md-4 col-form-label text-md-end">Nama Supplier</label>

                            <div class="col-md-6">
                                <input id="namaSupplier" type="text" class="form-control @error('namaSupplier') is-invalid @enderror" name="namaSupplier" value="{{ old('namaSupplier') }}" required autocomplete="namaBarang">

                                @error('namaSupplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telepon" class="col-md-4 col-form-label text-md-end">Telepon</label>

                            <div class="col-md-6">
                                <input id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="stok">

                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">

                                @error('alamat')
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

<script>
    function goToFrontPage() {
        window.location.href='/data-supplier'
    }
</script>