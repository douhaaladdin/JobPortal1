<?php

use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/testapi',function(){
    return "Hello api";
});


Route::apiResource('students',StudentController::class);
Route::get('/students',[StudentController::class,'index'])->middleware('auth:sanctum');
/**
 *   GET|HEAD        api/students ........................................ students.index › Api\StudentController@index
 * POST            api/students ........................................ students.store › Api\StudentController@store
  *GET|HEAD        api/students/{student} ................................ students.show › Api\StudentController@show
  *PUT|PATCH       api/students/{student} ............................ students.update › Api\StudentController@update
 * DELETE          api/students/{student} .......................... students.destroy › Api\StudentController@destroy

 */
