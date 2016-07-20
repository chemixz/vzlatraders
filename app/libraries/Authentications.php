<?php

class Authentications {

	public static function Owner($var1=null,$var2=null)
	{
		$flag = false;
		
		if($var1 ==  $var2)
		{
			$flag = true;
		}
		else
		{
			$flag = false;
		}
		
		return $flag;
	}
	
	

}