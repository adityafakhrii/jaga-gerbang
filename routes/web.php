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



Route::get('/','DashboardController@home');

Route::get('/action','DashboardController@action')->name('dashboard.action');

Route::get('login', function() {
    if (Auth::check()){
        return redirect('/dashboard');
    }
    else{
        return view('auths.login');
    }
})->name('login');

Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function() {
    Route::get('/data-seksi','SeksiosisController@index');
    Route::post('/data-seksi/create','SeksiosisController@create');
    Route::get('/data-seksi/{id}/edit','SeksiosisController@edit');
    Route::post('/data-seksi/{id}/update','SeksiosisController@update');
    Route::get('/data-seksi/{id}/delete','SeksiosisController@destroy');
    Route::get('/data-seksi/action','SeksiosisController@action')->name('data-seksi.action');

   
    Route::get('/data-kelas','KelasController@index');
    Route::get('/data-kelas/action','KelasController@action')->name('data-kelas.action');
    Route::post('/data-kelas/create','KelasController@create');
    Route::get('/data-kelas/{id}/edit','KelasController@edit');
    Route::post('/data-kelas/{id}/update','KelasController@update');
    Route::get('/data-kelas/{id}/delete','KelasController@destroy');

    Route::get('/data-siswa-smkn2','SiswaController@index');
    Route::get('/data-siswa-smkn2/action','SiswaController@action')->name('data-siswa-smkn2.action');
    Route::post('/data-siswa-smkn2/create','SiswaController@create');
    Route::get('/data-siswa-smkn2/{id}/edit','SiswaController@edit');
    Route::post('/data-siswa-smkn2/{id}/update','SiswaController@update');
    Route::get('/data-siswa-smkn2/{id}/delete','SiswaController@destroy');

});


Route::group(['middleware' => ['auth','checkRole:osis,wakasek']], function() {
    Route::get('/siswa-telat','SiswatelatController@index');
    Route::get('/siswa-telat/action','SiswatelatController@action')->name('siswa-telat.action');
    Route::post('/siswa-telat/create','SiswatelatController@create');
    Route::post('/siswa-telat/{id}/update_sudah','SiswatelatController@update_sudah');
    Route::post('/siswa-telat/{id}/update_belum','SiswatelatController@update_belum');
    Route::get('/siswa-telat/{id}/delete','SiswatelatController@destroy');
    Route::post('/siswa-telat/search_siswa_telat', 'SiswatelatController@search_siswa_telat');
    Route::post('/siswa-telat/date_siswa_telat', 'SiswatelatController@date_siswa_telat');


    Route::get('/siswa-telat/exportexcel','SiswatelatController@exportExcel');
    Route::get('/siswa-telat/exportpdf','SiswatelatController@exportPdf');


    Route::get('/data-siswa','SiswatelatController@data_siswa');
    Route::get('/siswa-telat/{id}/edit','SiswatelatController@edit');
    Route::post('/siswa-telat/{id}/update','SiswatelatController@update');
    Route::get('/data-siswa/{id}/delete','SiswatelatController@delete');
    Route::post('/data-siswa/search', 'SiswatelatController@search_siswa');
    Route::get('/data-siswa/exportpdf','SiswatelatController@datasiswa_exportPdf');
    Route::get('/data-siswa/exportexcel','SiswatelatController@datasiswa_exportExcel');


    Route::get('/siswa-telat/truncate','SiswatelatController@truncate');
    Route::get('search', 'SiswatelatController@search')->name('search');
    // Route::get('/siswa-telat/search', 'SiswatelatController@search')->name('search');
});


Route::group(['middleware' => ['auth','checkRole:admin,osis,wakasek']], function() {
    Route::get('/dashboard','DashboardController@index');  
});


Route::get('/dynamic_dependent', 'DynamicDependent@index');

Route::get('siswa-telat/fetch', 'SiswatelatController@fetch')->name('dynamicdependent.fetch');
