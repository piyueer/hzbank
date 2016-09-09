<?php
namespace App\Libs\Myclass\Tools;

class DataConversionBefore{
	
	public static function array_iconv($in_charset,$out_charset,$arr){    
			return eval('return '.iconv($in_charset,$out_charset,var_export($arr,true).';'));    
	} 
	
	public static function dataConversion($data){
		header("Content-Type: text/html;charset=utf-8");
		$result = array();
		$result_tmp = array();
		if($data['idMatched'] == "1" ){
			$result['idMatched'] = '���û������������֤���룬�ֻ�������ȫƥ��';
		
			switch($data['onlineTime'])
					{
						case "0":
							$result['onlineTime'] = '���û�����ʱ��Ϊ1������';
							break;
						case "1":
							$result['onlineTime'] = '���û�����ʱ��Ϊ1-2��֮��';
							break;
						case "2":
							$result['onlineTime'] = '���û�����ʱ��Ϊ2-3��֮��';
							break;
						case "3":
							$result['onlineTime'] = '���û�����ʱ��Ϊ3-6��֮��';
							break;
						case "4":
							$result['onlineTime'] = '���û�����ʱ��Ϊ6-10��֮��';
							break;
						case "5":
							$result['onlineTime'] = '���û�����ʱ��Ϊ10��֮��';
							break;
					}
			

			$result_join['busyLoc'] = $data['busyLoc'];

			$result_join['freeLoc'] = $data['freeLoc'];
	
					
		 	switch($data['voiceBillLevel'])
		 			{
		 				case "0":
							$result['voiceBillLevel'] = '��������������0-150Ԫ';
		 					break;
						case "1":
							$result['voiceBillLevel'] = '��������������150-300Ԫ';
		 					break;
						case "2":
							$result['voiceBillLevel'] = '��������������300-500Ԫ';
		 					break;
						case "3":
							$result['voiceBillLevel'] = '��������������500-900Ԫ';
		 					break;
						case "4":
							$result['voiceBillLevel'] = '�������������Ѵ���900Ԫ';
		 					break;
		 			}	
					
		 	switch($data['dataBillLevel'])
		 			{
						case "0":
							$result['dataBillLevel'] = '��������������0-60Ԫ';
		 					break;
						case "1":
							$result['dataBillLevel'] = '��������������60-120Ԫ';
		 					break;
						case "2":
							$result['dataBillLevel'] = '��������������120-180Ԫ';
		 					break;
						case "3":
							$result['dataBillLevel'] = '��������������180-240Ԫ';
		 					break;
						case "4":
							$result['dataBillLevel'] = '�������������Ѵ���240Ԫ';
		 					break;	
		 			}	
					
		 	switch($data['spBillLevel'])
		 			{
		 				case "0":
							$result['spBillLevel'] = '������spҵ������0-20Ԫ';
		 					break;
						case "1":
							$result['spBillLevel'] = '������spҵ������20-40Ԫ';
		 					break;
						case "2":
							$result['spBillLevel'] = '������spҵ������40-60Ԫ';
		 					break;
						case "3":
							$result['spBillLevel'] = '������spҵ�����Ѵ���60Ԫ';
		 					break;
		 			}	
					

			//$result['industry'] = $data['industry'];
			$result['industry'] = '��ó��';


		 	switch($data['casinoAreaLevel'])
		 			{
		 				case "0":
							$result['casinoAreaLevel'] = '�ڹ�ȥ���������ڰ��š��¼��¡���������������0��';
		 					break;
						case "1":
							$result['casinoAreaLevel'] = '�ڹ�ȥ���������ڰ��š��¼��¡���������������1-2��';
		 					break;
						case "2":
							$result['casinoAreaLevel'] = '�ڹ�ȥ���������ڰ��š��¼��¡���������������3-4��';
		 					break;
						case "3":
							$result['casinoAreaLevel'] = '�ڹ�ȥ���������ڰ��š��¼��¡���������������4������';
		 					break;
		 			}	

		// 	switch($data['badWordsSearchLevel'])
		// 			{
		// 				case "1":
							$result['badWordsSearchLevel'] = '�ڹ�ȥ�������������������ϵĹؼ���1-3��';
		// 					break;
		// 					//....
		// 			}	

		 	switch($data['billOverDueLevel'])
		 			{
		 				case "1":
							$result['billOverDueLevel'] = '�ڹ�ȥ��������Ƿ��0��';
		 					break;
		 				case "2":
							$result['billOverDueLevel'] = '�ڹ�ȥ��������Ƿ��0-3��';
		 					break;
						case "3":
							$result['billOverDueLevel'] = '�ڹ�ȥ��������Ƿ��3-5��';
		 					break;
						case "4":
							$result['billOverDueLevel'] = '�ڹ�ȥ��������Ƿ��5������';
		 					break;
		 			}	

		// 	switch($data['mostFrequentNumber'])
		// 			{
		// 				case "13805714567:1,13805712345:2,13805711234:3":
							$result['mostFrequentNumber'] = '��13805711234��ϵʱ��Ϊ8-16Сʱ<br/>��13805712345��ϵʱ��Ϊ4-8Сʱ<br/>��13805714567��ϵʱ��Ϊ0-4Сʱ';
		// 					break;
		// 					//....
		// 			}	

		// 	switch($data['powerOffTime'])
		// 			{
		// 				case "2":
							$result['powerOffTime'] = '�ڹ�ȥһ���ڹػ���ʱ��Ϊ16-20Сʱ';
		// 					break;
		// 					//....
		// 			}					
			
			
		}
		else if ($idMatched == "5")
		{
		 	$result['idMatched'] = '���û�δ����ʵ����֤';
		}
		else if ($idMatched == "6")
		{
		 	$result['idMatched'] = '���û�������';
		}
		else
		{
		 	$result['idMatched'] = '���û������������֤���룬�ֻ����벻ƥ��';
		}

		$result = self::array_iconv('gbk','utf-8',$result);
		$result['busyLoc'] = $result_join['busyLoc'];
		$result['freeLoc'] = $result_join['freeLoc'];
		return $result;
	}

}