<?php

// web routes  for post
Route::prefix('{guard}/posts')->group(function () {
    Route::resource('post', 'PostResourceController');
});


if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}',
            'where'  => ['trans' => Trans::keys('|')],
        ],
        function () {
            // Guard routes for posts
            Route::prefix('{guard}/posts')->group(function () {
                Route::apiResource('post', 'PostResourceController');
            });
        }
    );
}


// web routes  for channel
Route::prefix('{guard}/posts')->group(function () {
    Route::resource('channel', 'ChannelResourceController');
});


if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}',
            'where'  => ['trans' => Trans::keys('|')],
        ],
        function () {
            // Guard routes for posts
            Route::prefix('{guard}/posts')->group(function () {
                Route::apiResource('channel', 'ChannelResourceController');
            });
        }
    );
}

