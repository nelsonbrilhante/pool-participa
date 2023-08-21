<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\VoterController;
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
    return view('home');
})->name('home');

// VOTER ROUTES
Route::prefix('voter')->group(function () {
    Route::get('/login', [VoterController::class, 'showLoginForm'])->name('voter.showLoginForm');
    Route::post('/login', [VoterController::class, 'login'])->name('voter.login');
    Route::post('/logout', [VoterController::class, 'logout'])->name('voter.logout');
    Route::post('/validate-voter', [VoterController::class, 'validateVoter'])->name('voter.validate');
});

// POLL ROUTES
Route::prefix('polls')->group(function () {
    Route::get('/', [PollController::class, 'index'])->name('polls.index');
    Route::get('/{poll}', [PollController::class, 'show'])->name('polls.show');
    Route::post('/{poll}/vote', [PollController::class, 'vote'])->name('polls.vote');
    Route::get('/{poll}/results', [PollController::class, 'results'])->name('polls.results');
});

// LOGIN AND REGISTRATION ROUTES
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ADMIN ROUTES
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
    Route::get('/voters', [AdminController::class, 'manageVoters'])->name('admin.manageVoters');

    // Poll Routes
    Route::prefix('poll')->group(function () {
        Route::get('/options/add', [AdminController::class, 'showAddOptionForm'])->name('admin.showAddOptionForm');
        Route::post('/options/add', [AdminController::class, 'addOption'])->name('admin.addOption');
        Route::get('/edit', [AdminController::class, 'editPoll'])->name('admin.editPoll');
        Route::put('/update', [AdminController::class, 'updatePoll'])->name('admin.updatePoll');
        Route::get('/options/edit/{optionId}', [AdminController::class, 'showEditOptionForm'])->name('admin.showEditOptionForm');
    });
});
