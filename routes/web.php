<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Owner\OptionController;
use App\Http\Controllers\Admin\QuarterController;
use App\Http\Controllers\Owner\PictureController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FollowersController as AdminFollowersController;
use App\Http\Controllers\Admin\OwnerController as AdminOwnerController;
use App\Http\Controllers\Owner\PropertyController;
use App\Http\Controllers\Owner\AddQuaterController;
use App\Http\Controllers\Admin\PictureController as AdminPictureController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\Owner\DashboardController;

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


$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
Route::get('/beOwner', [OwnerController::class, 'owner'])->name('owner');
Route::post('/beOwner', [OwnerController::class, 'beOwner'])->name('beOwner');
Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [\App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex,
]);

// pour les follers
Route::resource('follower', FollowersController::class)->except(['show', 'index']);

// les routes pour l'admin
Route::prefix('admin')->middleware(['admin', 'auth', 'verified'])->name('admin.')->group(function () use ($idRegex, $slugRegex) {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('owner', [AdminOwnerController::class, 'index'])->middleware(['verified'])->name('owner.index');
    Route::get('/owner/{slug}-{user}', [AdminOwnerController::class, 'show'])->middleware(['verified'])->name('owner.show')->where([
        'property' => $idRegex,
        'slug' => $slugRegex,
    ]);
    Route::delete('owner/{slug}-{user}', [AdminOwnerController::class, 'destroy'])->middleware(['verified'])->name('owner.destroy')->where([
        'property' => $idRegex,
        'slug' => $slugRegex,
    ]);
    Route::resource('area', AreaController::class)->middleware(['verified'])->except(['show']);
    Route::resource('quarter', QuarterController::class)->except(['show'])->middleware(['verified']);
    Route::resource('property', AdminPropertyController::class)->except(['create'])->middleware(['verified']);
    Route::resource('category', CategoryController::class)->except(['show'])->middleware(['verified']);
    Route::resource('follower', AdminFollowersController::class)->except(['show', 'edite', 'update']);
    Route::delete('picture/{picture}', [AdminPictureController::class, 'destroy'])->name('picture.destroy')->where([
        'picture' => $idRegex,
    ])->middleware(['verified']);
});

Route::post('/biens/{property}/contact', [\App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex,
]);
Route::get('/images/{path}', [ImageController::class, 'show'])->where('path', '.*');

// les routes pour le propriétaire
Route::prefix('owner')->middleware(['owner', 'auth'])->name('owner.')->group(function () use ($idRegex) {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); //->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('property', PropertyController::class);
    Route::resource('option', OptionController::class)->except(['show']);
    Route::delete('picture/{picture}', [PictureController::class, 'destroy'])->name('picture.destroy')->where([
        'picture' => $idRegex,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
