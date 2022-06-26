<?php

use App\Http\Controllers\Frontend\User\ContactBookController;
use App\Http\Controllers\Frontend\User\LogInController;
use App\Http\Controllers\Frontend\User\RegistrationController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [ContactBookController::class, 'publicContact'])->name('home');
    Route::post('add-contact', [ContactBookController::class, 'addContactToUser'])->name('addContact');
    Route::get('my-contact', [ContactBookController::class, 'userContacts'])->name('myContact');
    Route::delete('delete-my-contact', [ContactBookController::class, 'deleteContactFromUser'])->name('deleteMyContact');
    Route::get('logout', [LogInController::class, 'logout'])->name('logout');
});

//Login routers
Route::get('login', [LogInController::class, 'logIn'])->name('login');
Route::post('sign-me-in', [LogInController::class, 'signIn'])->name('sign-me-in');
//Registration routers
Route::get('registration', [RegistrationController::class, 'registration'])->name('registration');
Route::post('sign-up', [RegistrationController::class, 'createNewUser'])->name('signUp');
