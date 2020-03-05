<?php 


Route::group(['middleware' => ['web','roles','subscription'],'prefix' => 'knitter'], function () {
	
	Route::get('/dashboard','Knitter\KnitterController@index');

	Route::get('dashboard', [
        'uses' => 'Knitter\KnitterController@index',
        'as' => 'dashboard',
        'roles' => ['Knitter'],
        'subscription' => ['Free','Basic']
    ]);

	Route::get('add-measurementset','Knitter\KnitterMeasurementController@add_measurements');

	Route::get('/measurements/edit/{id}','Knitter\KnitterMeasurementController@edit_measurements');

	Route::get('/measurements/delete/{id}','Knitter\KnitterMeasurementController@delete_measurements');
	Route::get('load-measurements','Knitter\KnitterMeasurementController@load_measurements');
	Route::get('measurements','Knitter\KnitterMeasurementController@get_my_measurements');
	Route::post('update-variables','Knitter\KnitterMeasurementController@update_variables');

	Route::post('update-measurements','Knitter\KnitterMeasurementController@update_measurements');

	Route::post('upload-measurement-picture','Knitter\KnitterMeasurementController@upload_measurement_picture');

	Route::post('create-measurements','Knitter\KnitterMeasurementController@create_measurements');
	Route::get('get-measurement-variables/{id}/{mp}','Knitter\KnitterMeasurementController@get_measurement_variables');

	Route::get('measurements/confirmation/{id}','Knitter\KnitterMeasurementController@measurement_confirmation');
Route::post('measurements/delete-picture','Knitter\KnitterMeasurementController@delete_picture');
Route::post('measurements/delete-only-picture','Knitter\KnitterMeasurementController@delete_only_picture');


/* Project library routes */

Route::get('project-library','Knitter\ProjectController@home');
Route::get('project-library/archive','Knitter\ProjectController@archive');
Route::get('create-project','Knitter\ProjectController@create_project');
Route::post('project-to-archive','Knitter\ProjectController@project_to_archive');
Route::post('project-to-library','Knitter\ProjectController@project_to_library');
Route::post('delete-project','Knitter\ProjectController@delete_project');
Route::get('project/external','Knitter\ProjectController@project_external');
Route::post('project/change-status','Knitter\ProjectController@project_change_status');
Route::post('project-image','Knitter\ProjectController@project_images');
Route::post('remove-project-image','Knitter\ProjectController@remove_project_image');
Route::post('create-project-external','Knitter\ProjectController@upload_project');
Route::get('generate-pattern/{id}/{slug}','Knitter\ProjectController@generate_external_pattern');

Route::post('addNotes','Knitter\ProjectController@project_notes_add');
Route::post('noteComplete','Knitter\ProjectController@project_notes_completed');
Route::post('deleteNote','Knitter\ProjectController@project_notes_delete');
Route::post('deleteAllNote','Knitter\ProjectController@project_notes_delete_all');

Route::get('project/{id}/images','Knitter\ProjectController@upload_more_images');
Route::post('project/my-images/{id}','Knitter\ProjectController@upload_project_images_own');

Route::post('create-project-custom','Knitter\ProjectController@create_project_custom');
Route::post('create-project-noncustom','Knitter\ProjectController@create_project_noncustom');

Route::post('create-custom-project','Knitter\ProjectController@create_custom_project');
Route::post('create-noncustom-project','Knitter\ProjectController@create_noncustom_project');
Route::get('generate-noncustom-pattern/{id}/{slug}','Knitter\ProjectController@generate_noncustom_pattern');
Route::get('generate-custom-pattern/{id}/{slug}','Knitter\ProjectController@generate_custom_pattern');

Route::get('subscription','Knitter\SubscriptionController@index');

Route::get('paypal/ec-checkout', 'Knitter\SubscriptionController@getExpressCheckout');
Route::get('paypal/ec-checkout-success', 'Knitter\SubscriptionController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'Knitter\SubscriptionController@getAdaptivePay');

Route::get('subscription/cancel-payment','Knitter\SubscriptionController@cancel_payment');
});