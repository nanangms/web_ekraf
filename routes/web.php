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
Route::get('/', 'App\Http\Controllers\IndexController@index');

// Route::get('/akun', 'App\Http\Controllers\AkunController@index');
Route::get('/profil-ekraf', 'App\Http\Controllers\IndexController@profil_ekraf');
Route::get('/data-pelaku-ekraf', 'App\Http\Controllers\IndexController@pelaku_ekraf');
Route::get('/data-pelaku-ekraf/{kode}', 'App\Http\Controllers\IndexController@pelaku_ekraf_detail');
Route::get('/galery/foto', 'App\Http\Controllers\IndexController@album');
Route::get('/galery/foto/{seo}', 'App\Http\Controllers\IndexController@foto_album');
Route::get('/galery/video', 'App\Http\Controllers\IndexController@video');
Route::get('/acara', 'App\Http\Controllers\IndexController@acara');
Route::get('/acara/{seo}', 'App\Http\Controllers\IndexController@detailacara');
Route::get('/faqaboutekraf', 'App\Http\Controllers\IndexController@faq');
Route::get('/berita-info', 'App\Http\Controllers\IndexController@berita');
Route::get('/berita-info/{seo}', 'App\Http\Controllers\IndexController@detail_berita');

Route::get('/login', function () {
return view('auth.login');
});

Route::get('/akses_terbatas', function () {
    return view('akses_terbatas');
});

Auth::routes();

Route::get('/pendaftaran-pelaku-ekraf',[App\Http\Controllers\PendaftaranController::class, 'form_pendaftaran']);
Route::post('/submit-pendaftaran',[App\Http\Controllers\PendaftaranController::class, 'submit_pendaftaran']);
Route::get('/pendaftaran-berhasil',[App\Http\Controllers\PendaftaranController::class, 'pendaftaran_berhasil']);

Route::group(['middleware'=>['auth','checkRole:Pelaku Ekraf']],function(){
    Route::group(['prefix'=>'pengguna'], function(){
        Route::get('/dashboard', [App\Http\Controllers\PenggunaController::class, 'index']);
        Route::get('/profil-usaha', [App\Http\Controllers\PenggunaController::class, 'profil_usaha']);
        Route::get('/produk-usaha', [App\Http\Controllers\PenggunaController::class, 'produk_usaha']);
        Route::post('/profil-usaha/update', [App\Http\Controllers\PenggunaController::class, 'update_profil_usaha']);
        Route::post('/kontak-usaha/update', [App\Http\Controllers\PenggunaController::class, 'kontak_profil_usaha']);
        Route::post('/kontak-pemilik/update', [App\Http\Controllers\PenggunaController::class, 'kontak_pemilik']);
        Route::get('/produk-usaha/datatable/{kode}', [App\Http\Controllers\PenggunaController::class, 'dataTable']);
        Route::get('/produk-usaha/{id}/edit', [App\Http\Controllers\PenggunaController::class, 'edit_produk']);
        Route::post('/produk-usaha/tambah', [App\Http\Controllers\PenggunaController::class, 'tambah_produk']);
        Route::post('/produk-usaha/update/{id}', [App\Http\Controllers\PenggunaController::class, 'update_produk']);
        Route::get('/produk-usaha/{id}/delete', [App\Http\Controllers\PenggunaController::class, 'delete_produk']);
    });
});

Route::group(['middleware'=>['auth','checkRole:Admin,Super Admin,Pelaku Ekraf']],function(){
    Route::group(['prefix'=>'profil'], function(){
        Route::get('/{id}', [App\Http\Controllers\UserController::class, 'profil']);
        Route::post('/{id}/update', [App\Http\Controllers\UserController::class, 'update_profil']);
        Route::post('/{id}/ganti_password', [App\Http\Controllers\UserController::class, 'ganti_password_profil']);
    });
});

