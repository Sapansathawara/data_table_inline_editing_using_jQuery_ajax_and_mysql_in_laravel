<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/members', [MemberController::class, 'index']);
Route::post('/members_submit', [MemberController::class, 'members_submit']);
Route::PATCH('/members/{id}', [MemberController::class, 'update']);
Route::delete('/members/{id}', [MemberController::class, 'destroy']);

Route::post('/bulk-delete', [MemberController::class, 'bulkDelete']);


