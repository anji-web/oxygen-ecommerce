@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->role != 'MANAGER')
            <button onclick="window.location='{{ route("buatdatabarangmasuk") }}'" class="btn btn-info mb-3">Input Data Barang Masuk</button>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">ID Supplier</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">SKU</th>
                    @if(Auth::user()->role != 'MANAGER')
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
                            <td>{{$d->id_supplier}}</td>
                            <td>{{$d->nama_supplier}}</td>
                            <td>{{$d->harga_beli}}</td>
                            <td>{{$d->created_at}}</td>
                            <td>{{$d->sku}}</td>
                            @if(Auth::user()->role != 'MANAGER')
                            <td>
                                <button onclick="window.location='{{ route("databarangmasukedit", ["id" => $d->id]) }}'" class="btn btn-success">edit</button>
                                <button onclick="window.location='{{ route("databarangmasukdelete", ["id" => $d->id]) }}'" class="btn btn-danger">delete</button>
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