Route::group(['middleware'=>['auth','checkRole:Admin,Super Admin']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'pendaftaran'], function(){
        Route::get('/', [App\Http\Controllers\PendaftaranController::class, 'index']);
        Route::get('/table', [App\Http\Controllers\PendaftaranController::class, 'dataTable'])->name('table.pendaftaran');
        Route::get('/{id}/detail', [App\Http\Controllers\PendaftaranController::class, 'detail_pendaftaran']);
        Route::get('/verifikasi/{id}', [App\Http\Controllers\PendaftaranController::class, 'verifikasi_pendaftaran']);
    });
    
    Route::group(['prefix'=>'pelaku_ekraf'], function(){
        Route::get('/', [App\Http\Controllers\PelakuekrafController::class, 'index']);
        Route::get('/table', [App\Http\Controllers\PelakuekrafController::class, 'dataTable'])->name('table.pelaku_ekraf');
        Route::post('/tambah', [App\Http\Controllers\PelakuekrafController::class, 'add_user']);
        Route::get('/{id}/delete', [App\Http\Controllers\PelakuekrafController::class, 'delete']);
        Route::get('/{id}/detail', [App\Http\Controllers\PelakuekrafController::class, 'detail_pelaku_ekraf']);
        Route::post('/{id}/update', [App\Http\Controllers\PelakuekrafController::class, 'update']);
    });

    Route::group(['prefix'=>'user'], function(){
        Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
        Route::post('/tambah', [App\Http\Controllers\UserController::class, 'add_user']);
        Route::get('/{id}/delete', [App\Http\Controllers\UserController::class, 'delete']);
        Route::get('/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
        Route::post('/{id}/update', [App\Http\Controllers\UserController::class, 'update']);
    });

    Route::group(['prefix'=>'data-master'], function(){
        Route::resource('/sektor','\App\Http\Controllers\SektorController');
        Route::resource('/kabupaten','\App\Http\Controllers\KabupatenkotaController');
        Route::resource('/badanhukum','\App\Http\Controllers\BadanhukumController');
        Route::resource('/kategori','\App\Http\Controllers\KategoriController');
        Route::resource('/tag','\App\Http\Controllers\TagController');
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
        Route::get('/{id}/edit', [App\Http\Controllers\BeritaController::class, 'edit']);
        Route::post('/{id}/update', [App\Http\Controllers\BeritaController::class, 'update']);
        Route::get('/{id}/delete', [App\Http\Controllers\BeritaController::class, 'delete']);
    });

    Route::group(['prefix'=>'faq'], function(){
        Route::get('/',[App\Http\Controllers\FaqController::class,'index']);
        Route::post('/tambah',[App\Http\Controllers\FaqController::class,'create']);
        Route::get('/table', [App\Http\Controllers\FaqController::class,'dataTable'])->name('table.faq');
        Route::get('/{id}/delete',[App\Http\Controllers\FaqController::class,'delete']);
        Route::get('/{id}/edit',[App\Http\Controllers\FaqController::class,'edit']);
        Route::post('/{id}/update',[App\Http\Controllers\FaqController::class,'update']);
    }); 

    Route::group(['prefix'=>'galeri'], function(){
        Route::resource('/video','\App\Http\Controllers\VideoController');
        Route::resource('/album','\App\Http\Controllers\AlbumController');
        Route::get('/foto/{id}', [App\Http\Controllers\FotoController::class, 'index']);
        Route::post('/foto/create/{id}', [App\Http\Controllers\FotoController::class, 'create']);
        Route::get('/foto/{id}/delete', [App\Http\Controllers\FotoController::class, 'delete']);
    });

    Route::group(['prefix'=>'event'], function(){
        Route::get('/',[App\Http\Controllers\EventController::class,'index']);
        Route::post('/tambah',[App\Http\Controllers\EventController::class,'create']);
        Route::get('/table', [App\Http\Controllers\EventController::class,'dataTable'])->name('table.event');
        Route::get('/{id}/delete',[App\Http\Controllers\EventController::class,'delete']);
        Route::get('/{id}/edit',[App\Http\Controllers\EventController::class,'edit']);
        Route::post('/{id}/update',[App\Http\Controllers\EventController::class,'update']);
    }); 

    Route::group(['prefix'=>'produk'], function(){
        Route::get('/',[App\Http\Controllers\ProdukController::class,'index']);
        Route::get('/table', [App\Http\Controllers\ProdukController::class,'dataTable'])->name('table.produk');
        Route::get('/{id}/delete',[App\Http\Controllers\ProdukController::class,'delete']);
        Route::get('/{id}/detail', [App\Http\Controllers\ProdukController::class, 'detail']);
    }); 

    Route::get('/role/datatable', [App\Http\Controllers\RoleController::class, 'dataTable'])->name('table.role');
    Route::get('/role_menu/datatable', [App\Http\Controllers\RolemenuController::class, 'dataTable'])->name('table.role_menu');
    Route::get('/table/sektor', [App\Http\Controllers\SektorController::class, 'dataTable'])->name('table.sektor');
    Route::get('/table/kabupaten', [App\Http\Controllers\KabupatenkotaController::class, 'dataTable'])->name('table.kabupaten');
    Route::get('/table/badanhukum', [App\Http\Controllers\BadanhukumController::class, 'dataTable'])->name('table.badanhukum');
    Route::get('/table/menu', [App\Http\Controllers\MenuController::class, 'dataTable'])->name('table.menu');
    Route::get('/table/user', [App\Http\Controllers\UserController::class, 'dataTable'])->name('table.user');
    Route::get('/table/berita', [App\Http\Controllers\BeritaController::class, 'dataTable'])->name('table.berita');
    Route::get('/table/video', [App\Http\Controllers\VideoController::class, 'dataTable'])->name('table.video');
    Route::get('/table/event', [App\Http\Controllers\EventController::class, 'dataTable'])->name('table.event');
    Route::get('/table/album', [App\Http\Controllers\AlbumController::class, 'dataTable'])->name('table.album');
    Route::get('/table/kategori', [App\Http\Controllers\KategoriController::class, 'dataTable'])->name('table.kategori');
    Route::get('/table/tag', [App\Http\Controllers\TagController::class, 'dataTable'])->name('table.tag');
    Route::get('/table/foto/{id}', [App\Http\Controllers\FotoController::class, 'dataTable']);
});