<?php
class AuthAccessComponent extends Object {
	var $accessData;
	
	function defineAccess($accessType, $accessFunctions=null)
	{
		if(is_array($accessType) && $accessFunctions==null)
		{
			foreach($accessType as $accessType=>$accessFunctions)
				$this->accessData[$accessType]=array_unique($accessFunctions);
		}
		else
			$this->accessData[$accessType]=$accessFunctions;
	}
	
	function check($action, $authorType='guest')
	{
		if(empty($authorType))
			$authorType='guest';
			
		if(!isset($this->accessData[$authorType]))
			return false;
			
		if(in_array($action, $this->accessData[$authorType]))
			return true;

		return false;
	}
}
?>
