<?php

// Resource routes  for post
Route::group(['prefix' => '{guard}/posts'], function () {
    Route::resource('post', 'PostResourceController');
});



// Resource routes  for channel
Route::group(['prefix' => '{guard}/posts'], function () {
    Route::resource('channel', 'ChannelResourceController');
});


