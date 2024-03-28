<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ユーザー登録
Route::post('/register', [UserController::class, 'register']);

//ホーム
Route::get('/home', \App\Http\Controllers\Home\IndexController::class)
->name('home.index');

//検索
Route::get('/home/search', \App\Http\Controllers\Home\Search\SearchController::class)
->name('home.search');
Route::post('/save-book-data', 'BookController@saveBookData');


//登録
Route::get('/home/register', \App\Http\Controllers\Home\Registerbook\RegisterbookController::class)
->name('home.registerbook');

//読み聞かせ中
Route::get('/home/reading', \App\Http\Controllers\Home\Reading\ReadingController::class)
->name('home.reading');

//進化
Route::get('/home/evolute', \App\Http\Controllers\Home\Evolute\EvoluteController::class)
->name('home.evolute');

//共有
Route::get('/home/share', \App\Http\Controllers\Home\Share\ShareController::class)
->name('home.share');

//成長記録
Route::get('/home/growth', \App\Http\Controllers\Home\Growth\GrowthController::class)
->name('home.growth');

//本棚
Route::get('/home/bookshelf', \App\Http\Controllers\Home\Bookshelf\BookshelfController::class)
->name('home.bookshelf');

require __DIR__.'/auth.php';


