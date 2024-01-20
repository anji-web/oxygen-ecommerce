<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\DataBagianPenjualan;

class DataBagianPenjualanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DataBagianPenjualan::all();
        return view('list/databagianpenjualanlist', compact('data'));
    }


    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'user' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
        ]);
    }

    public function createBagPenjualan(){
        return view('databagianpenjualan');
    }

    protected function saveBagPenjualan(Request $req) 
    {
        $dateNow =  Carbon::now();
        $data = new DataBagianPenjualan();
        $data->user = $req -> namaUserPenjualan;
        $data->gender = $req -> gender;
        $data->tempat_lahir = $req -> tempatLahir;
        $data->tanggal_lahir = $req -> tanggalLahir;
        $data->alamat = $req -> alamat;
        $data->no_telp = $req -> telepon;
        $data->created_at = $dateNow;
        $data->updated_at = $dateNow;

        $data->save();
        return redirect('/data-bagian-penjualan');
    }

    protected function delete($id) {
        $data = DataBagianPenjualan::find($id);
        $data->delete();
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/data-bagian-penjualan">Click Here</a> to go back.';
    }

    protected function edit($id) {
        $data = DataBagianPenjualan::find($id);
        return view('databagianpenjualanedit', compact('data'));
    }

    public function update(Request $req) {
        $dateNow = Carbon::now();
        $data = DataBagianPenjualan::find($req->id);
        $data->user = $req -> namaUserPenjualan;
        $data->gender = $req -> gender;
        $data->tempat_lahir = $req -> tempatLahir;
        $data->tanggal_lahir = $req -> tanggalLahir;
        $data->alamat = $req -> alamat;
        $data->no_telp = $req -> telepon;
        $data->updated_at = $dateNow;
        
        $data->save();
        return redirect('/data-bagian-penjualan');
    }

}
