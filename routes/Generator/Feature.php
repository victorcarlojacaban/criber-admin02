<?php
/**
 * Feature
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Feature'], function () {
        Route::resource('features', 'FeaturesController');
        //For Datatable
        Route::post('features/get', 'FeaturesTableController')->name('features.get');
    });
    
});