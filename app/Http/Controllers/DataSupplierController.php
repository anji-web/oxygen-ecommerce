<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\DataSupplier;

class DataSupplierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $data = DataSupplier::all();
        return view('list/datasupplierlist', compact('data'));
    }

    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'namaSupplier' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'integer'],
        ]);
    }

    public function createSupplier() {
        return view('datasupplier');
    }

    protected function saveSupplier(Request $request) 
    {
        $dateNow = Carbon::now();
        $data = new DataSupplier();
        $data->nama_supplier = $request->namaSupplier;
        $data->no_telp = $request->telepon;
        $data->alamat = $request->alamat;
        $data->created_at = $dateNow;
        $data->updated_at = $dateNow;
        
        $data->save();
        return redirect('/data-supplier');
    }



    protected function delete($id) {
        $data = DataSupplier::find($id);
        $data->delete();
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/data-supplier">Click Here</a> to go back.';
    }

    protected function edit($id) {
        $data = DataSupplier::find($id);
        return view('datasupplieredit', compact('data'));
    }

    public function update(Request $request) {
        $dateNow = Carbon::now();
        $data = DataSupplier::find($request->id);
        $data->nama_supplier = $request->namaSupplier;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->telepon;
        $data->updated_at = $dateNow;
        
        $data->save();
        return redirect('/data-supplier');
    }


}
