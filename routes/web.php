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

Route::get('/gudang-bumbu/detailprive', function () {
    return view('gudangbumbu.detailprive');
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

