<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;
use App\Http\Controllers\AuthenticatedSessionController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', [AuthManager::class, 'login'])->name('login');
Route::post('login', [AuthManager::class, "loginPost"])->name('login.post');

Route::get('register', [AuthManager::class, 'register'])->name('register');
Route::post('register', [AuthManager::class, 'registerPost'])->name('register.post');


Route::middleware("auth")->group(function () {

    
    Route::get('/dashboard', [TaskManager::class, "listTask"])->name('dashboard');

    // ➕ Create Task
    Route::get('task/add', [TaskManager::class, 'addTask'])->name('task.add');
    Route::post('task/add', [TaskManager::class, 'addTaskPost'])->name('task.add.post');

    // ✅ Update Task Status
    Route::get('task/status/{id}', [TaskManager::class, 'updateTaskstatus'])->name('task.status.update');

   
    Route::get('/tasks/{task}', [TaskManager::class, 'show'])->name('task.show');

    // ✏️ Edit Task
Route::get('task/edit/{task}', [TaskManager::class, 'editTask'])->name('task.edit');
Route::put('/tasks/update/{task}', [TaskManager::class, 'updateTask'])->name('task.update');



Route::delete('/tasks/{task}', [TaskManager::class, 'deleteTask'])->name('task.delete');

Route::get('/dashboard', [TaskManager::class, 'listTask'])->name('dashboard');
Route::patch('/tasks/{id}/toggle-status', [TaskManager::class, 'toggleStatus'])->name('task.toggleStatus');
Route::post('/logout', [AuthManager::class, 'destroy'])->name('logout');

});
