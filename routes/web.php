<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Redirect the root URL to the login page
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);


    Route::resource('products', ProductController::class);
    Route::controller(ProductController::class)->group(function () {

        Route::get('products/create', 'createView')->name('products.create');
       // Route::get('products/{id}/delete', 'destroy')->name('products.destroy');
        // Route::get('delivery-in/edit/{id}', 'edit')->name('delivery-in.edit');
        // Route::post('delivery-in/update/{id}', 'update')->name('delivery-in.update');

     });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
