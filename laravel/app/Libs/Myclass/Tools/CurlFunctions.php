<?php
namespace App\Libs\Myclass\Tools;

class CurlFunctions{
	
	public static $API_KEY = '55716eb513cb941f0a403488b84b6bff';	
	public static $Source_API_URL = 'https://218.205.68.67:8000/dataex/api/';
	public static $User_ID = 'lirang';
	public static $User_Pass = 'fj%2b3Q82QV98%3d';
		
	public static function getIDMatched($token, $idCard, $number, $authID, $name)
		{
			$url = self::$Source_API_URL."data_pr/cust_check?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number."&card_code=".$idCard."&cust_name=" . $name;

			$final = self::getResultFromURL($url);

			// var_dump($final);

			// die($url);


			if ($final && $final[0] && is_array($final[0]) && array_key_exists('cust_check', $final[0]))
			{
				return $final[0]['cust_check'];
			}
		}
		
	public static function getResultFromURL($url)
	{
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, $url);  
		curl_setopt($ch, CURLOPT_HEADER, false);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);
		$result=curl_exec($ch);  
		
		$limit = 0;

		while($limit<5)
		{
			$limit++;
			if (curl_errno($ch)=="28")
			{
				sleep(1);
				//echo "$url again <br/>";
				$result=curl_exec($ch);  
			}
			else break;
		}

		curl_close($ch);  
		
		if($result)
		{
			$resultArray = json_decode($result, true);
			return $resultArray;
		}
		return false;
	}

	public static function getToken()
	{
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, self::$Source_API_URL."auth?userId=". self::$User_ID ."&pwd=". self::$User_Pass);  
		curl_setopt($ch, CURLOPT_HEADER, false);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);
		$result=curl_exec($ch);  
		 

		$limit = 0;

		while($limit<5)
		{
			$limit++;
			if (curl_errno($ch)=="28")
			{
				sleep(1);
				//echo 'getToken again <br/>';
				$result=curl_exec($ch);  
			}
			else break;
		}

		curl_close($ch); 
		
		$final = json_decode($result, true);

		if ($final && is_array($final) && array_key_exists('token', $final))
		{
			return $final['token'];
		}
	}
	
	public static function getOnlineTime($token, $number, $authID)
	{
		$url =  self::$Source_API_URL."data_pr/online_time?token=".$token."&appKey=".self::$API_KEY."&auth_code=". $authID."&bill_no=".$number;

		$final = self::getResultFromURL($url);

		if ($final && $final[0] && is_array($final[0]) && array_key_exists('online_time', $final[0]))
		{
			return $final[0]['online_time'];
		}
		else
		{
			throw new Exception("online_time error", 1);
		}
	}
	
	public static function getMethodResult($token, $method, $returnKey, $idCard, $number, $authID, $name)
	{
		$url = self::$Source_API_URL."data_pr/".$method."?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number."&card_code=".$idCard."&cust_name=" . $name;
		
		$final = self::getResultFromURL($url);

		if ($final && $final[0] && is_array($final[0]) && array_key_exists($returnKey, $final[0]))
		{
			return $final[0][$returnKey];
		}
	}

 	public static function getBeforeResultFromMultiURL( $token, $number, $authID )
	{
		$connomains = array(
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/busyloc?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/freeloc?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/n3m_call_fee?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/n3m_gprs_fee?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/sp_fee_3m?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/indus_type?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/casinoarea_cnt_3m?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/data_pr/stopcounts_stopdays?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number


		);

		$mh = curl_multi_init();

		foreach ( $connomains as $i => $url ) {
			$conn[$i] = curl_init( $url );
			curl_setopt( $conn[$i], CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $conn[$i], CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $conn[$i], CURLOPT_SSL_VERIFYHOST, false );
			curl_setopt( $conn[$i], CURLOPT_TIMEOUT, 1 );
			curl_multi_add_handle( $mh, $conn[$i] );
		}

		do {
		$mrc = curl_multi_exec( $mh, $active );
		} while ( $mrc == CURLM_CALL_MULTI_PERFORM );

		while ( $active and $mrc == CURLM_OK ) {
			if ( curl_multi_select( $mh ) != -1 ) {
				do {
				$mrc = curl_multi_exec( $mh, $active );
				} while ( $mrc == CURLM_CALL_MULTI_PERFORM );
			}
		}

		// $limit = 0;

		// while ( $limit < 5 )
		// {
		// 	$limit++;

		// 	if ( curl_errno( $conn[0] ) == "28" ) 
		// 	{
		// 		sleep(1);

		// 		do {
		// 		$mrc = curl_multi_exec( $mh, $active );
		// 		} while ( $mrc == CURLM_CALL_MULTI_PERFORM );

		// 		while ( $active and $mrc == CURLM_OK ) {
		// 			if ( curl_multi_select( $mh ) != -1 ) {
		// 				do {
		// 				$mrc = curl_multi_exec( $mh, $active );
		// 				} while ( $mrc == CURLM_CALL_MULTI_PERFORM );
		// 			}
		// 		}

		// 	}
		// 	else break;
		// }

		foreach ( $connomains as $i => $url ) {
			$res[$i] = json_decode( curl_multi_getcontent( $conn[$i] ), true );
			curl_close( $conn[$i] );
		}
		//return $res;
		$result = array();
		
		$result['busyLoc'] = $res[0][0]['busyloc'];
		$result['freeLoc'] = $res[1][0]['freeloc'];
		$result['voiceBillLevel'] = $res[2][0]['n3m_call_fee'];
		$result['dataBillLevel'] = $res[3][0]['n3m_gprs_fee'];
		$result['spBillLevel'] = $res[4][0]['sp_fee_3m'];
		//$result['industry'] = $res[5][0]['industry'];
		$result['casinoAreaLevel'] = $res[6][0]['ca_cnt_3m'];
		$result['billOverDueLevel'] = $res[7][0]['l3m_stopcounts'];
		//......
		
		
		return $result;

	}
	
	public static function getAfterResultFromMultiURL( $token, $number, $authID )
	{
		$connomains = array(
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/busyloc?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/freeloc?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/n3m_call_fee?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/n3m_gprs_fee?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/sp_fee_3m?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/indus_type?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/hangzhouyh/casinoarea_cnt_3m?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number,
			"https://218.205.68.67:8000/dataex/api/data_pr/stopcounts_stopdays?token=".$token."&appKey=".self::$API_KEY."&auth_code=".$authID."&bill_no=".$number


		);

		$mh = curl_multi_init();

		foreach ( $connomains as $i => $url ) {
			$conn[$i] = curl_init( $url );
			curl_setopt( $conn[$i], CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $conn[$i], CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $conn[$i], CURLOPT_SSL_VERIFYHOST, false );
			curl_setopt( $conn[$i], CURLOPT_TIMEOUT, 1 );
			curl_multi_add_handle( $mh, $conn[$i] );
		}

		do {
		$mrc = curl_multi_exec( $mh, $active );
		} while ( $mrc == CURLM_CALL_MULTI_PERFORM );

		while ( $active and $mrc == CURLM_OK ) {
			if ( curl_multi_select( $mh ) != -1 ) {
				do {
				$mrc = curl_multi_exec( $mh, $active );
				} while ( $mrc == CURLM_CALL_MULTI_PERFORM );
			}
		}

		// $limit = 0;

		// while ( $limit < 5 )
		// {
		// 	$limit++;

		// 	if ( curl_errno( $conn[0] ) == "28" ) 
		// 	{
		// 		sleep(1);

		// 		do {
		// 		$mrc = curl_multi_exec( $mh, $active );
		// 		} while ( $mrc == CURLM_CALL_MULTI_PERFORM );

		// 		while ( $active and $mrc == CURLM_OK ) {
		// 			if ( curl_multi_select( $mh ) != -1 ) {
		// 				do {
		// 				$mrc = curl_multi_exec( $mh, $active );
		// 				} while ( $mrc == CURLM_CALL_MULTI_PERFORM );
		// 			}
		// 		}

		// 	}
		// 	else break;
		// }

		foreach ( $connomains as $i => $url ) {
			$res[$i] = json_decode( curl_multi_getcontent( $conn[$i] ), true );
			curl_close( $conn[$i] );
		}
		//return $res;
		$result = array();
		
		$result['busyLoc'] = $res[0][0]['busyloc'];
		$result['freeLoc'] = $res[1][0]['freeloc'];
		$result['voiceBillLevel'] = $res[2][0]['n3m_call_fee'];
		$result['dataBillLevel'] = $res[3][0]['n3m_gprs_fee'];
		$result['spBillLevel'] = $res[4][0]['sp_fee_3m'];
		//$result['industry'] = $res[5][0]['industry'];
		$result['casinoAreaLevel'] = $res[6][0]['ca_cnt_3m'];
		$result['billOverDueLevel'] = $res[7][0]['l3m_stopcounts'];
		//......
		
		
		return $result;

	}

}