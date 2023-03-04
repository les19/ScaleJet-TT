<?php

use App\Http\Controllers\Tasks\TaskController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/tasks');
});

Route::get('/{any?}', function () {
    return view('app');
});

Route::prefix('resources')->as('.resources')->group(function ()
{
    Route::resource('tasks', TaskController::class)->only([
        'index', 'store', 'destroy',
    ]);
    Route::post('tasks/{task}/finish', [TaskController::class, 'finish'])
        ->name('tasks.finish');
});
