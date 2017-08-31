<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
	protected $route = '';
	protected $imageSize = '';
	protected $resize = [];
	protected $imageType = '';
	protected $mime = '';
	protected $image = '';
    public function getImage(Request $request){	
    	$this->route = $request->input('img', '/images/no-image.png');
    	if(!file_exists($this->route)){
    		$this->route = 'images/no-image.png';
    	}
    	list($this->imageSize[0], $this->imageSize[1]) = @getimagesize($this->route);
    	
    	$this->resize[] = (int) $request->input('w', $this->imageSize[0]);
    	
    	if($this->resize[0] <= 150){
    		$this->resize[0] = 200;
    	}
    	
    	if(is_null($request->h)){
    		$persentaje = (($this->resize[0]*100)/$this->imageSize[0])/100;    		
    		$this->resize[] = (int) round($this->imageSize[1]*$persentaje);
    	}else{
    		$this->resize[] = (int) $request->input('h', $this->imageSize[0]);
    	}
    	
    	$this->mime = @mime_content_type($request->img);
    	$this->getType();
    	$this->createImage();
    	$this->showImage();
	}
	
	private function showImage(){
		header('Content-Type: '.$this->mime);
		$function = "image".$this->imageType;
		$function($this->image);
		imagedestroy($this->image);
	}
	
	private function createImage(){
		$function = '\imagecreatefrom'.$this->imageType;
		$image = $function($this->route);
		
		imageAlphaBlending($image, true);
		imageSaveAlpha($image, true);
		
		$thumb = $this->resize($image);
		
		$this->image = $thumb;
	}
	
	private function resize($image){
				
		$thumb = imagecreatetruecolor($this->resize[0], $this->resize[1]);
		
		imageAlphaBlending($thumb, true);
		imagesavealpha($thumb, true);
		$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
		imagefill($thumb, 0, 0, $trans_colour);
		
		imagecopyresized($thumb, $image, 0, 0, 0, 0, $this->resize[0], $this->resize[1], $this->imageSize[0], $this->imageSize[1]);
		
		return $thumb;
	}
	
	private function getType(){
		
		switch ($this->mime){
			case 'image/gif':
				$this->imageType = 'gif';
			break;
			case 'image/jpeg':
				$this->imageType = 'jpeg';
			break;
			case 'image/png':
				$this->imageType = 'png';
			break;
			default:
				$this->imageType = 'png';
			break;
		}
		
	}
}
