<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Maksuco\LangJson\Http\Controllers'], function () {
	Route::get('/langjson', [LangJsonController::class, 'index'])->name('langjson');
	Route::post('/langjson', [LangJsonController::class, 'post'])->name('langjson_post');
	Route::get('/langjson_scan', [LangJsonController::class, 'scan'])->name('langjson_scan');
});