<?php

// Index por defecto del plugin
use Azuriom\Plugin\Me\Controllers\MeHomeController;

// Perfil de usuario
use Azuriom\Plugin\Me\Controllers\UserProfileController;

// No fucking idea
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::get('/', [MeHomeController::class, 'index']);

// Perfil de usuario
Route::get('/{username}', [UserProfileController::class, 'show'])->name('me.userprofile');
Route::get('/{username}/badges', [UserProfileController::class, 'badges'])->name('me.userbadges');
Route::get('/{username}/inventory', [UserProfileController::class, 'showInventory'])->name('me.userinventory');
