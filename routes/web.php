<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
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


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/posts', [AdminDashboardController::class, 'getPost'])->name('posts');
    Route::get('/products', [AdminDashboardController::class, 'getProducts'])->name('products');
    Route::get('/jobs', [AdminDashboardController::class, 'getjobs'])->name('jobs');
});
