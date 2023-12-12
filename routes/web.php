<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('dashboard');
})->middleware('auth');

Route::get('/restricted', function (){
    return view('restricted');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['not-restricted'])->group(function () {
        Route::get('/dashboard', [PostController::class, 'index'])->middleware(['verified'])->name('dashboard');
        Route::post('/post', [PostController::class, 'store'])->name('post.post');

        Route::get('/chat', [MessageController::class, 'index'])->middleware(['verified'])->name('chats.index');
        Route::get('/chat/{user}', [MessageController::class, 'show'])->middleware(['verified'])->name('chats.show');
        Route::post('/chat/{user}', [MessageController::class, 'store'])->middleware(['verified'])->name('chats.store');

        Route::post('/report/{message}', [ReportController::class, 'store'])->middleware(['verified'])->name('reports.store');
        
        Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports.index');
    });
    Route::get('/profile/{user}', [UserController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';