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

// Show Story and Tag relationship
Route::get('/relay', function () {
    return App\Story::find(18)->tags;
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/story/', 'StoryController@index')                                    ->name('story.index');
    Route::get('/admin/story/create', 'StoryController@create')                             ->name('story.create');
    Route::post('/admin/story/', 'StoryController@store')                                   ->name('story.store');
    Route::get('/admin/story/{id}', 'StoryController@show')                                 ->name('story.show');
    // Route::get('/admin/story/{id}/edit', 'StoryController@edit')                            ->name('story.edit');
    Route::patch('/admin/story/{id}/update', 'StoryController@update')                      ->name('story.update');
    Route::delete('/admin/story/{id}/delete', 'StoryController@delete')                     ->name('story.delete');
    Route::delete('/admin/story/{id}/destroy', 'StoryController@destroy')                   ->name('story.destroy');
    Route::post('/admin/story/{id}/restore', 'StoryController@restore')                     ->name('story.restore');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/tag/', 'TagController@index')                                    ->name('tag.index');
    Route::get('/admin/tag/create', 'TagController@create')                             ->name('tag.create');
    Route::post('/admin/tag/', 'TagController@store')                                   ->name('tag.store');
    Route::get('/admin/tag/{id}', 'TagController@show')                                 ->name('tag.show');
    Route::get('/admin/tag/{id}/edit', 'TagController@edit')                            ->name('tag.edit');
    Route::patch('/admin/tag/{id}/update', 'TagController@update')                      ->name('tag.update');
    Route::delete('/admin/tag/{id}/destroy', 'TagController@destroy')                     ->name('tag.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/team/', 'UserController@index')                                    ->name('user.index');
    Route::get('/admin/team/{slug}', 'UserController@show')                                 ->name('user.show');
    Route::post('/admin/team/', 'UserController@store')                                   ->name('user.store');
    Route::patch('/admin/team/{id}/update', 'UserController@update')                      ->name('user.update');
    Route::patch('/admin/team/{id}/password', 'UserController@password')                      ->name('user.password');
});
