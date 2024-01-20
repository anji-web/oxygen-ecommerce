@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Tabel Bagian Gudang</div>

                <div class="card-body">
                    <form method="POST" action="{{url('updateBagianGudang')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="stok" class="col-md-4 col-form-label text-md-end">Nama User Bagian Gudang</label>
                            <input type="hidden" value="{{$data->id}}" name="id">

                            <div class="col-md-6">
                                <input id="namaUserGudang" type="text" class="form-control @error('namaUserGudang') is-invalid @enderror" name="namaUserGudang" value="{{ old('namaUserGudang', $data->user ) }}" required autocomplete="namaUserGudang">

                                @error('namaUserGudang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" {{$data->gender == 'Laki-Laki' ? 'selected' : ''}}>Laki Laki</option>
                                    <option value="Perempuan" {{$data->gender == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tempatLahir" class="col-md-4 col-form-label text-md-end">Tempat Lahir</label>

                            <div class="col-md-6">
                                <input id="tempatLahir" type="text" class="form-control @error('tempatLahir') is-invalid @enderror" name="tempatLahir" value="{{ old('tempatLahir', $data->tempat_lahir) }}" required>

                                @error('tempatLahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggalLahir" class="col-md-4 col-form-label text-md-end">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input id="tanggalLahir" type="date" class="form-control @error('tanggalLahir') is-invalid @enderror" name="tanggalLahir" value="{{ $data->tanggal_lahir->format('Y-m-d') }}" required>

                                @error('tanggalLahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $data->alamat) }}" required>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telepon" class="col-md-4 col-form-label text-md-end">Telepon</label>

                            <div class="col-md-6">
                                <input id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon', $data->no_telp) }}" required>

                                @error('telepon')
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

<script>
    function goToFrontPage() {
        window.location.href='/data-bagian-gudang'
    }
</script>