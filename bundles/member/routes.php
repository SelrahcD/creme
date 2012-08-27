<?php

Route::get('suggest', 'member::video@suggest');
Route::post('suggest', 'member::video@suggest');

/**********************************************
 * Account routes
 *********************************************/
Route::controller('member::account');
