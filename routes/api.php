<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\IssuecategoryController;
use App\Http\Controllers\IssueSubcategoryController;
use App\Http\Controllers\ImageController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/categories/create',[CategoryController::class,'create']);//category route is set with the post to add data
Route::get('categories',[CategoryController::class,'index']);//route to retrieve data
Route::get('/categories/{id}/show',[CategoryController::class,'show']);//route to retrieve data from the specific id
Route::put('/categories/{id}/update',[CategoryController::class,'update']);//route to update data using id
Route::delete('/categories/{id}/delete',[CategoryController::class,'delete']);//route to delete data using id

Route::post('comments/create',[CommentController::class,'create']);
Route::get('comments',[CommentController::class,'index']);
Route::get('/comments/{id}/show',[CommentController::class,'show']);
Route::put('/comments/{id}/update',[CommentController::class,'update']);
Route::delete('/comments/{id}/delete',[CommentController::class,'delete']);

Route::post('issues/create',[IssueController::class,'create']);
Route::get('issues',[IssueController::class,'index']);
Route::get('/issues/{id}/show',[IssueController::class,'show']);
Route::put('/issues/{id}/update',[IssueController::class,'update']);
Route::delete('/issues/{id}/delete',[IssueController::class,'delete']);

Route::post('subcategories/create',[SubcategoryController::class,'create']);
Route::get('subcategories',[SubcategoryController::class,'index']);
Route::get('/subcategories/{id}/show',[SubcategoryController::class,'show']);
Route::put('/subcategories/{id}/update',[SubcategoryController::class,'update']);
Route::delete('/subcategories/{id}/delete',[SubcategoryController::class,'delete']);

Route::post('issue_categories/create',[IssuecategoryController::class,'create']);
Route::get('issue_categories',[IssuecategoryController::class,'index']);
Route::get('/issue_categories/{id}/show',[IssuecategoryController::class,'show']);
Route::put('/issue_categories/{id}/update',[IssuecategoryController::class,'update']);
Route::delete('/issue_categories/{id}/delete',[IssuecategoryController::class,'delete']);

Route::post('issue_subcategories/create',[IssueSubcategoryController::class,'create']);
Route::get('issue_subcategories',[IssueSubcategoryController::class,'index']);
Route::get('/issue_subcategories/{id}/show',[IssueSubcategoryController::class,'show']);
Route::put('/issue_subcategories/{id}/update',[IssueSubcategoryController::class,'update']);
Route::delete('/issue_subcategories/{id}/delete',[IssueSubcategoryController::class,'delete']);

Route::post('images/create',[ImageController::class,'create']);
Route::get('images',[ImageController::class,'index']);
Route::get('/images/{id}/show',[ImageController::class,'show']);
Route::put('/images/{id}/update',[ImageController::class,'update']);
Route::delete('/images/{id}/delete',[ImageController::class,'delete']);


Route::get('data/{id}', [CategoryController::class,'displayCategories']);//Route for category and subcategory relationship
Route::get('data/displayComments/{id}', [IssueController::class,'displayComments']);//Route for issue and comment relationship
Route::get('data/displayImages/{id}', [IssueController::class,'displayImages']);//Route for issue and images relationship
Route::get('data/displayIssueCategory/{id}', [CategoryController::class,'displayIssueCategory']);//Route for issue and category relationship
Route::get('data/displayIssueSubcategory/{id}', [SubcategoryController::class,'displayIssueSubcategory']);//Route for issue and subcategory relationship
