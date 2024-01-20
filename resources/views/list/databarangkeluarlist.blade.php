@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->role != 'MANAGER' && Auth::user()->role != 'ADMINPENJUALAN')
            <button onclick="window.location='{{ route("buatdatabarangkeluar") }}'" class="btn btn-info mb-3">Input Data Barang Keluar</button>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">ID Bagian Penjualan</th>
                    <th scope="col">Nama Bagian Penjualan</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Tanggal Masuk Barang</th>
                    <th scope="col">Tanggal Keluar</th>
                    <th scope="col">SKU</th>
                    @if(Auth::user()->role != 'MANAGER' && Auth::user()->role != 'ADMINPENJUALAN')
                    <th scope="col">
                        Action
                    </th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->nama_barang}}</td>
                            <td>{{$d->stok}}</td>
                            <td>{{$d->id_bagian_penjualan}}</td>
                            <td>{{$d->nama_bagian_penjualan}}</td>
                            <td>{{$d->harga_jual}}</td>
                            <td>{{$d->tanggal_masuk_barang}}</td>
                            <td>{{$d->tanggal_keluar}}</td>
                            <td>{{$d->sku}}</td>
                            @if(Auth::user()->role != 'MANAGER' && Auth::user()->role != 'ADMINPENJUALAN')
                            <td>
                                <button onclick="window.location='{{ route("databarangkeluaredit", ["id" => $d->id]) }}'" class="btn btn-success">edit</button>
                                <button onclick="window.location='{{ route("databarangkeluardelete", ["id" => $d->id]) }}'" class="btn btn-danger">delete</button>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection