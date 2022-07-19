<?php

use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VacanteController;
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

Route::get('/', HomeController::class);

Route::middleware(['auth', 'verified'])->prefix('vacantes')->group(function () {
    Route::get('/', [VacanteController::class, 'index'])->name('vacantes.index');
    Route::get('/create', [VacanteController::class, 'create'])->name('vacantes.create');
    Route::get('/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
});
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

Route::get('/notificaciones', NotificationController::class)->middleware(['auth', 'verified', 'role.recruiter'])->name('notificaciones');

Route::get('/candidatos/{vacante}', [CandidatosController::class, 'index'])->name('candidatos.index');

require __DIR__ . '/auth.php';
