<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AccountController@isUser');
Route::post('register', 'AccountController@register');
Route::post('changePassword', 'AccountController@changePassword');

Route::get('getCategory', 'RecipeController@getCategory');
Route::get('getRecipeCategory', 'RecipeController@getRecipeCategory');
Route::post('getCommentRecipe', 'RecipeController@getCommentRecipe');
Route::post('getDetailRecipe', 'RecipeController@getDetailRecipe');
Route::get('getTopTenRecipe', 'RecipeController@getTopTenRecipe');

Route::post('getRecipePerson', 'PersonController@getRecipePerson');
Route::post('getFavoriteRecipePerson', 'PersonController@getFavoriteRecipePerson');
Route::post('getCookedRecipePerson', 'PersonController@getCookedRecipePerson');

Route::post('favoritePerson', 'OwnedController@store');
Route::post('cookedRecipe', 'CookedController@store');

Route::post('storeComment', 'CommentController@store');
Route::post('deleteComment', 'CommentController@destroy');
Route::post('updateComment', 'CommentController@update');
