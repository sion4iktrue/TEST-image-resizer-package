<?php 

Route::group(array('namespace' => 'Smarty\ImageResizer\Http\Controllers'), function() {
    Route::post('resize', 'ImageResizerController@resizeRequest');
    Route::get('resize','ImageResizerController@index');
});


?>