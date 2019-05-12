<?php

// Resource routes  for merchant
Route::group(['prefix' => set_route_guard('web').'/merchant'], function () {
    Route::put('merchant/workflow/{example}/{step}', 'MerchantWorkflowController@putWorkflow');
    Route::get('merchant/workflow/{example}/{step}/{user}', 'MerchantWorkflowController@getWorkflow');
    Route::resource('merchant', 'MerchantResourceController');
});


