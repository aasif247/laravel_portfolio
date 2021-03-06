<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\AboutPagesController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PortfolioPagesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('portfolio', [PagesController::class, 'index'])->name('index');

Route::group(['prefix' => 'admin'], function () {

Route::get('/dashboard', [MainPagesController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/main', [MainPagesController::class, 'index'])->name('admin.main');
Route::put('/main', [MainPagesController::class, 'update'])->name('admin.main.update');

Route::get('/service/create', [ServicePagesController::class, 'create'])->name('admin.service.create');
Route::post('/service/store', [ServicePagesController::class, 'store'])->name('admin.service.store');
Route::get('/service/list', [ServicePagesController::class, 'list'])->name('admin.service.list');
Route::get('/service/edit/{id}', [ServicePagesController::class, 'edit'])->name('admin.service.edit');
Route::post('/service/update/{id}', [ServicePagesController::class, 'update'])->name('admin.service.update');
Route::delete('/service/destroy/{id}', [ServicePagesController::class, 'destroy'])->name('admin.service.destroy');

Route::get('/portfolio/create', [PortfolioPagesController::class, 'create'])->name('admin.portfolio.create');
Route::put('/portfolio/store', [PortfolioPagesController::class, 'store'])->name('admin.portfolio.store');
Route::get('/portfolio/list', [PortfolioPagesController::class, 'list'])->name('admin.portfolio.list');
Route::get('/portfolio/edit/{id}', [PortfolioPagesController::class, 'edit'])->name('admin.portfolio.edit');
Route::post('/portfolio/update/{id}', [PortfolioPagesController::class, 'update'])->name('admin.portfolio.update');
Route::delete('/portfolio/destroy/{id}', [PortfolioPagesController::class, 'destroy'])->name('admin.portfolio.destroy');

Route::get('/about/create', [AboutPagesController::class, 'create'])->name('admin.about.create');
Route::put('/about/store', [AboutPagesController::class, 'store'])->name('admin.about.store');
Route::get('/about/list', [AboutPagesController::class, 'list'])->name('admin.about.list');
Route::get('/about/edit/{id}', [AboutPagesController::class, 'edit'])->name('admin.about.edit');
Route::post('/about/update/{id}', [AboutPagesController::class, 'update'])->name('admin.about.update');
Route::delete('/about/destroy/{id}', [AboutPagesController::class, 'destroy'])->name('admin.about.destroy');
});

Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');