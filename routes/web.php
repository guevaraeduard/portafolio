<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Portfolio;   

Route::get('/', function () {
    $portfolios = Portfolio::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'portfolios' => $portfolios
    ]);
})->name('welcome');

Route::post('save-image-data', [PortfolioController::class, 'uploadFileSelectoresForm']);

Route::get('/experiencias', function () {
    return Inertia::render('Experiencias');
})->name('experiencias');

Route::get('/portafolio', [PortfolioController::class, 'index'])->name('portafolio');

Route::get('/habilidades', function () {
    return Inertia::render('Habilidades');
})->name('habilidades');

Route::get('/sobre-mi', function () {
    return Inertia::render('SobreMi');
})->name('sobre-mi');

Route::get('/contacto', function () {
    return Inertia::render('Contacto');
})->name('contacto');

// Ruta para guardar el formulario de contacto
Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para administración de contactos
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{contact}/mark-read', [ContactController::class, 'markAsRead'])->name('contacts.mark-read');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

        // Rutas para administración de portafolio
        Route::resource('portfolios', AdminPortfolioController::class);
        Route::patch('/portfolios/{portfolio}/toggle-status', [AdminPortfolioController::class, 'toggleStatus'])->name('portfolios.toggle-status');
    });
});



require __DIR__ . '/auth.php';
