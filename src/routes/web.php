<?php 

use App\Http\Controllers\TimeStampsController;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth')->group(function () {
Route::get('/', [TimeStampsController::class, 'index']); 
Route::post('/punchin', [TimeStampsController::class, 'punchIn']);
Route::post('/punchout', [TimeStampsController::class, 'punchOut']);
Route::post('/startbreak', [TimeStampsController::class, 'startBreak']);
Route::post('/endbreak', [TimeStampsController::class, 'endBreak']);
Route::get('/attendance', [TimeStampsController::class, 'attendance']);;
// });
