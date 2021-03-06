<?php

use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\ResendVerification;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
// Route::get('/students',function(){
//         return "Data shows all apis ";
// });

        //PUBLIC ROUTES
        // Route::get('/students',[StudentController::class,'index']);
        // Route::get('/students/{id}',[StudentController::class,'show']);
        // Route::post('/students',[StudentController::class,'store']);
        // Route::put('/students/{id}',[StudentController::class,'update']);
        // Route::delete('/students/{id}',[StudentController::class,'destroy']);
        // Route::get('/students/search/{city}',[StudentController::class,'Search']);
     
       // Route::post('/register',[UserController::class,'register']);
        //  Route::resource('/students',StudentController::class);


                // Protected Routes By usinG Middleware
                
                //Route::middleware('auth:sanctum')->get('/students',[StudentController::class,'index']);

        Route::middleware(['auth:sanctum'])->group(function(){

        Route::get('/students',[StudentController::class,'index']);
        Route::get('/students/{id}',[StudentController::class,'show']);
        Route::post('/students',[StudentController::class,'store']);
        Route::put('/students/{id}',[StudentController::class,'update']);
        Route::delete('/students/{id}',[StudentController::class,'destroy']);
        
        
        Route::post('/logout',[UserController::class,'logout']);

                

        
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
$request->fulfill();
 
    //return redirect('/home');
})->name('verification.verify');


Route::post('/email/verification-notification',[ResendVerification::class,'Resend']);



});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::get('/students/search/{city}',[StudentController::class,'Search']);

Route::post('/forgot-password',[NewPasswordController::class,'forgot']);
// verfication Email


//Route::post('reset-password',[RestPassword::class,'reset']);
Route::post('reset-password',[ResetPasswordController::class,'reset']);

Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');



