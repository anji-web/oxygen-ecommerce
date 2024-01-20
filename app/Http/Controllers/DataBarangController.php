<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\DataBarang;
use Carbon\Carbon;

class DataBarangController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $databarang = DataBarang::join('kategori', 'kategori.id', '=', 'data_barang.kategori')
                    ->get(['data_barang.id', 'data_barang.nama_barang', 'data_barang.stok', 'kategori.nama_kategori']);
        return view('list/databaranglist', compact('databarang'));
    }

    public function createBarang() {
        $kategori = Kategori::all();
        return view('databarang', compact('kategori'));
    }

    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'stok' => ['required', 'string', 'max:255'],
            'nama_barang' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'integer'],
        ]);
    }

    protected function saveBarang(Request $request) 
    {
        $dateNow = Carbon::now();
        // $check = DataBarang::where('nama_barang' , '=', strtolower($request->namaBarang))->first();

        // if ($check != null) {
        //     $message = "data barang sudah terdaftar";
        //     return redirect('/err')->with('message',$message);
        // }

        $data = new DataBarang();
        $data->stok = $request->stok;
        $data->nama_barang = $request->namaBarang;
        $data->kategori = $request->kategori;
        $data->created_at = $dateNow;
        $data->updated_at = $dateNow;

        $hour = Carbon::parse($data->created_at)->format('h');
        $min = Carbon::parse($data->created_at)->format('i');
        $sec = Carbon::parse($data->created_at)->format('s');

        $sku = strtoupper(substr($barang->nama_barang, 0, 3)) . "-" . $hour . $min . $sec ;
        $data->sku = $sku;
        $data->save();
        return redirect('/data-barang');
    }

    protected function delete($id) {
        $data = DataBarang::find($id);
        $data->delete();
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/data-barang">Click Here</a> to go back.';
    }

    protected function edit($id) {
        $data = DataBarang::find($id);
        $kategori = Kategori::all();
        return view('databarangedit', compact('data', 'kategori'));
    }

    public function update(Request $request) {
        $dateNow = Carbon::now();
        $data = DataBarang::find($request->id);
        $data->stok = $request->stok;
        $data->nama_barang = $request->namaBarang;
        $data->kategori = $request->kategori;
        $data->updated_at = $dateNow;
        
        $data->save();
        return redirect('/data-barang');
    }

}
