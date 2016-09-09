<?php
namespace App\Libs\Myclass\Tools;

class DataToScoreAfter{
	
	public static function dataToScore($data){
		$result = array();

			// switch($data['oldNumberUsed'])
			 		// {
			 			// case "0":
			 				// $result['oldNumberUsed'] = 20;
			 				// break;
			 			// case "1":
			 				// $result['oldNumberUsed'] = 30;
			 				// break;
			 			// case "2":
			 				// $result['oldNumberUsed'] = 45;
			 				// break;
			 			// case "3":
			 				// $result['oldNumberUsed'] = 60;
			 				// break;
			 			// case "4":
			 				// $result['oldNumberUsed'] = 80;
			 				// break;
			 			// case "5":
			 				$result['oldNumberUsed'] = 100;
			 				// break;
			 		// }

			switch($data['busyLoc'])
			 		{
			 			case "":
			 				$result['busyLoc'] = 0;
			 				break;
			 			default:
							$result['busyLoc'] = 100;
					}		
		
			switch($data['freeLoc'])
			 		{
			 			case "":
			 				$result['freeLoc'] = 0;
			 				break;
			 			default:
							$result['freeLoc'] = 100;
					}	
					
			switch($data['voiceBillLevel'])
		 			{
		 				case "0":
							$result['voiceBillLevel'] = 20;
		 					break;
						case "1":
							$result['voiceBillLevel'] = 40;
		 					break;
						case "2":
							$result['voiceBillLevel'] = 60;
		 					break;
						case "3":
							$result['voiceBillLevel'] = 80;
		 					break;
						case "4":
							$result['voiceBillLevel'] = 100;
		 					break;
		 			}	
					
		 	switch($data['dataBillLevel'])
		 			{
						case "0":
							$result['dataBillLevel'] = 20;
		 					break;
						case "1":
							$result['dataBillLevel'] = 40;
		 					break;
						case "2":
							$result['dataBillLevel'] = 60;
		 					break;
						case "3":
							$result['dataBillLevel'] = 80;
		 					break;
						case "4":
							$result['dataBillLevel'] = 100;
		 					break;	
		 			}	
					
		 	switch($data['spBillLevel'])
		 			{
		 				case "0":
							$result['spBillLevel'] = 25;
		 					break;
						case "1":
							$result['spBillLevel'] = 50;
		 					break;
						case "2":
							$result['spBillLevel'] = 75;
		 					break;
						case "3":
							$result['spBillLevel'] = 100;
		 					break;
		 			}	

			switch($data['casinoAreaLevel'])
		 			{
		 				case "0":
							$result['casinoAreaLevel'] = 100;
		 					break;
						case "1":
							$result['casinoAreaLevel'] = 80;
		 					break;
						case "2":
							$result['casinoAreaLevel'] = 20;
		 					break;
						case "3":
							$result['casinoAreaLevel'] = 0;
		 					break;
		 			}	

			// switch($data['badWordsSearchLevel'])
			// 		{
			// 			case "1":
							$result['badWordsSearchLevel'] = 100;
			// 				break;
			// 				//....
			// 		}	

			switch($data['billOverDueLevel'])
		 			{
		 				case "1":
							$result['billOverDueLevel'] = 100;
		 					break;
		 				case "2":
							$result['billOverDueLevel'] = 60;
		 					break;
						case "3":
							$result['billOverDueLevel'] = 30;
		 					break;
						case "4":
							$result['billOverDueLevel'] = 0;
		 					break;
		 			}	

			// switch($data['frequentNumberChanged'])
			// 		{
			// 			case "1":
			// 				$result['frequentNumberChanged'] = 0;
			// 				break;
			//			case "2":
			// 				$result['frequentNumberChanged'] = 60;
			// 				break;
			// 			default:
							$result['frequentNumberChanged'] = 100;
			// 		}	

			// switch($data['powerOffTime'])
			// 		{
			// 			case "2":
							$result['powerOffTime'] = 100;
			// 				break;
			// 				//....
			// 		}					
			
			
			return $result;
		}

}