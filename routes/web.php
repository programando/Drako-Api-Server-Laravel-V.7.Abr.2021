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
    //Mail::to("jhonjamesmg@hotmail.com")->send( new TestMail("James"));
    return view('welcome');
    
});

//FRASE DEL DÍA
Route::get('frase'          , 'FrasesController@sentenceToday');