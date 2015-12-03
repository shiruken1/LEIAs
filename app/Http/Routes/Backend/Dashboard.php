<?php

get('dashboard', 'DashboardController@index')->name('backend.dashboard');
Route::resource('categories', 'CategoryController');
