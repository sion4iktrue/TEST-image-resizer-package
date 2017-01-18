<?php
namespace Smarty\ImageResizer\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;


class ImageResizerController extends Controller {

	public 	$url_error = '',
			$manager = false;

	function __construct()
	{
		$this->url_error = 'There`s no image!';
		$this->manager = new ImageManager(array('driver' => 'gd'));
	}

	public function index()
	{
		return view('imageresizer::resize');
	}

    public function resizeRequest(Request $request) 
    {
    	return $this->resize($request->url, $request->width, $request->height);
    }
    
    public function resize($url, $width, $height) 
    {
    	$img = false; 

		if (!$url || !@getimagesize($url)) 
			return $this->url_error;

		$img = $this->manager->make($url);

		if ($img && (is_numeric($width) || is_numeric($height)))
			$img->resize($width? : null, $height? : null);

		return $img->encode('data-url')->encoded;
    }
}
?>