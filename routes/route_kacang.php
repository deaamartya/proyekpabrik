<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'kacang'])->group(function () {

    //Dashboard Kanji
    Route::get('/home', 'gudangkacang\HomeController@index')->name('dashboard-kacang');

//home


//stock
Route::get('/gd_kacang', 'gudangkacang\StockGdKacangController@select');

Route::get('/gd_kacang_sortir','gudangkacang\StockGdKacangController@selectSortir');
Route::get('/stock_gudang_kacang_penerimaan_ob', function () {
    return view('gudangkacang.penerimaan_ob');
});

Route::post('/insert_stock_gudang_kacang_penerimaan_ob', 'gudangkacang\StockGdKacangController@insertOB');

Route::get('/stock_gudang_kacang_penerimaan_7ml', function () {
    return view('gudangkacang.penerimaan_7ml');
});

Route::post('/gudang-kacang/insert7ml','gudangkacang\StockGdKacangController@insert7ml');

Route::get('/stock_gudang_kacang_penerimaan_8ml', function () {
    return view('gudangkacang.penerimaan_8ml');
});

Route::post('/gudang-kacang/insert8ml','gudangkacang\StockGdKacangController@insert8ml');

Route::get('/stock_gudang_kacang_sortir_penerimaan_gs', function () {
    return view('gudangkacang.penerimaan_gs');
});

Route::post('/gudang-kacang/insertGS','gudangkacang\StockGdKacangController@insertGS');

Route::get('/stock_gudang_kacang_sortir_penerimaan_sp', function () {
    return view('gudangkacang.penerimaan_sp');
});
Route::post('/gudang-kacang/insertSP','gudangkacang\StockGdKacangController@insertSP');

Route::get('/stock_gudang_kacang_sortir_penerimaan_hc', function () {
    return view('gudangkacang.penerimaan_hc');
});
Route::post('/gudang-kacang/insertHC','gudangkacang\StockGdKacangController@insertHC');

Route::get('/stock_gudang_kacang_sortir_penerimaan_telor', function () {
    return view('gudangkacang.penerimaan_telor');
});
Route::post('/gudang-kacang/insertTelor','gudangkacang\StockGdKacangController@insertTelor');

Route::post('/gudang-kacang/filterDate','gudangkacang\StockGdKacangController@filterDate');
Route::post('/gudang-kacang/ambilPenerimaan','gudangkacang\StockGdKacangController@ambilPenerimaan');

//kerja harian
Route::get('/hari_ini', function () {
    return view('gudangkacang.kerja_harian');
});

Route::get('/hari_sebelumnya', function () {
    return view('gudangkacang.kerja_harian_sebelumnya');
});

Route::post('/kerjaharian/simpanhasil', 'gudangkacang\KerjaHariIniController@store');

Route::get('/tutup', function () {
    return view('gudangkacang.review_harian');
});

Route::post('/kerjaharian/sebelumnya', 'gudangkacang\KerjaSebelumnyaController@index');

});