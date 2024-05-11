<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConfiguracionesController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UtilidadesController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{lang}', [LanguageController::class, 'swap'])->name('lang.swap'); //Idiomas

Route::group(['prefix' => ''], function ($route) {
    $route->get('/', [InicioController::class, 'index']);
    $route->get('/login', [LoginController::class, 'index'])->name('login');
    $route->post('/login', [LoginController::class, 'login']);
    $route->post('/logout', [LoginController::class, 'logout'])->name('logout');

    $route->get('/twoverification', [LoginController::class, 'twoverification'])->name('twoverification');
    $route->get('/verificar2Feet', [LoginController::class, 'verificar2Feet'])->name('two-factor.index');
    $route->post('/verifyTwoFactor', [LoginController::class, 'verifyTwoFactor'])->name('verifyTwoFactor');
})
->middleware('throttle:3,1'); // Permitirá 3 intentos cada 1 minuto;

Route::middleware(['auth', '2fa', 'primicia'])->group(function ($route) {
    $route->get('/admin', [AdminController::class, 'index'])->name('admin');
    $route->match(['get', 'post'], 'admin/{submodulo}', [AdminController::class, 'index']);

    $route->get('/configuraciones', [ConfiguracionesController::class, 'index']);
    $route->match(['get', 'post'], 'configuraciones/{submodulo}', [ConfiguracionesController::class, 'index']);

    $route->get('/utilidades', [UtilidadesController::class, 'index']);
    $route->match(['get', 'post'], 'utilidades/{submodulo}', [UtilidadesController::class, 'index']);
});
