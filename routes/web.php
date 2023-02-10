<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SessionController;
use App\Models\Product;//上部に追加
use App\Http\Controllers\TimeController;

Route::get('/time', [TimeController::class, 'index']);

Route::get('uuid',function() {
  $products = Product::all();
  foreach($products as $product){
    echo $product.'<br>';
  }
});

Route::get('/home', [AuthorController::class, 'index']);
Route::get('/add', [AuthorController::class, 'add']);
Route::post('/add', [AuthorController::class, 'create']);
Route::get('/edit', [AuthorController::class, 'edit']);
Route::post('/edit', [AuthorController::class, 'update']);
Route::get('/delete', [AuthorController::class, 'delete']);
Route::post('/delete', [AuthorController::class, 'remove']);
Route::get('/find', [AuthorController::class, 'find']);
Route::post('/find', [AuthorController::class, 'search']);
Route::get('/author/{author}',[AuthorController::class, 'bind']);
Route::prefix('book')->group(function () {
Route::get('/', [BookController::class, 'index']);
Route::get('/add', [BookController::class, 'add']);
Route::post('/add', [BookController::class, 'create']);
});
Route::get('/relation', [AuthorController::class, 'relate']);

Route::get('/session', [SessionController::class, 'getSes']);
Route::post('/session', [SessionController::class, 'postSes']);
Route::get('/back',[SessionController::class, 'backHome']);

Route::get('/auth', [AuthorController::class,'check']);
Route::post('/auth', [AuthorController::class,'checkUser']);

Route::get('/', [AuthorController::class,'index']);

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';