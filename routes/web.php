<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
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

require __DIR__.'/auth.php';

// Get Routs
Route::get('/order/forhad', function () {
    return "Hi Me Forhad, I am not going to change with any variable";
});

Route::get('/order/{name}', function ($CustomerName) {
    return "Hi I am a changable name {$CustomerName}";
});

// Post Routs
Route::post('/postorder', function (Request $myrequest) {
    $nameRequest = $myrequest->post('name');
    echo "Hi I am a {$nameRequest}";
    var_dump($myrequest->all());
});

// View Bled Route
Route::get('/shop', function () {
    return view('shop', [
        'name' => 'Forhad',
    ]);
});