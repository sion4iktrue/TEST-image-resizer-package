<?php
namespace Smarty\ImageResizer;

use Illuminate\Support\ServiceProvider;
 

class ImageResizerServiceProvider extends ServiceProvider {

    public function boot()
    {
		require base_path('vendor/autoload.php');

    	$this->loadViewsFrom(__DIR__.'/Views', 'imageresizer');
    }

    public function register()
    {
		include __DIR__.'/routes/web.php';
		
        $this->app->make('Smarty\ImageResizer\Http\Controllers\ImageResizerController');
    }

}
?>