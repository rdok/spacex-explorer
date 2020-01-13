<?php

use App\Thread;

Route::get('/', function () {
    $threads = Thread::query()->orderBy('updated_at', 'desc')->paginate(3);

    return view('welcome', compact('threads'));
});

Route::resource('threads', 'ThreadController')
    ->except(['destroy', 'edit', 'update']);

Route::post('threads/{thread}/replies', 'ReplyController@store')
    ->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
