<?php
/**
 * Testimonial
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

    Route::group( ['namespace' => 'Testimonial'], function () {
        Route::resource('testimonials', 'TestimonialsController');
        //For Datatable
        Route::post('testimonials/get', 'TestimonialsTableController')->name('testimonials.get');
    });

});