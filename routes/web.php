<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/err', function () {
    return view('error');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/data-barang', [App\Http\Controllers\DataBarangController::class, 'index'])->name('databarang');
Route::get('/input-barang', [App\Http\Controllers\DataBarangController::class, 'createBarang'])->name('buatdatabarang');
Route::get('/delete-barang/{id}', [App\Http\Controllers\DataBarangController::class, 'delete'])->name('deletebarang');
Route::get('/edit-barang/{id}', [App\Http\Controllers\DataBarangController::class, 'edit'])->name('editbarang');

Route::get('/data-bagian-gudang', [App\Http\Controllers\DataBagianGudangController::class, 'index'])->name('databagiangudang');
Route::get('/edit-bagian-gudang/{id}', [App\Http\Controllers\DataBagianGudangController::class, 'edit'])->name('databagiangudangedit');
Route::get('/delete-bagian-gudang/{id}', [App\Http\Controllers\DataBagianGudangController::class, 'delete'])->name('databagiangudangdelete');
Route::get('/input-bagian-gudang', [App\Http\Controllers\DataBagianGudangController::class, 'createBagianGudang'])->name('buatbagiangudang');

Route::get('/data-bagian-penjualan', [App\Http\Controllers\DataBagianPenjualanController::class, 'index'])->name('databagianpenjualan');
Route::get('/edit-bagian-penjualan/{id}', [App\Http\Controllers\DataBagianPenjualanController::class, 'edit'])->name('databagianpenjualanedit');
Route::get('/delete-bagian-penjualan/{id}', [App\Http\Controllers\DataBagianPenjualanController::class, 'delete'])->name('databagianpenjualandelete');
Route::get('/input-bagian-penjualan', [App\Http\Controllers\DataBagianPenjualanController::class, 'createBagPenjualan'])->name('buatbagianpenjualan');

Route::get('/data-supplier', [App\Http\Controllers\DataSupplierController::class, 'index'])->name('datasupplier');
Route::get('/input-data-supplier', [App\Http\Controllers\DataSupplierController::class, 'createSupplier'])->name('buatdatasupplier');
Route::get('/edit-data-supplier/{id}', [App\Http\Controllers\DataSupplierController::class, 'edit'])->name('datasupplieredit');
Route::get('/delete-data-supplier/{id}', [App\Http\Controllers\DataSupplierController::class, 'delete'])->name('datasupplierdelete');

Route::get('/data-barang-masuk', [App\Http\Controllers\DataBarangMasukController::class, 'index'])->name('databarangmasuk');
Route::get('/input-barang-masuk', [App\Http\Controllers\DataBarangMasukController::class, 'createBarangMasuk'])->name('buatdatabarangmasuk');
Route::get('/edit-barang-masuk/{id}', [App\Http\Controllers\DataBarangMasukController::class, 'edit'])->name('databarangmasukedit');
Route::get('/delete-barang-masuk/{id}', [App\Http\Controllers\DataBarangMasukController::class, 'delete'])->name('databarangmasukdelete');

Route::get('/data-barang-keluar', [App\Http\Controllers\DataBarangKeluarController::class, 'index'])->name('databarangkeluar');
Route::get('/input-barang-keluar', [App\Http\Controllers\DataBarangKeluarController::class, 'createBarangKeluar'])->name('buatdatabarangkeluar');
Route::get('/edit-barang-keluar/{id}', [App\Http\Controllers\DataBarangKeluarController::class, 'edit'])->name('databarangkeluaredit');
Route::get('/delete-barang-keluar/{id}', [App\Http\Controllers\DataBarangKeluarController::class, 'delete'])->name('databarangkeluardelete');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});



// insert route
Route::post('createBarang', [App\Http\Controllers\DataBarangController::class, 'saveBarang']);
Route::post('createBagGudang', [App\Http\Controllers\DataBagianGudangController::class, 'saveBagGudang']);
Route::post('createBagPenjualan', [App\Http\Controllers\DataBagianPenjualanController::class, 'saveBagPenjualan']);
Route::post('createDataSupplier', [App\Http\Controllers\DataSupplierController::class, 'saveSupplier']);
Route::post('createDataBarangMasuk', [App\Http\Controllers\DataBarangMasukController::class, 'saveBarangMasuk']);
Route::post('createDataBarangKeluar', [App\Http\Controllers\DataBarangKeluarController::class, 'saveBarangKeluar']);

// update route
Route::post('updateBarang', [App\Http\Controllers\DataBarangController::class, 'update']);
Route::post('updateBagianGudang', [App\Http\Controllers\DataBagianGudangController::class, 'update']);
Route::post('updateBagianPenjualan', [App\Http\Controllers\DataBagianPenjualanController::class, 'update']);
Route::post('updateSupplier', [App\Http\Controllers\DataSupplierController::class, 'update']);
Route::post('updateBarangMasuk', [App\Http\Controllers\DataBarangMasukController::class, 'update']);
Route::post('updateBarangKeluar', [App\Http\Controllers\DataBarangKeluarController::class, 'update']);
