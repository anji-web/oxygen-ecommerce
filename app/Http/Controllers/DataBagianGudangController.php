<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DataBagianGudang;
class DataBagianGudangController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DataBagianGudang::all();
        return view('list/databagiangudanglist', compact('data'));
    }

    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'user' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
        ]);
    }

    public function createBagianGudang()
    {
        return view('datagudang');
    }

    protected function saveBagGudang(Request $req) 
    {
        $dateNow =  Carbon::now();
        $data = new DataBagianGudang();
        $data->user = $req -> namaUserGudang;
        $data->gender = $req -> gender;
        $data->tempat_lahir = $req -> tempatLahir;
        $data->tanggal_lahir = $req -> tanggalLahir;
        $data->tanggal_lahir = $req -> tanggalLahir;
        $data->alamat = $req -> alamat;
        $data->no_telp = $req -> telepon;
        $data->created_at = $dateNow;
        $data->updated_at = $dateNow;

        $data->save();
        return redirect('/data-bagian-gudang');
    }

    protected function delete($id) {
        $data = DataBagianGudang::find($id);
        $data->delete();
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/data-bagian-gudang">Click Here</a> to go back.';
    }

    protected function edit($id) {
        $data = DataBagianGudang::find($id);
        return view('datagudangedit', compact('data'));
    }

    public function update(Request $req) {
        $dateNow = Carbon::now();
        $data = DataBagianGudang::find($req->id);
        $data->user = $req -> namaUserGudang;
        $data->gender = $req -> gender;
        $data->tempat_lahir = $req -> tempatLahir;
        $data->tanggal_lahir = $req -> tanggalLahir;
        $data->alamat = $req -> alamat;
        $data->no_telp = $req -> telepon;
        $data->updated_at = $dateNow;
        
        $data->save();
        return redirect('/data-bagian-gudang');
    }

}
