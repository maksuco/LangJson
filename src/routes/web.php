<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Maksuco\LangJson\Http\Controllers'], function () {
	Route::get('langjson', 'LangJsonController@index')->name('langjson');
	Route::post('langjson', 'LangJsonController@post')->name('langjson_post');
	Route::get('langjson_scan', 'LangJsonController@scan')->name('langjson_scan');
});