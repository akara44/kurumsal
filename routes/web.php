<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UrunController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\BlogicerikController;
use App\Http\Controllers\Admin\AltKategoriController;
use App\Http\Controllers\Admin\BlogkategoriController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

// Banner
Route::controller(BannerController::class)->group(function () {
    Route::get('/banner/hepsi', 'HomeBanner')->name('banner');
    Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle');
});

// Kategori
Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori/hepsi', 'KategoriHepsi')->name('kategori.hepsi');
    Route::get('/kategori/ekle', 'KategoriEkle')->name('kategori.ekle');
    Route::post('/kategori/ekle/form', 'KategoriEkleForm')->name('kategori.ekle.form');
    Route::get('/kategori/duzenle/{id}', 'KategoriDuzenle')->name('kategori.duzenle');
    Route::post('/kategori/guncelle/form', 'KategoriGuncelleForm')->name('kategori.guncelle.form');
    Route::get('/kategori/sil/{id}', 'KategoriSil')->name('kategori.sil');
    Route::get('/kategori/durum', 'KategoriDurum');
});

// Alt Kategori
Route::controller(AltKategoriController::class)->group(function () {
    Route::get('/altkategori/liste', 'AltKategoriListe')->name('altkategori.liste');
    Route::get('/altkategori/ekle', 'AltKategoriEkle')->name('altkategori.ekle');
    Route::post('/altkategori/ekle/form', 'AltKategoriEkleForm')->name('altkategori.ekle.form');
    Route::get('/altkategori/duzenle/{id}', 'AltKategoriDuzenle')->name('altkategori.duzenle');
    Route::post('/altkategori/guncelle/form', 'AltKategoriForm')->name('alt.guncelle');
    Route::get('/altkategori/sil/{id}', 'AltKategoriSil')->name('altkategori.sil');
    Route::get('/altkategoriler/ajax/{kategori_id}', 'AltAjax');
    Route::get('/altkategoriler/durum', 'AltkategoriDurum');
});

// Ürünler
Route::controller(UrunController::class)->group(function () {
    Route::get('/urun/liste', 'UrunListe')->name('urun.liste');
    Route::get('/urun/ekle', 'UrunEkle')->name('urun.ekle');
    Route::post('/urun/ekle/form', 'UrunEkleForm')->name('urun.ekle.form');
    Route::get('/urun/duzenle/{id}', 'UrunDuzenle')->name('urun.duzenle');
    Route::post('/urun/guncelle/form', 'UrunGuncelle')->name('urun.guncelle.form');
    Route::get('/urun/sil/{id}', 'UrunSil')->name('urun.sil');
    Route::get('/urun/durum', 'UrunDurum');
});

// Bloglar
Route::controller(BlogkategoriController::class)->group(function () {
    Route::get('/blog/kategori/liste', 'BlogListe')->name('blog.liste');
    Route::get('/blog/kategori/ekle', 'BlogKategoriEkle')->name('blog.kategori.ekle');
    Route::post('/blog/kategori/form', 'BlogKategoriForm')->name('blog.kategori.form');
    Route::get('/blog/kategori/duzenle/{id}', 'BlogKategoriDuzenle')->name('blog.kategori.duzenle');
    Route::post('/blog/kategori/guncelle/form', 'BlogKategoriGuncelle')->name('blog.kategori.guncelle');
    Route::get('/blog/kategori/durum', 'BlogKategoriDurum');
    Route::get('/blog/kategori/sil/{id}', 'BlogKategoriSil')->name('blog.kategori.sil');
});

//Blog İçerkleri

Route::controller(BlogicerikController::class)->group(function () {
    Route::get('/icerik/liste', 'İcerikListe')->name('icerik.liste');
    Route::get('/blog/icerik/ekle', 'BlogicerikEkle')->name('blog.icerik.ekle');
    Route::post('/blog/icerik/ekle/form', 'BlogicerikForm')->name('blog.icerik.ekle.form');
    Route::get('/blog/icerik/durum', 'BlogicerikDurum');
    Route::get('/blog/icerik/duzenle/{id}', 'BlogicerikDuzenle')->name('blog.icerik.duzenle');
    Route::post('/blog/icerik/guncelle/form', 'BlogicerikGuncelleForm')->name('blog.icerik.guncelle.form');
  
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Front Controller
Route::get('/urun/{id}/{url}', [FrontController::class, 'UrunDetay']);
Route::get('/altkategori/{id}/{url}', [FrontController::class, 'AltDetay']);
Route::get('/kategori/{id}/{url}', [FrontController::class, 'KategoriDetay']);
