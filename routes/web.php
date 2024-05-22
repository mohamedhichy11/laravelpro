<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotariatControleur;

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



// Routes pour le contrôleur NotariatControleur
Route::get('/', [NotariatControleur::class, 'index'])->name('homepage');
Route::get('/recherche', [NotariatControleur::class, 'recherche'])->name('recherche');
Route::post('/supprimer', [NotariatControleur::class, 'supprimer'])->name('supprimer');
Route::get('/ajouter', [NotariatControleur::class, 'show'])->name('show');
Route::post('/ajouter', [NotariatControleur::class, 'ajouter'])->name('ajouter');

Route::get('/verifier', [NotariatControleur::class, 'verifierForm'])->name('verifierForm');

Route::post('/verifier', [NotariatControleur::class, 'verifier'])->name('verifier');
Route::get('/dossier_terrain', [NotariatControleur::class, 'showForm'])->name('dossier_terrain.show');
Route::post('/dossier_terrain', [NotariatControleur::class, 'store'])->name('dossier_terrain.store');


Route::post('/changer-traitement', [NotariatControleur::class, 'changerTraitement'])->name('changerTraitement');