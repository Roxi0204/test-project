<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CicloFormativoController;
use App\Http\Controllers\UserController;
use App\Models\CicloFormativo;
use App\Models\Ciclo;

use Inertia\Inertia;

use Illuminate\Foundation\Application;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cicloformativos',[CicloFormativoController ::class, 'index'])->name('cicloformativos.index');
Route::get('/cicloformativos/create',[CicloFormativoController ::class, 'create'])->name('cicloformativos.create');
Route::post('/cicloformativos/create',[CicloFormativoController::class,'store'])->name ('cicloformativos.store');
Route::get('/cicloformativos/edit/{id}',[CicloFormativoController::class,'edit'])->name('cicloformativos.edit');
Route::post('/cicloformativos/edit/{id}',[CicloFormativoController::class,'update'])->name('cicloformativos.update');
Route::post('/cicloformativos/delete/{id}',[CicloFormativoController::class,'destroy'])->name('cicloformativos.destroy');
Route::get('/cicloformativos/{id}',[CicloFormativoController::class,'show'])->name('cicloformativos.show');
Route::post('/cicloformativos/ciclo',[CicloFormativoController::class,'getByCicle'])->name('cicloformativos.by.category');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
