<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/survey', SurveyController::class);
    Route::get('/show-all-answers', [SurveyController::class, 'showAllAnswers']);
    Route::get('/survey/{survey}/answers', [SurveyController::class, 'showAnswersBySurveyId']);
    Route::get('/survey/{survey}/answer/{surveyAnswer}', [SurveyController::class, 'showAnswerDetails'])->withoutScopedBindings();
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::get('/survey-by-slug/{survey:slug}', [SurveyController::class, 'showForGuest']);
Route::post('/survey/{survey}/answer', [SurveyController::class, 'storeAnswer']);

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
