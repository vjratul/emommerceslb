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

Route::get('/', [
    'uses' =>'FrontHomeController@index',
    'as'=> 'front.home'
  
]);

Route::get('/singleproduct/{id}',[
    'uses'=>'SingleProductController@show',
    'as'=>'one.product'
]);
Route::get('/products/{id}',[
    'uses'=>'ProductsController@store',
    'as'=>'products.group'
]);
Route::get('/category/{id}',[
    'uses'=>'ProductsController@category',
    'as'=>'category.single'
]);
Auth::routes();



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/home', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);
    Route::get('/post/create',[
    'uses'=>'PostsController@create',
    'as'=>'post.create'
     ]);
     Route::get('/posts',[
        'uses'=>'PostsController@index',
        'as'=>'posts'
         ]);
    Route::post('/post/store',[
    'uses'=>'PostsController@store',
    'as'=>'post.store'
    ]);
    Route::post('/post/update/{id}',[
        'uses'=>'PostsController@update',
        'as'=>'post.update'
        ]);
    Route::get('post/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);
    Route::get('posts/trashed',[
        'uses'=>'PostsController@trashed',
        'as'=>'posts.trashed'
    ]);
    
    Route::get('posts/kill/{id}',[
        'uses'=>'PostsController@kill',
        'as'=>'post.kill'
    ]);
    Route::get('posts/restore/{id}',[
        'uses'=>'PostsController@restore',
        'as'=>'post.restore'
    ]);
    Route::get('posts/edit/{id}',[
        'uses'=>'PostsController@edit',
        'as'=>'post.edit'
    ]);
    Route::get('/category/create',[
    'uses'=>'CategoriesController@create',
    'as'=>'category.create'
    ]);
    Route::post('/category/store',[
    'uses'=>'CategoriesController@store',
    'as'=>'category.store'
    ]);
    Route::get('/categories',[
        'uses'=>'CategoriesController@index',
        'as'=>'categories'
    ]);
    Route::get('category/edit/{id}',[
        'uses'=>'CategoriesController@edit',
        'as'=>'category.edit'
    ]);
    Route::get('category/delete/{id}',[
        'uses'=>'CategoriesController@destroy',
        'as'=>'category.delete'
    ]);
    Route::post('/category/update/{id}',[
        'uses'=>'CategoriesController@update',
        'as'=>'category.update'
        ]);
      


});