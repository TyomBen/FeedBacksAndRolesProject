<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedBackSendController;
use App\Http\Controllers\FeedbackShowController;
use App\Http\Controllers\ResponseStatusCheckController;

Auth::routes();

Route::get('/', function () {
    return view('auth/register');
})->middleware('register');

Route::get('/my_feedback', function () {
    return view('feedback/feedback');
})->name('my_feedback')->middleware('checkauthclient');

Route::post('/message', [FeedBackSendController::class, 'index'])
->name('sendFeedback')->middleware('throttle:feedback');


Route::get('admin/listOfFeedbacks', [FeedbackShowController::class, 'index'])
->name('feedbacks')->middleware('checkadmin');

Route::patch('/updateResponseStatus/{feedback}', [ResponseStatusCheckController::class, 'index'])
->name('update');
