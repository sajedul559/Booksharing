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

Route::get('/', 'PagesController@index')->name('index');

Route::get('/books/search', 'BooksController@search')->name('books.search');

Route::get('/books/advance_search', 'BooksController@advancesearch')->name('books.searched.advance');



Route::get('/book', 'BooksController@index')->name('books.index');
Route::get('/books/{slug}', 'BooksController@show')->name('books.show');
Route::get('/books/upload/new', 'BooksController@create')->name('books.upload');
Route::post('/books/store', 'BooksController@store')->name('books.store');



Route::get('/books/categories/{slug}', 'CategoriesController@show')->name('categories.show');

Route::group(['prefix' => 'users'], function () {
    Route::get('/profile/{username}', 'UsersController@profile')->name('users.profile');
    Route::get('/profile/{username}/books', 'UsersController@books')->name('users.books');
});
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('users.dashboard');
    Route::get('/books', 'DashboardController@books')->name('users.dashboard_books');
    Route::get('/books/edit/{slug}', 'DashboardController@bookEdit')->name('users.dashboard.books.edit');
    Route::post('/books/update/{slug}', 'DashboardController@bookUpdate')->name('users.dashboard.books.update');
    Route::post('/books/delete/{slug}', 'DashboardController@bookDelete')->name('users.dashboard.books.delete');

    Route::post('/books/request/{slug}', 'DashboardController@bookRequest')->name('books.request');
    Route::post('/books/request/update/{slug}', 'DashboardController@bookRequestupdate')->name('books.request.update');
    Route::post('/books/request/delete/{slug}', 'DashboardController@bookRequestdelete')->name('books.request.delete');
});

Route::group(['prefix' => 'adminn'], function () {
    Route::get('/', 'Backend\PagesController@index')->name('admin.index');

    Route::group(['prefix' => 'books'], function () {
        Route::get('/', 'Backend\BooksController@index')->name('admin.books.index');
        // Route::get('/{id}', 'Backend\BooksController@index')->name('admin.books.show');
        Route::get('/create', 'Backend\BooksController@create')->name('admin.books.create');
        Route::get('/edit{id}', 'Backend\BooksController@edit')->name('admin.books.edit');
        Route::post('/store', 'Backend\BooksController@store')->name('admin.books.store');
        Route::post('/update{id}', 'Backend\BooksController@update')->name('admin.books.update');

        Route::post('/delete{id}', 'Backend\BooksController@destroy')->name('admin.books.delete');
    });
    Route::group(['prefix' => 'authors'], function () {
        Route::get('/', 'Backend\AuthorsController@index')->name('admin.authors.index');
        Route::get('/{id}', 'Backend\AuthorsController@index')->name('admin.authors.show');
        Route::post('/store', 'Backend\AuthorsController@store')->name('admin.authors.store');
        Route::post('/update{id}', 'Backend\AuthorsController@update')->name('admin.authors.update');
        Route::post('/delete{id}', 'Backend\AuthorsController@destroy')->name('admin.authors.delete');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories.index');
        Route::get('/{id}', 'Backend\CategoriesController@index')->name('admin.categories.show');
        Route::post('/store', 'Backend\CategoriesController@store')->name('admin.categories.store');
        Route::post('/update{id}', 'Backend\CategoriesController@update')->name('admin.categories.update');
        Route::post('/delete{id}', 'Backend\CategoriesController@destroy')->name('admin.categories.delete');
    });

    Route::group(['prefix' => 'publishers'], function () {
        Route::get('/', 'Backend\PublilshersController@index')->name('admin.publishers.index');
        Route::get('/{id}', 'Backend\PublilshersController@index')->name('admin.publishers.show');
        Route::post('/store', 'Backend\PublilshersController@store')->name('admin.publishers.store');
        Route::post('/update{id}', 'Backend\PublilshersController@update')->name('admin.publishers.update');
        Route::post('/delete{id}', 'Backend\PublilshersController@destroy')->name('admin.publishers.delete');
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
