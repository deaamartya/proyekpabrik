<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'kanji'])->group(function () {

//Dashboard Kanji
Route::get('/dashboard-kanji', function () {
    return view('dashboardkanji.dashboardkanji');
})->name('dashboard-kanji');

//coba scan
Route::get('/scand',function(){
    return view('scan');
});



//gudang bawang
Route::get('/gudang-bawang/', function () {
    return redirect('/gudang-bawang/home-bawang');
});

Route::get('/gudang-bawang/home-bawang', 'gudangbawang\HomeController@index')->name('dashboard-kanji');

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
Route::post('/gudang-bawang/simpanterima','gudangbawang\KerjaHarianController@simpanPenerimaan');

//route persiapan masak kanji
Route::get('/gudang-bawang/persiapan-masak-kanji','gudangbawang\KerjaHarianController@persiapanmasakkanji');
Route::post('/gudang-bawang/statusordermasak','gudangbawang\KerjaHarianController@statusordermasak');


//stock
Route::get('/gudang-bawang/stockbawangkulit', function () {
    return view('gudangbawang.stockbawangkulit');
});
Route::get('/gudang-bawang/stockbawangkupas', function () {
    return view('gudangbawang.stockbawangkupas');
});


// Route::get('/gudang-bawang/stockbawangkulit', function () {
//     return view('gudangbawang.stockbawangkulit');
// });
// Route::get('/gudang-bawang/stockbawangkupas', function () {
//     return view('gudangbawang.stockbawangkupas');
// });
Route::get('/gudang-bawang/stockbawangkulit','gudangbawang\StockbawangkulitController@index');
Route::post('/gudang-bawang/stockbawangkulit','gudangbawang\StockbawangkulitController@carikulit');

Route::get('/gudang-bawang/stockbawangkupas','gudangbawang\StockbawangkulitController@indexkupas');
Route::post('/gudang-bawang/stockbawangkupas','gudangbawang\StockbawangkulitController@carikupas');

Route::get('/gudang-bawang/penerimaanstockbawangkulit', function () {
        return view('gudangbawang.penerimaanstock');
    });
Route::get('/gudang-bawang/penerimaanstock','gudangbawang\StockbawangkulitController@store');


Route::get('/gudang-bawang/scan', function () {
    return view('gudangbawang.scan');
});


Route::get('/gudang-bawang/tambahstock','gudangbawang\StockbawangkulitController@tambah');

Route::get('/gudang-bawang/scan', function () {
    return view('gudangbawang.scan');
});


//gudang tepung tapioka

Route::get('/gudang-tepung-tapioka/', function () {
    return redirect('/gudang-tepung-tapioka/home');
});
Route::get('/gudang-tepung-tapioka/home', 'gudangtepungtapioka\GudangTepungTapiokaController@index');

Route::get('/gudang-tepung-tapioka/stock', 'gudangtepungtapioka\GudangTepungTapiokaController@stock');

Route::get('/gudang-tepung-tapioka/kerjaharian', 'gudangtepungtapioka\GudangTepungTapiokaController@kerjaharian');

Route::post('/ambiltepung','gudangtepungtapioka\GudangTepungTapiokaController@store');

Route::post('/tambahpacking','gudangtepungtapioka\GudangTepungTapiokaController@store2');

//gudang bumbu

Route::get('/gudang-bumbu/', function () {
    return redirect('/gudang-bumbu/home-bumbu');
});

Route::get('/gudang-bumbu/home-bumbu','gudangbumbu\HomeController@index');

// Route::get('/gudang-bumbu/kerjaharianadonangula', function () {
//     return view('gudangbumbu.kerjaharianadonangula');
// });

Route::get('/gudang-bumbu/kerjaharianadonangula', 'KerjaharianadonangulaController@index');

Route::get('/gudang-bumbu/bahan', function () {
    return view('gudangbumbu.bahan');
});

Route::get('/gudang-bumbu/bahan','gudangbumbu\StockBumbuController@indexbahan');

Route::post('/gudang-bumbu/bahan','gudangbumbu\StockBumbuController@caribahan');

Route::get('/gudang-bumbu/adonangulagaram','gudangbumbu\StockBumbuController@indexgulagaram');

Route::post('/gudang-bumbu/adonangulagaram','gudangbumbu\StockBumbuController@carigulagaram');


Route::get('/gudang-bumbu/adonangulagaram', function () {
    return view('gudangbumbu.adonangulagaram');
});

Route::post('/gudang-bumbu/input_data', 'KerjaharianadonangulaController@ganti');
Route::get('/gudang-bumbu/kerjaharianadonangula', 'KerjaharianadonangulaController@tb');


Route::get('/gudang-bumbu/bumbuready', function () {
    return view('gudangbumbu.bumbuready');
});

});
