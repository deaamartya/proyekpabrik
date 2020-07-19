<?php

use Illuminate\Support\Facades\Route;

//gudang bawang
Route::get('/gudang-bawang/', function () {
    return redirect('/gudang-bawang/home-bawang');
});
Route::get('/gudang-bawang/home-bawang', function () {
    return view('gudangbawang.homebawang');
});

//kerja harian
Route::get('/gudang-bawang/tenaga-kupas', function () {
    return view('gudangbawang.tenagakupas');
});

Route::get('/gudang-bawang/pembagian-bawang', function () {
    return view('gudangbawang.pembagianbawang');
});

Route::get('/gudang-bawang/penerimaan-bawang', function () {
    return view('gudangbawang.penerimaanbawang');
});

Route::get('/gudang-bawang/persiapan-masak-kanji', function () {
    return view('gudangbawang.persiapanmasakkanji');
});

Route::post('/gudang-bawang/tambahtenagakupas');
Route::post('/gudang-bawang/statustenagakupas');

//stock
Route::get('/gudang-bawang/stockbawangkulit', function () {
    return view('gudangbawang.stockbawangkulit');
});
Route::get('/gudang-bawang/stockbawangkupas', function () {
    return view('gudangbawang.stockbawangkupas');
});

//gudang tepung tapioka

Route::get('/gudang-tepung-tapioka/', function () {
    return redirect('/gudang-tepung-tapioka/home');
});
Route::get('/gudang-tepung-tapioka/home', function () {
    return view('gudangtepungtapioka.home');
});
Route::get('/gudang-tepung-tapioka/stock', function () {
    return view('gudangtepungtapioka.stock');
});
Route::get('/gudang-tepung-tapioka/kerjaharian', function () {
    return view('gudangtepungtapioka.kerjaharian');
});

//gudang bumbu

Route::get('/gudang-bumbu/', function () {
    return redirect('/gudang-bumbu/home-bumbu');
});

Route::get('/gudang-bumbu/home-bumbu', function () {
    return view('gudangbumbu.homebumbu');
});

Route::get('/gudang-bumbu/kerjaharianadonangula', function () {
    return view('gudangbumbu.kerjaharianadonangula');
});

Route::get('/gudang-bumbu/bahan', function () {
    return view('gudangbumbu.bahan');
});



Route::get('/gudang-bumbu/adonangula', function () {
    return view('gudangbumbu.adonangula');
});

Route::get('/gudang-bumbu/adonangulagaram', function () {
    return view('gudangbumbu.adonangulagaram');
});

Route::get('/gudang-bumbu/bumbuready', function () {
    return view('gudangbumbu.bumbuready');
});

Route::get('/', function(){
    // return redirect('/manager-produksi');
    return view('managerproduksi/auth/login');
});
Route::get('/manager-produksi', 'managerproduksi\ManagerproduksiController@dashboard')->name('dashboard-manager-produksi');

//penerimaan
Route::get('/penerimaan/history_penerimaan', 'managerproduksi\PenerimaanController@select_history');
Route::get('/penerimaan/create_penerimaan', 'managerproduksi\PenerimaanController@create');
Route::get('/penerimaan/edit_penerimaan/{id}', 'managerproduksi\PenerimaanController@edit')->name('edit_penerimaan');
Route::get('/penerimaan/cetak_barcode',  'managerproduksi\PenerimaanController@printBarcode');

// Manager Produksi | Order Masak
Route::get('/manager-produksi/order-masak', 'managerproduksi\ManagerproduksiController@order_masak');

//manpro-gudangkacang
Route::get('/manpro-kacang/home', 'managerproduksi\ManproKacangController@home');
Route::get('/manpro-kacang/stock/gk', 'managerproduksi\ManproKacangController@stock_gudangkacang');
Route::get('/manpro-kacang/stock/gks', 'managerproduksi\ManproKacangController@stock_gudangkacangsortir');
Route::get('/manpro-kacang/kerjaharian/hariini', 'managerproduksi\ManproKacangController@kerjahariini');
Route::get('/manpro-kacang/kerjaharian/sebelumnya', 'managerproduksi\ManproKacangController@kerjaharisebelumnya');

//manpro-gudangbawang
Route::get('/manpro-bawang/home', 'managerproduksi\ManproBawangController@home');
Route::get('/manpro-bawang/stock/bawangkulit', 'managerproduksi\ManproBawangController@stock_bawangkulit');
Route::get('/manpro-bawang/stock/bawangkupas', 'managerproduksi\ManproBawangController@stock_bawangkupas');
Route::get('/manpro-bawang/kerjaharian/tenagakupas', 'managerproduksi\ManproBawangController@tenaga_kupas');
Route::get('/manpro-bawang/kerjaharian/pembagianbawang', 'managerproduksi\ManproBawangController@pembagian_bawang');
Route::get('/manpro-bawang/kerjaharian/penerimaanbawang', 'managerproduksi\ManproBawangController@penerimaan_bawang');
Route::get('/manpro-bawang/kerjaharian/persiapanmasak', 'managerproduksi\ManproBawangController@persiapan_masak');

// Manager Produksi | Data Produksi | Gudang Tapioka
Route::get('/manager-produksi/gudang-tapioka', 'managerproduksi\ManagerproduksiController@gudang_tapioka_home');
Route::get('/manager-produksi/gudang-tapioka/stock', 'managerproduksi\ManagerproduksiController@gudang_tapioka_stock');
Route::get('/manager-produksi/gudang-tapioka/kerja-harian', 'managerproduksi\ManagerproduksiController@gudang_tapioka_kerjaharian');

// Manager Produksi | Data Produksi | Gudang Bumbu
Route::get('/manager-produksi/gudang-bumbu', 'managerproduksi\ManagerproduksiController@gudang_bumbu_home');
Route::get('/manager-produksi/gudang-bumbu/stock-bahan', 'managerproduksi\ManagerproduksiController@gudang_bumbu_stock_bahan');
Route::get('/manager-produksi/gudang-bumbu/detail-prive', 'managerproduksi\ManagerproduksiController@gudang_bumbu_detail_prive');
Route::get('/manager-produksi/gudang-bumbu/stock-adonan-gula', 'managerproduksi\ManagerproduksiController@gudang_bumbu_stock_adonan_gula');
Route::get('/manager-produksi/gudang-bumbu/stock-adonan-gula-garam', 'managerproduksi\ManagerproduksiController@gudang_bumbu_stock_adonan_gula_garam');
Route::get('/manager-produksi/gudang-bumbu/stock-bumbu-ready', 'managerproduksi\ManagerproduksiController@gudang_bumbu_stock_bumbu_ready');
Route::get('/manager-produksi/gudang-bumbu/kerja-harian', 'managerproduksi\ManagerproduksiController@gudang_bumbu_kerja_harian');