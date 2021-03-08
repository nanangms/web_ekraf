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
    return view('auth.login');
});
Route::get('/akses_terbatas', function () {
    return view('akses_terbatas');
});
Auth::routes();


Route::group(['middleware'=>['auth']],function(){
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'user'], function(){
        Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
        Route::post('/tambah', [App\Http\Controllers\UserController::class, 'add_user']);
        Route::get('/{id}/delete', [App\Http\Controllers\UserController::class, 'delete']);
        Route::get('/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
        Route::post('/{id}/update', [App\Http\Controllers\UserController::class, 'update']);
    });
    Route::group(['prefix'=>'data-master'], function(){
        Route::resource('/sektor','\App\Http\Controllers\SektorController');
        Route::resource('/menu','\App\Http\Controllers\MenuController');
    });

    Route::group(['prefix'=>'setting'], function(){
        Route::resource('/menu','\App\Http\Controllers\MenuController');
        Route::resource('/role','\App\Http\Controllers\RoleController');
        Route::resource('/role_menu','\App\Http\Controllers\RolemenuController');
        Route::get('/submenu/{id}', [App\Http\Controllers\SubmenuController::class, 'index']);
        Route::get('/submenu/edit/{id}', [App\Http\Controllers\SubmenuController::class, 'edit']);
        Route::post('/submenu/tambah', [App\Http\Controllers\SubmenuController::class, 'store']);
        Route::post('/submenu/update/{id}', [App\Http\Controllers\SubmenuController::class, 'update']);
        Route::get('/submenu/{id}/delete', [App\Http\Controllers\SubmenuController::class, 'delete']);
        Route::get('/submenu/datatable/{id}', [App\Http\Controllers\SubmenuController::class, 'dataTable'])->name('table.submenu');
    });

    Route::group(['prefix'=>'berita'], function(){
        Route::get('/', [App\Http\Controllers\BeritaController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\BeritaController::class, 'tambah']);
        Route::post('/create', [App\Http\Controllers\BeritaController::class, 'create']);
        Route::get('/{berita}/edit', [App\Http\Controllers\BeritaController::class, 'edit']);
        Route::post('/{berita}/update', [App\Http\Controllers\BeritaController::class, 'update']);
        Route::get('/{berita}/delete', [App\Http\Controllers\BeritaController::class, 'delete']);
    });

    Route::group(['prefix'=>'galeri'], function(){
        Route::resource('/video','\App\Http\Controllers\VideoController');
    });

    Route::resource('/event','\App\Http\Controllers\EventController');

    Route::get('/role/datatable', [App\Http\Controllers\RoleController::class, 'dataTable'])->name('table.role');
    Route::get('/role_menu/datatable', [App\Http\Controllers\RolemenuController::class, 'dataTable'])->name('table.role_menu');
    Route::get('/table/sektor', [App\Http\Controllers\SektorController::class, 'dataTable'])->name('table.sektor');
    Route::get('/table/menu', [App\Http\Controllers\MenuController::class, 'dataTable'])->name('table.menu');
    Route::get('/table/user', [App\Http\Controllers\UserController::class, 'dataTable'])->name('table.user');
    Route::get('/table/berita', [App\Http\Controllers\BeritaController::class, 'dataTable'])->name('table.berita');
    Route::get('/table/video', [App\Http\Controllers\VideoController::class, 'dataTable'])->name('table.video');
    Route::get('/table/event', [App\Http\Controllers\EventController::class, 'dataTable'])->name('table.event');
});