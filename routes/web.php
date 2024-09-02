<?php

use App\Http\Controllers\ExamContrller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/exam', [ExamContrller::class, 'index'])->name('exam');
Route::get('/result', [ResultController::class, 'index'])->name('result');
Route::get('/result_group', [ResultController::class, 'result_group'])->name('result_group');
Route::get('/create_key', [ResultController::class, 'createKey'])->name('create_key');
Route::get('/workbook_all', [ResultController::class, 'workbook_all'])->name('workbook_all');
Route::get('/workbook_now', [ResultController::class, 'workbook_now'])->name('workbook_now');
Route::get('/save_result', [ResultController::class, 'saveResult'])->name('save_result');
Route::get('/delete_key', [ResultController::class, 'delete_key'])->name('delete_key');
Route::get('/delete_result', [ResultController::class, 'delete_result'])->name('delete_result');
Route::get('/generate', [PdfController::class, 'generateReport'])->name('generate.report');
