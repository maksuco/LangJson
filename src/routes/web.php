<?php

Route::group(['namespace' => 'maksuco\LangJson\Http\Controllers'], function () {
	Route::get('langjson', 'LangJsonController@index')->name('langjson_index');
	Route::post('langjson', 'LangJsonController@post');
});