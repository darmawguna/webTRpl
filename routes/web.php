<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardPostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/berita/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/berita', DashboardPostController::class)->names([
    'index' => 'berita.index',
    'create' => 'berita.create',
    'store' => 'berita.store',
    'show' => 'berita.show',
    'edit' => 'berita.edit',
    'update' => 'berita.update',
    'destroy' => 'berita.destroy',
])->middleware(['auth']);

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/kurikulum', [HomeController::class, 'kurikulum'])->name('kurikulum');
Route::get('/pengajar', [HomeController::class, 'pengajar'])->name('pengajar');
Route::get('/kompetensi', [HomeController::class, 'kompetensi'])->name('kompetensi');
Route::get('/karir', [HomeController::class, 'karir'])->name('karir');

Route::get('/berita/{slug}', [BeritaController::class, 'detail'])->name('berita');
// Route::get('/berita',[BeritaController::class,'index'])->name('berita');
Route::get('/kategori/{id}', [BeritaController::class, 'kategori'])->name('kategori');





require __DIR__.'/auth.php';
