<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
 

Route::post('/signup',
        [ 'uses' => 'UserController@postSignUp', 
           'as' => 'signup']);

Route::get('/logar', 'UserController@logar')->name('logar');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/account', 'UserController@showAccount')
        ->middleware('auth')
        ->name('user.account');

Route::put('user/update', 'UserController@updateAccount')
        ->middleware('auth')
        ->name('user.update');

Route::get('user-image/{filename}', 'UserController@getUserImage')
        ->middleware('auth')
        ->name('user.image');

Route::post('/like', 'LikeController@like')
        ->name('like');

Route::group(['prefix' => 'post'], function(){
    Route::post('/create', 'PostController@createPost')->name('post.create');
    Route::put('/update', 'PostController@update')->name('post.update');
    Route::get('/delete/{id}', 'PostController@postDestroy')->name('post.delete');
    
    //teste 
   // Route::post('/update', function(Illuminate\Http\Request $request){
    //    return response()->json(['message' => $request->input('postId') ]);
   // })->name('post.update');
});


Route::get('/home','PostController@showPosts')->name('home');
