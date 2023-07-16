<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () { 
    // return view('welcome'); 

    // fetch all users
    $users = DB::select("select * from users");

    // create new user
    // $user = DB::insert('insert into users (username, email, password) values (?,?,?)', [
    //     'azmi', 
    //     'azmi.3@gmail.com',
    //     'password',
    // ]);

    // update a user
    // $user = DB::update("update users set email=? where id=?", [
    //     'azmi3@gmail.com',
    //     3
    // ]);

    // delete a user
    $user = DB::delete("delete from users where id=3");
    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
