<?php

// use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    // return redirect('/manager-produksi');
    return view('managerproduksi/auth/login');
});