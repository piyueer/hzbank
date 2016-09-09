<?php
namespace App\Libs\Myclass\Tools;

class DataConversionAfter{
	
	public static function array_iconv($in_charset,$out_charset,$arr){    
			return eval('return '.iconv($in_charset,$out_charset,var_export($arr,true).';'));    
	} 
	
	public static function dataConversion($data){
		header("Content-Type: text/html;charset=utf-8");
		$result = array();
		$result_tmp = array();
		if($data['idMatched'] == "1" ){
			$result['idMatched'] = '该用户的姓名，身份证号码，手机号码完全匹配';
		
			// switch($data['oldNumberUsed'])
					// {
						// case "0":
							$result['oldNumberUsed'] = '该用户在过去一个月内原注册手机号码通话时长为100-200分钟';
							// break;
						// case "1":
							// $result['oldNumberUsed'] = '';
							// break;
						// case "2":
							// $result['oldNumberUsed'] = '';
							// break;
						// case "3":
							// $result['oldNumberUsed'] = '';
							// break;
						// case "4":
							// $result['oldNumberUsed'] = '';
							// break;
						// case "5":
							// $result['oldNumberUsed'] = '';
							// break;
					// }
			

			$result_join['busyLoc'] = $data['busyLoc'];

			$result_join['freeLoc'] = $data['freeLoc'];
	
					
		 	switch($data['voiceBillLevel'])
		 			{
		 				case "0":
							$result['voiceBillLevel'] = '三个月语言消费0-150元';
		 					break;
						case "1":
							$result['voiceBillLevel'] = '三个月语言消费150-300元';
		 					break;
						case "2":
							$result['voiceBillLevel'] = '三个月语言消费300-500元';
		 					break;
						case "3":
							$result['voiceBillLevel'] = '三个月语言消费500-900元';
		 					break;
						case "4":
							$result['voiceBillLevel'] = '三个月语言消费大于900元';
		 					break;
		 			}	
					
		 	switch($data['dataBillLevel'])
		 			{
						case "0":
							$result['dataBillLevel'] = '三个月数据消费0-60元';
		 					break;
						case "1":
							$result['dataBillLevel'] = '三个月数据消费60-120元';
		 					break;
						case "2":
							$result['dataBillLevel'] = '三个月数据消费120-180元';
		 					break;
						case "3":
							$result['dataBillLevel'] = '三个月数据消费180-240元';
		 					break;
						case "4":
							$result['dataBillLevel'] = '三个月数据消费大于240元';
		 					break;	
		 			}	
					
		 	switch($data['spBillLevel'])
		 			{
		 				case "0":
							$result['spBillLevel'] = '三个月sp业务消费0-20元';
		 					break;
						case "1":
							$result['spBillLevel'] = '三个月sp业务消费20-40元';
		 					break;
						case "2":
							$result['spBillLevel'] = '三个月sp业务消费40-60元';
		 					break;
						case "3":
							$result['spBillLevel'] = '三个月sp业务消费大于60元';
		 					break;
		 			}	
					
		 	switch($data['casinoAreaLevel'])
		 			{
		 				case "0":
							$result['casinoAreaLevel'] = '在过去三个月内在澳门、新加坡、马来西亚漫游了0次';
		 					break;
						case "1":
							$result['casinoAreaLevel'] = '在过去三个月内在澳门、新加坡、马来西亚漫游了1-2次';
		 					break;
						case "2":
							$result['casinoAreaLevel'] = '在过去三个月内在澳门、新加坡、马来西亚漫游了3-4次';
		 					break;
						case "3":
							$result['casinoAreaLevel'] = '在过去三个月内在澳门、新加坡、马来西亚漫游了4次以上';
		 					break;
		 			}	

		// 	switch($data['badWordsSearchLevel'])
		// 			{
		// 				case "1":
							$result['badWordsSearchLevel'] = '在过去三个月内搜索黑名单上的关键字1-3次';
		// 					break;
		// 					//....
		// 			}	

		 	switch($data['billOverDueLevel'])
		 			{
		 				case "1":
							$result['billOverDueLevel'] = '在过去三个月内欠费0次';
		 					break;
		 				case "2":
							$result['billOverDueLevel'] = '在过去三个月内欠费0-3次';
		 					break;
						case "3":
							$result['billOverDueLevel'] = '在过去三个月内欠费3-5次';
		 					break;
						case "4":
							$result['billOverDueLevel'] = '在过去三个月内欠费5次以上';
		 					break;
		 			}	

		// 	switch($data['frequentNumberChanged'])
		// 			{
		// 				case "1":
							$result['frequentNumberChanged'] = '该用户通话圈无明显变化';
		// 					break;
		// 					//....
		// 			}	

		// 	switch($data['powerOffTime'])
		// 			{
		// 				case "2":
							$result['powerOffTime'] = '在过去一周内关机的时长为16-20小时';
		// 					break;
		// 					//....
		// 			}					
			
			
		}
		else if ($idMatched == "5")
		{
		 	$result['idMatched'] = '该用户未进行实名认证';
		}
		else if ($idMatched == "6")
		{
		 	$result['idMatched'] = '该用户不存在';
		}
		else
		{
		 	$result['idMatched'] = '该用户的姓名、身份证号码，手机号码不匹配';
		}

		$result = self::array_iconv('gbk','utf-8',$result);
		$result['busyLoc'] = $result_join['busyLoc'];
		$result['freeLoc'] = $result_join['freeLoc'];
		return $result;
	}

}