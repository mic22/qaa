if($options!=null) extract($options);
if(!isset($width)) 		$width=$this->defaultWidth;
if(!isset($height)) 	$height=$this->defaultHeight;	
if(!isset($zoom)) 		$zoom=$this->defaultZoom;			
if(!isset($type)) 		$type=$this->defaultType;		
if(!isset($latitude)) 	$latitude=$this->defaultLatitude;	
if(!isset($longitude)) 	$longitude=$this->defaultLongitude;
if(!isset($localize)) 	$localize=$this->defaultLocalize;		
if(!isset($marker)) 	$marker=$this->defaultMarker;		
if(!isset($markerIcon)) $markerIcon=$this->defaultMarkerIcon;	
if(!isset($infoWindow)) $infoWindow=$this->defaultInfoWindow;	
if(!isset($windowText)) $windowText=$this->defaultWindowText;	
<?php
class GoogleMapHelper extends Helper {
	
	public function options($options)
	{
		if($options!=null) extract($options);
		if(!isset($width)) $width=$this->defaultWidth;
		if(!isset($height)) $height=$this->defaultHeight;
//		
	}
}
?>
