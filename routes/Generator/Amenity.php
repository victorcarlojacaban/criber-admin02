<?php
/**
 * Amenities
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Amenity'], function () {
        Route::resource('amenities', 'AmenitiesController');
        //For Datatable
        Route::post('amenities/get', 'AmenitiesTableController')->name('amenities.get');
    });
    
});