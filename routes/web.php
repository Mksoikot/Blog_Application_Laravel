<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HomeController;
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

Route::get('/',[UserController::class,'index']);
Route::get('/post/{id}',[UserController::class,'single_post_view'])->name('single_post_view');
Route::get('/post/category/{category_id}',[UserController::class,'filterby_category'])->name('filterby_category');

Route::group(['middleware' => 'auth'], function() {

    Route::post('/posts/{id}/comment/store',[UserController::class, 'comment_store'])->name('comment_store');
    Route::get('/question', [UserController::class, 'question'])->name('question');
    Route::post('/question/store', [UserController::class, 'question_store'])->name('question_store');
    Route::delete('/question/{id}/delete', [UserController::class, 'question_delete'])->name('question_delete');
    Route::get('/question/answer/{id}', [UserController::class, 'question_answer'])->name('answer');
    Route::post('/question/answer/{id}/store', [UserController::class, 'question_answer_store'])->name('question_answer_store');
    Route::delete('/question/answer/{id}/delete', [UserController::class, 'question_answer_delete'])->name('question_answer_delete');
    Route::get('/question/answer/{id}/like', [UserController::class, 'question_answer_like'])->name('question_answer_like');
    Route::get('/question/answer/{id}/unlike', [UserController::class, 'question_answer_unlike'])->name('question_answer_unlike');

});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');

Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    Route::resource('/admin/category', CategoryController::class);

    Route::resource('/admin/post', PostController::class);

});
