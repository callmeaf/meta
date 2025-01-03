<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config('callmeaf-base.api.prefix_url'))->as(config('callmeaf-base.api.prefix_route_name'))->controller(config('callmeaf-meta.controllers.metas'))->middleware(config('callmeaf-base.api.middlewares'))->group(function() {
    Route::prefix('metas')->as('metas.')->group(function() {
        Route::get('/resource','showResource')->name('resource.show');
    });
});


