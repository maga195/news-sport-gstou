<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CrundController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('categories.all');
Route::get('/article/{slug}', [FrontController::class, 'article']);

//Route::get('/document-article/{slug}', [FrontController::class, 'documentArticle']);

Route::get('/category/{slug}', [FrontController::class, 'category']);

Route::get('/dcategory/{slug}', [FrontController::class, 'dCategory']);

Route::get('/multi-gallery', [FrontController::class, 'multiGallery']);

Route::get('/youtube', [FrontController::class, 'youtube']);

Route::get('/video', [FrontController::class, 'video']);

Route::get('/screenvideo/{slug}', [FrontController::class, 'screenVideo']);

Route::get('/plan-events', [FrontController::class, 'planEvents']);


Route::get('/project',[FrontController::class, 'project']);


//Admin
Route::get('/post', [FrontController::class, 'post']);

Route::get('/news-admin', [AdminController::class, 'admin']);


//Category
Route::get('/viewcategory', [AdminController::class, 'viewCategory']);





Route::post('/addcategory', [CrundController::class, 'addCategory']);

Route::get('/editcategory/{cid}', [AdminController::class, 'editCategory']);

Route::post('/updatecategory/{cid}', [CrundController::class, 'updateCategory']);

Route::post('/multipledelete', [AdminController::class, 'multipleCategory']);

//DCategory
Route::get('/viewdcategory', [AdminController::class, 'viewDCategory']);

Route::get('/editdcategory/{cid}', [AdminController::class, 'editDCategory']);

Route::post('/updatedcategory/{cid}', [CrundController::class, 'updateDCategory']);
//Gallery

Route::get('/galleries', [AdminController::class, 'viewGallery']);

Route::post('/addgallery', [AdminController::class, 'addGallery']);

//Video

Route::get('/viewvideo', [AdminController::class, 'viewVideo']);



//Youtube
// Route::get('/viewyoutube', [AdminController::class, 'viewYoutube']);
// Route::get('/edityoutube/{yid}', [AdminController::class, 'editYoutube']);


//Setting

Route::get('/settings', [AdminController::class, 'setting']);
Route::post('/addsettings', [CrundController::class, 'addCategory']);
Route::post('/addsocial', [CrundController::class, 'addCategory']);
Route::post('/updatesettings/{sid}', [CrundController::class, 'updateCategory']);

//Route::get('/page/{slug}',[FrontController::class, 'page']);
//Route::get('/contact-us', [FrontController::class, 'contactUs']);
//Route::post('/sendмessage', [CrundController::class, 'addCategory']);
//Route::get('messages', [AdminController::class, 'messages']);

//Post
Route::get('/add-post', [AdminController::class, 'addPost']);
Route::post('/addpost', [CrundController::class, 'addCategory']);
Route::get('/all-posts', [AdminController::class, 'allPosts']);
Route::get('/editpost/{pid}', [AdminController::class, 'editPost']);
Route::post('/updatepost/{pid}', [CrundController::class, 'updateCategory']);

Route::get('/search-content', [FrontController::class, 'searchContent']);


//Docuemnt

Route::get('/add-document', [AdminController::class, 'addDocument']);
Route::post('/add-document', [CrundController::class, 'addCategory']);
Route::get('/all-documents', [AdminController::class, 'allDocuments']);
Route::get('/editdocument/{did}', [AdminController::class, 'editDocument']);
Route::post('/updatedocument/{did}', [CrundController::class, 'updateCategory']);



//Page
Route::get('/add-page', [AdminController::class, 'addpage']);
Route::post('/addpage', [CrundController::class, 'addCategory']);
Route::get('/all-pages', [AdminController::class, 'allpages']);
Route::get('/editpage/{pid}', [AdminController::class, 'editPage']);
Route::post('/updatepage/{pid}', [CrundController::class, 'updateCategory']);

//Advertisement
// Route::get('/add-adv', [AdminController::class, 'addAdv']);
// Route::post('/addadv', [CrundController::class, 'addCategory']);
// Route::get('/all-advs', [AdminController::class, 'allAdv']);
// Route::get('/editadv/{aid}', [AdminController::class, 'editAdv']);
// Route::post('/updateadv/{aid}', [CrundController::class, 'updateCategory']);

Auth::routes(['register' => false]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


