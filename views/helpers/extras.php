<?php
	class ExtrasHelper extends AppHelper {
		function username($email)
		{
			if(!isset($email))
				return false;
			else
			{
				return substr($email, 0, strpos($email, '@'));
			}
		}
	}
?>
