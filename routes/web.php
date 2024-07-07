<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisasterCategoryController;
use App\Http\Controllers\DisasterController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseLogController;
use App\Models\Drone;

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

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route, protected by auth middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/drones/mission', [DroneController::class, 'newMission'])->name('drones.mission');
    Route::post('/drones/record-mission', [DroneController::class, 'recordMission'])->name('drones.record-mission');
    Route::resource('drones', DroneController::class);
    Route::resource('disaster-categories', DisasterCategoryController::class);
    Route::resource('disasters', DisasterController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('response-logs', ResponseLogController::class);
});

// Include the auth routes provided by Breeze
require __DIR__.'/auth.php';