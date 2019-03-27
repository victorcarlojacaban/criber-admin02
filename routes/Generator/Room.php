<?php
/**
 * Room
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Room'], function () {
        Route::resource('rooms', 'RoomsController');
        //For Datatable
        Route::post('rooms/get', 'RoomsTableController')->name('rooms.get');
    });
    
});