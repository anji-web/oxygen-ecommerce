<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarangMasuk;
use App\Models\DataBarangKeluar;
use App\Models\DataBarang;
use App\Models\DataBagianPenjualan;
use Carbon\Carbon;

class DataBarangKeluarController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DataBarangKeluar::all();
        return view('list/databarangkeluarlist', compact('data'));
    }

    public function createBarangKeluar() {
            $data_barang = DataBarangMasuk::distinct()->get(["nama_barang", "id_barang"]);
            $data_stok = DataBarang::distinct()->get(["nama_barang", "id"]);
            $data_bag_penjualan = DataBagianPenjualan::all();
            return view('databarangkeluar', compact('data_barang', 'data_bag_penjualan', 'data_stok'));
    }

    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'namaBarang' => ['required', 'string', 'max:255'],
            'hargaBeli' => ['required', 'integer'],
            'idBagPenjualan' => ['required', 'integer'],
            'namaBagPenjualan' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function saveBarangKeluar(Request $req) 
    {
        $dateNow =  Carbon::now();
        $data_barang_masuk = DataBarangMasuk::where("nama_barang", "=", $req->idBarang)
                                ->orderBy('created_at', 'asc')
                                ->first();
        $data = new DataBarangKeluar();
        $data_barang = DataBarang::find($data_barang_masuk->id_barang);    
        $bagPenjualan = DataBagianPenjualan::where('user', '=', $req->idBagPenjualan)->first();
        $data->id_barang = $data_barang_masuk->id_barang;
        $data->nama_barang = $data_barang_masuk->nama_barang;
        $data->stok = $req -> stok;
        $data->id_bagian_penjualan = $bagPenjualan->id;
        $data->nama_bagian_penjualan = $bagPenjualan->user;
        $data->harga_jual = $req -> hargaJual;
        $data->tanggal_keluar = $dateNow;
        $data->created_at = $dateNow;
        $data->updated_at = $dateNow;
        $data->sku = $data_barang_masuk->sku;
        $data->tanggal_masuk_barang = $data_barang_masuk->created_at;

        $data->save();
        $decreaseStok = (int)$data_barang_masuk->stok - (int)$data->stok;
        $data_barang_masuk->stok =  $decreaseStok;
        $data_barang->stok = (int)$data_barang->stok - (int)$data->stok;
        $data_barang_masuk->save();

        if((int)$data_barang_masuk->stok <= 0 ) {
            $data_barang_masuk->delete();
            $next_barang_masuk = DataBarangMasuk::where("nama_barang", "=", $data->nama_barang)
            ->orderBy('created_at', 'asc')
            ->first();
            $next_barang_masuk->stok = (int)$decreaseStok +  (int)$next_barang_masuk->stok;
            $next_barang_masuk->save();

            if ($next_barang_masuk->stok <= 0) {
                $next_barang_masuk->delete();
            }
        }

        $data_barang->save();

        if($data_barang->stok <= 0) {
            $data_barang->delete();
        }
        return redirect('/data-barang-keluar');
    }

    protected function delete($id) {
        $data = DataBarangKeluar::find($id);
        $data_barang_masuk = DataBarangMasuk::where('id_barang' , '=',$data->id_barang)->first();
        if($data_barang_masuk == null) {
            $data->delete();
        } else {
            $data_barang = DataBarang::find($data->id_barang);   
            $data_barang_masuk->stok = (int)$data_barang_masuk->stok + (int)$data->stok ;
            $data_barang->stok = (int)$data_barang->stok + $data->stok ;
            $data_barang_masuk->save();
            $data_barang->save();
            $data->delete();
        }
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/data-barang-keluar">Click Here</a> to go back.';
    }

    protected function edit($id) {
        $data = DataBarangKeluar::find($id);
        $data_barang = DataBarang::all();
        $data_bag_penjualan = DataBagianPenjualan::all();
        return view('databarangkeluaredit', compact('data', 'data_barang', 'data_bag_penjualan'));
    }

    public function update(Request $req) {
        $dateNow = Carbon::now();
        $data_barang_masuk = DataBarangMasuk::where("nama_barang", "=", $req->idBarang)
                                ->orderBy('created_at', 'asc')
                                ->first();
        $data_barang = DataBarang::find($req->idBarang);                              
        $data = DataBarangKeluar::find($req->id);
        $bagPenjualan = DataBagianPenjualan::where('user', '=', $req->idBagPenjualan)->first();
        $data->id_barang = $data_barang_masuk->id_barang;
        $data->nama_barang = $data_barang_masuk->nama_barang;
        $data->id_bagian_penjualan = $bagPenjualan->id;
        $data->nama_bagian_penjualan = $bagPenjualan->user;
        $data->harga_jual = $req -> hargaJual;
        $data->updated_at = $dateNow;

        $decreaseStok = ((int)$data_barang_masuk->stok + (int)$data->stok) - (int)$req->stok;
        $data_barang->stok =  $decreaseStok;
        $data->stok = $req->stok;
        $data->save();
        $data_barang->save();
        return redirect('/data-barang-keluar');
    }


}
