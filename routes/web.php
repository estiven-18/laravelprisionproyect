<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrisonerController;
use App\Http\Controllers\GuardSessionController;



//ruta para contadores
use App\Models\Visit;
use App\Models\User;
use App\Models\Prisoner;


Route::redirect('/', '/login');

//contador de rutas
Route::get('/dashboard', function () {
    return view('dashboard', [
        'visitas'     => Visit::count(),
        'guardias'    => User::whereHas('rol', fn($q) => $q->where('name', 'Guard'))->count(),
        'prisioneros' => Prisoner::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/visitors/create', [VisitorController::class, 'create'])->name('visitors.create');
Route::post('/visitors', [VisitorController::class, 'store'])->name('visitors.store');

Route::middleware('auth')->group(function () {

    Route::get('/visits', [VisitController::class, 'index'])->name('visits.index');
    Route::get('/visits/create', [VisitController::class, 'create'])->name('visits.create');
    Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');
    Route::get('/visits/{visit}', [VisitController::class, 'show'])->name('visits.show');
    Route::get('/visits/{visit}/edit', [VisitController::class, 'edit'])->name('visits.edit');
    Route::patch('/visits/{visit}', [VisitController::class, 'update'])->name('visits.update');
    Route::delete('/visits/{visit}', [VisitController::class, 'destroy'])->name('visits.destroy');
    Route::resource('visitors', VisitorController::class)
        ->except(['create', 'store'])
        ->whereNumber('visitor');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/pdf', [ReportController::class, 'downloadPdf'])->name('reports.pdf');
    Route::get('/reports/excel', [ReportController::class, 'downloadExcel'])->name('reports.excel');
    Route::resource('users', UserController::class);
    Route::resource('prisoners', PrisonerController::class);
    Route::resource('guard_sessions', GuardSessionController::class);
});


require __DIR__.'/auth.php';
