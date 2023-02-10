<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Mockery\Undefined;

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

// Post Index
Route::get('/', function () {
    return view('welcome', ["posts" => Post::all()->sortBy("project_date", null, true)]);
});
// Post Show
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::middleware(["auth"])
    ->name("admin.")
    ->prefix("admin")
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // PostEditor
        // index
        Route::get('/PostEditor/{post?}', [PostController::class, "index"])->name('post_editor.index');
        // update
        Route::put('/PostEditor/{post}', [PostController::class, "update"])->name('post_editor.update');
        // store
        Route::post('/PostEditor', [PostController::class, "store"])->name('post_editor.store');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
