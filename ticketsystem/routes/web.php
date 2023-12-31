<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
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

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/sports', [PublicController::class, 'sports'])->name('sports');
Route::get('/films', [PublicController::class, 'films'])->name('films');
Route::get('/festivals', [PublicController::class, 'festivals'])->name('festivals');

Route::get('/dashboard', function () {
    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tickt/{event}', [TicketController::class, 'show'])->name('show');
    Route::post('/ticket/store/{event_id}', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/confirmation/{event}/{reservation}', [TicketController::class, 'showConfirmation'])->name('confirmation');
    Route::get('/Reservations', [ProfileController::class, 'showReservations'])->name('Reservations');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/event', [EventController::class, 'event'])->name('admin.event');
    Route::get('/admin/create', [EventController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [EventController::class, 'store'])->name('admin.store');
    Route::get('/admin/{event}/edit', [EventController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/{event}', [EventController::class, 'update'])->name('admin.update');
    Route::get('/admin/{event}', [EventController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/admin/reservation', [AdminController::class, 'reservation'])->name('admin.reservation');
    Route::get('/admin/tickets', [AdminController::class, 'tickets'])->name('admin.tickets');
});


require __DIR__.'/auth.php';
