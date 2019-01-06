<?php

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
    return view('threads.index');
});

$this->resource('thread',"ThreadController");
$this->post("reply","ReplyController@store")->name("reply.store");
$this->get("reply/{thread_id}/{pagination?}","ReplyController@index");

$this->get('/locale/{local}/',function ($locale){
    session(['locale'=>$locale]);
    App::setLocale($locale);
    return back();
})->name('locale.change');

$this->get('/locale',function (){
    dd(App::getLocale());
});
