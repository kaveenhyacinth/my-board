<?php

    use App\Http\Controllers\BoardController;
    use App\Http\Controllers\SubTaskController;
    use App\Http\Controllers\TaskController;
    use Illuminate\Support\Facades\Route;

    Route::redirect('/', '/boards');

    Route::name('boards.')->group(function () {
        Route::get('/boards', [BoardController::class, 'index'])->name('index');
        Route::post('/boards', [BoardController::class, 'store'])->name('store');
        Route::get('/boards/{board}', [BoardController::class, 'show'])->name('show');
    });

    Route::name('columns.')->group(function () {
        Route::post('/boards/{board}/columns', [BoardController::class, 'storeColumn'])->name('store');
    });

    Route::name('tasks.')->group(function () {
        Route::post('/tasks', [TaskController::class, 'store'])->name('store');
        Route::get('/boards/{board}/tasks/{task}', [TaskController::class, 'show'])->name('show');
        Route::get('/boards/{board}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('edit');
        Route::patch('/tasks/{task}', [TaskController::class, 'patch'])->name('patch');
        Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('update');
    });

    Route::name('subtasks.')->group(function () {
        Route::post('/tasks/{task}/subtasks', [SubTaskController::class, 'store'])->name('store');
        Route::patch('/tasks/{task}/subtasks/{subtask}', [SubTaskController::class, 'update'])->name('update');
    });
