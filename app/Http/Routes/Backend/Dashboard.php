<?php

get('dashboard', 'DashboardController@index')->name('backend.dashboard');
Route::resource('categories', 'CategoryController');
Route::resource('capitals','CapitalController');
Route::resource('income', 'IncomeController');
Route::resource('expenses','ExpenseController');
Route::resource('assets', 'AssetController');
Route::resource('liability', 'LiabilityController');
Route::resource("transactions","TransactionController");