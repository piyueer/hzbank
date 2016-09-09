<?php
namespace App\Libs\Myclass\Tools;

class ObjectToArray{
	
	public static function objectToArray($array)
	{
	   if(is_object($array))
	   {
		$array = (array)$array;
	   }
	   if(is_array($array))
	   {
		foreach($array as $key=>$value)
		{
		 $array[$key] = self::objectToArray($value);
		}
	   }
	   return $array;
	}
	
}	