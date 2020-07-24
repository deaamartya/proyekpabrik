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

//route tenaga kupas
Route::get('/gudang-bawang/tenaga-kupas','gudangbawang\KerjaHarianController@tenagakupas');
Route::post('/gudang-bawang/tambahtenagakupas','gudangbawang\KerjaHarianController@addtenagakupas');
Route::post('/gudang-bawang/statustenagakupas','gudangbawang\KerjaHarianController@statustenagakupas');

//route pembagian bawang
Route::get('/gudang-bawang/pembagian-bawang','gudangbawang\KerjaHarianController@pembagianbawang');
Route::post('/gudang-bawang/simpanberi','gudangbawang\KerjaHarianController@simpanBeri');


//route penerimaan bawang
Route::get('/gudang-bawang/penerimaan-bawang','gudangbawang\KerjaHarianController@penerimaanbawang');

//route persiapan masak kanji
Route::get('/gudang-bawang/persiapan-masak-kanji','gudangbawang\KerjaHarianController@persiapanmasakkanji');


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
