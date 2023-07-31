<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserAccountsController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('LandingPage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'updateProfilePic'])->name('profilepic.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/accounts/view/{id}', [AccountController::class, 'view'])->name('accounts.view');
    Route::get('/accounts', [UserAccountsController::class, 'index'])->name('accounts');
    Route::get('/accounts/view/{account}', [UserAccountsController::class, 'view'])->name('accounts.view');
    Route::patch('/accounts/{account}', [UserAccountsController::class, 'update'])->name('accounts.update');
    Route::post('/accounts/toggle/{account}', [UserAccountsController::class, 'toggleActive'])->name('accounts.toggle')->middleware('role:admin');
    Route::get('/accounts/search/{searchKey}', [UserAccountsController::class, 'search'])->name('accounts.search');
    Route::get('/employees/pdf/{employee}', [employeeController::class, 'generate'])->middleware('role:admin');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create')->middleware('role:admin');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit')->middleware('role:admin');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy')->middleware('role:admin');


    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements');
    Route::post('/announcements/send-mail', [AnnouncementController::class, 'send']);
});
// });

require __DIR__ . '/auth.php';
