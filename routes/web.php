<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// The homepage
Route::get('/', function () {

    // Returning the file resources\views\posts.blade.php
    // where 'Post::latest()->get()' is inserted at the place of
    // $posts
    return view('posts',
    ['posts' =>  Post::latest()->get() ]
    );

});

// The page where posts are displayed
Route::get('posts/{post:slug}', function (Post $post) {

  // Returning the file at resources\views\posts.blade.php
  // where the variable $post is the post which has
  // the same slug as in the link
  return view('posts.show',
  ['post' =>  $post]);

});

// A route where all posts can be seen
Route::get('admin/posts/index', [AdminPostController::class, 'index'])->middleware('can:admin');

// ->middleware('can:admin') uses the gate 'admin'
// defined in the app\Providers\AppServiceProvider.php
// file to make middleware that allows access to the
// admin and no one else.

// A route that deletes a post and
// returns the user to the admin index page
Route::delete("admin/posts/delete/{post:slug}", [AdminPostController::class, 'destroy'])->middleware('can:admin');

// The page where the post is edited
Route::get( "/admin/posts/{post:slug}/edit", [AdminPostController::class, 'edit'])->middleware('can:admin');

// The route where the editing is performed on a post
Route::patch("admin/posts/{post:slug}/update", [AdminPostController::class, 'update'] )->middleware('can:admin');

// Sends us to the page where posts can be created
Route::get("/admin/posts/create", [AdminPostController::class, 'create'])->middleware('can:admin');

// The route where posts are created
Route::post("/admin/posts/create", [AdminPostController::class,'newPost'])->middleware('can:admin');

// The route to the register page
// at resources\views\register\create.blade.php
Route::get('/register',
[RegisterController::class,'create'])
->middleware('guest');
// This page is only accessible to guests,
// hence '->middleware('guest')

// Validate, store and log in the user after registration
Route::post('/register' ,
[RegisterController::class, 'validateStoreAndLogin'])
->middleware('guest');
// This form action is only for those
// that are not authenticated/logged in
// hence '->middleware('guest')

// Logout the user/destroy session
Route::get('/logout',
[SessionsController::class,'destroy'])
->middleware('auth');
// Only authenticated/logged in users
// can log out, hence '->middleware('auth')


// The login form
// Takes us to the login page
Route::get('/login',
[SessionsController::class,'login'])
->middleware('guest');
// Only those users that are not
// logged in/not authenticated can
// access the login page and use
// the login form

// Creating a session/logging in user
// from typed in credentials
Route::post('/login',
[SessionsController::class,'create'])
->middleware('guest');
// This action of logging in
// the user is only for those
// not logged in/not authenticated
// hence '>middleware('guest')'

