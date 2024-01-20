<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\Kategori;
use App\Models\DataSupplier;
use App\Models\DataBarangMasuk;
use Carbon\Carbon;

class DataBarangMasukController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DataBarangMasuk::all();
        return view('list/databarangmasuklist', compact('data'));
    }


    public function createBarangMasuk() {
        $data_barang = DataBarang::all();
        $data_supplier = DataSupplier::all();
        $kategori = Kategori::all();
        return view('databarangmasuk', compact('data_barang', 'data_supplier', 'kategori'));
    }

    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'namaBarang' => ['required', 'string', 'max:255'],
            'hargaBeli' => ['required', 'integer'],
            'idSupplier' => ['required', 'integer'],
            'namaSupplier' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function saveBarangMasuk(Request $req) 
    {
        $dateNow =  Carbon::now();
        $data = new DataBarangMasuk();

        $checkDataBarang = DataBarang::where('nama_barang', '=', $req->namaBarang)->first();
        if ($checkDataBarang == null) {
            $data_barang = new DataBarang();
            $data_barang->created_at = $dateNow;
            $data_barang->updated_at = $dateNow;
            $data_barang->nama_barang = $req->namaBarang;
            $data_barang->stok = $req -> stok;
            $data_barang->kategori = $req->kategori;
            $data_barang->save();

            $supp = DataSupplier::where('nama_supplier', '=', $req->idSupplier)->first();
            $data->id_barang = $data_barang->id;
            $data->nama_barang = $req->namaBarang;
            $data->stok = $req -> stok;
            $data->id_supplier = $supp->id;
            $data->nama_supplier = $supp->nama_supplier;
            $data->harga_beli = $req -> hargaBeli;
            $data->tanggal_masuk = $dateNow;
            $data->created_at = $dateNow;
            $data->updated_at = $dateNow;
        
            $data_barang->save();
            
            $hour = Carbon::parse($data->created_at)->format('h');
            $min = Carbon::parse($data->created_at)->format('i');
            $sec = Carbon::parse($data->created_at)->format('s');
    
            $sku = strtoupper(substr($data_barang->nama_barang, 0, 3)) . "-" . $hour . $min . $sec ;
            $data->sku = $sku;
    
            $data->save();
    
            return redirect('/data-barang-masuk');
        }else {
            $supp = DataSupplier::where('nama_supplier', '=', $req->idSupplier)->first();
            $data->id_barang = $checkDataBarang->id;
            $data->nama_barang = $req->namaBarang;
            $data->stok = $req -> stok;
            $data->id_supplier = $supp->id;
            $data->nama_supplier = $supp->nama_supplier;
            $data->harga_beli = $req -> hargaBeli;
            $data->tanggal_masuk = $dateNow;
            $data->created_at = $dateNow;
            $data->updated_at = $dateNow;
            
            $checkDataBarang->stok = (int)$checkDataBarang->stok +  (int)$req -> stok;
            $checkDataBarang->save();
            
            $hour = Carbon::parse($data->created_at)->format('h');
            $min = Carbon::parse($data->created_at)->format('i');
            $sec = Carbon::parse($data->created_at)->format('s');
    
            $sku = strtoupper(substr($checkDataBarang->nama_barang, 0, 3)) . "-" . $hour . $min . $sec ;
            $data->sku = $sku;
    
            $data->save();
    
            return redirect('/data-barang-masuk');
        }
    }


    protected function delete($id) {
        $data = DataBarangMasuk::find($id);
        $data_barang = DataBarang::find($data->id_barang);   
        $data_barang->stok = (int)$data_barang->stok -(int) $data->stok ;
        if ((int)$data_barang->stok <= 0) {
            $data_barang->delete();
        }else {
            $data_barang->save();
        }
        $data->delete();
        $check = DataBarangMasuk::where('nama_barang', '=', $data->nama_barang)->first();
        if($check == null) {
            $data_barang->delete();
        }
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/data-barang-masuk">Click Here</a> to go back.';
    }

    protected function edit($id) {
        $data = DataBarangMasuk::find($id);
        $data_barang = DataBarang::all();
        $data_supplier = DataSupplier::all();
        return view('databarangmasukedit', compact('data', 'data_barang', 'data_supplier'));
    }

    public function update(Request $req) {
        $dateNow = Carbon::now();
        $data = DataBarangMasuk::find($req->id);
        $barang = DataBarang::where('nama_barang', '=', $data->nama_barang)->first();
        $supp = DataSupplier::where('nama_supplier', '=', $req->idSupplier)->first();
        $data->id_barang = $barang->id;
        $data->nama_barang = $barang->nama_barang;
        $data->stok = $req -> stok;
        $data->id_supplier = $supp->id;
        $data->nama_supplier = $supp->nama_supplier;
        $data->harga_beli = $req -> hargaBeli;
        $data->updated_at = $dateNow;

        $data->save();
        $barang->stok = DataBarangMasuk::where('nama_barang' , '=', $data->nama_barang)->sum('stok');
        $barang->save();
        return redirect('/data-barang-masuk');
    }


}
