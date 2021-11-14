<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () { return view('Bienvenue'); });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/posts', 'PostsController');
Route::resource('/users', 'UserController');
Route::put('/users/avatar/{user}', 'UserController@updateAvatar')->name('user.updateAvatar');
//Route::get('/', 'PostsController@guest');
Route::get('/like-post/{post}', 'PostsController@likePost')->name('post.like');
Route::get('/dislike-post/{post}', 'PostsController@dislikePost')->name('post.dislike');
Route::resource('posts.comments', 'PostCommentController')->only(['store','show']);
Route::resource('/admin', 'AdminUserController');
Route::get('/admin/posts/{admin}', 'AdminUserController@userpost')->name('admin.post');
Route::delete('/admin/posts/{admin}', 'AdminUserController@deleteuserpost')->name('admin.deletepost');
Route::get('/admin/posts/comments/{admin}', 'AdminUserController@userpostcomment')->name('admin.postcomment');
Route::delete('/admin/post/comment/{admin}', 'AdminUserController@deleteuserpostcomment')->name('admin.deletePostComment');