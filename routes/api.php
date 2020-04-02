<?php

// API routes  for post
Route::prefix('{guard}/postbuffer')->group(function () {
    Route::get('post/form/{element}', 'PostAPIController@form');
    Route::resource('post', 'PostAPIController');
});


if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}',
            'where'  => ['trans' => Trans::keys('|')],
        ],
        function () {
            // Guard routes for postbuffers
            Route::prefix('{guard}/postbuffer')->group(function () {
                Route::get('post/form/{element}', 'PostAPIController@form');
                Route::apiResource('post', 'PostAPIController');
            });
            // Public routes for postbuffers
            Route::get('postbuffer/Post', 'PostPublicController@getPost');
        }
    );
}


// API routes  for channel
Route::prefix('{guard}/postbuffer')->group(function () {
    Route::get('channel/form/{element}', 'ChannelAPIController@form');
    Route::resource('channel', 'ChannelAPIController');
});


if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}',
            'where'  => ['trans' => Trans::keys('|')],
        ],
        function () {
            // Guard routes for postbuffers
            Route::prefix('{guard}/postbuffer')->group(function () {
                Route::get('channel/form/{element}', 'ChannelAPIController@form');
                Route::apiResource('channel', 'ChannelAPIController');
            });
            // Public routes for postbuffers
            Route::get('postbuffer/Channel', 'ChannelPublicController@getChannel');
        }
    );
}

