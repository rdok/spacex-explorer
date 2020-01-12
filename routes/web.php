<?php

Route::get('/', function () {
    $threads = \App\Thread::query()->paginate(3);

    return view('welcome', compact('threads'));
});

Route::resource('threads', 'ThreadController')
    ->except(['destroy', 'edit', 'update']);

Route::post('threads/{thread}/replies', 'ReplyController@store')
    ->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
