<?php

    use App\Http\Controllers\BoardController;
    use Illuminate\Support\Facades\Route;

    Route::redirect('/', '/boards');

    Route::get('/boards', [BoardController::class, 'index']);
    Route::get('/boards/{board}', [BoardController::class, 'show']);

    Route::post('/boards/{board}/columns', [BoardController::class, 'storeColumn']);
