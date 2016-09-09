<?php 
namespace App\Libs\Myclass;

use DB;
use App\Libs\Myclass\Tools\DataConversionBefore;
use App\Libs\Myclass\Tools\DataProcessBefore;
use App\Libs\Myclass\Tools\DataToScoreBefore;
use App\Libs\Myclass\Tools\CurlFunctions;
use App\Libs\Myclass\Tools\ObjectToArray;

class GetSingleResultBefore {
public static function getSingleResult($customerName,$cardID,$phoneNumber,$authcode,$switch=false,$taskId=false)
{
	
	$timeNow=time();
	$timeLastmouth=strtotime("-1 month");//��ǰʱ���ȥһ����
	
	//DB::setFetchMode(PDO::FETCH_ASSOC);
	$queryResult = DB::select('select * from user_before u, query_history_before q where u.id = q.uid and u.customerName = ? and u.phoneNumber = ? and u.cardID = ? and u.authcode = ?', array($customerName,$phoneNumber,$cardID,$authcode));

	$result = array();

	if( $queryResult ){ 
	
		$queryResult = ObjectToArray::objectToArray($queryResult[0]);
		
			if( $queryResult['queryTime'] > $timeLastmouth ) {
				if($queryResult['idMatched'] == "1") {
					$dataConversion = DataConversionBefore::dataConversion($queryResult);
					$dataToScore = DataToScoreBefore::dataToScore($queryResult);
					
					$communicationRecordScore = DataProcessBefore::communicationRecordScore($dataToScore['badWordsSearchLevel'],$dataToScore['powerOffTime'],$dataToScore['mostFrequentNumber']);
					$basicInfoScore = DataProcessBefore::basicInfoScore($dataToScore['onlineTime'],$dataToScore['industry']);
					$billScore = DataProcessBefore::billScore($dataToScore['voiceBillLevel'],$dataToScore['dataBillLevel'],$dataToScore['spBillLevel'],$dataToScore['billOverDueLevel']);
					$roamingStatusScore = DataProcessBefore::roamingStatusScore($dataToScore['busyLoc'],$dataToScore['freeLoc'],$dataToScore['casinoAreaLevel']);
					$compositeScore = DataProcessBefore::compositeScore($communicationRecordScore,$basicInfoScore,$billScore,$roamingStatusScore);
					
					$result = $dataConversion;
					$result['communicationRecordScore'] = $communicationRecordScore;
					$result['basicInfoScore'] = $basicInfoScore;
					$result['billScore'] = $billScore;
					$result['roamingStatusScore'] = $roamingStatusScore;
					$result['compositeScore'] = $compositeScore;
					
					$result['customerName'] = $customerName;
					$result['cardID'] = $cardID;
					$result['authcode'] = $authcode;
					
					$result['idMatchedValue'] = $queryResult['idMatched'];//��ͼ���������
					
					/*������������ǰ������ѯ���ļ�¼Ϊ�ü�¼׷��taskId,ʹ����������Datatables��������ʾ */
					if($taskId){
						DB::table('query_history_before as q')
						->where('q.id','=',$queryResult['id'])
						->update(array('taskId'=>$taskId));
					}
					
					if($switch){
					return $result; 
					}
				} else { 
					$dataConversion = DataConversionBefore::dataConversion($queryResult);
					
					$result = $dataConversion;
					$result['customerName'] = $customerName;
					$result['cardID'] = $cardID;
					$result['authcode'] = $authcode;
					$result['idMatchedValue'] = $queryResult['idMatched'];//��ͼ���������
					
					/*������������ǰ������ѯ���ļ�¼Ϊ�ü�¼׷��taskId,ʹ����������Datatables��������ʾ */
					if($taskId){
						DB::table('query_history_before as q')
						->where('q.id','=',$queryResult['id'])
						->update(array('taskId'=>$taskId));
					}
					
					if($switch){
					return $result; 
					}
				}
				
							
			} else { 
			
			$result['customerName'] = $customerName;
			$result['cardID'] = $cardID;
			$result['phoneNumber'] = $phoneNumber;
			$result['authcode'] = $authcode;

			$token = CurlFunctions::getToken();
			
			$idMatched = CurlFunctions::getIDMatched($token, $cardID, $phoneNumber, $authcode, $customerName);
			
				if($idMatched == "1") {
					//����MultiCurl()��ȡ�����ֶη��ص�������$curlResult['idMatched']ƴ��
					$curlResult = array();
					$curlResult = CurlFunctions::getBeforeResultFromMultiURL($token, $phoneNumber, $authcode);
					$curlResult['onlineTime'] = CurlFunctions::getOnlineTime($token, $phoneNumber, $authcode);
					$curlResult['idMatched'] = $idMatched;
					
					$dataConversion = DataConversionBefore::dataConversion($curlResult);
					$dataToScore = DataToScoreBefore::dataToScore($curlResult);
					
					$communicationRecordScore = DataProcessBefore::communicationRecordScore($dataToScore['badWordsSearchLevel'],$dataToScore['powerOffTime'],$dataToScore['mostFrequentNumber']);
					$basicInfoScore = DataProcessBefore::basicInfoScore($dataToScore['onlineTime'],$dataToScore['industry']);
					$billScore = DataProcessBefore::billScore($dataToScore['voiceBillLevel'],$dataToScore['dataBillLevel'],$dataToScore['spBillLevel'],$dataToScore['billOverDueLevel']);
					$roamingStatusScore = DataProcessBefore::roamingStatusScore($dataToScore['busyLoc'],$dataToScore['freeLoc'],$dataToScore['casinoAreaLevel']);
					$compositeScore = DataProcessBefore::compositeScore($communicationRecordScore,$basicInfoScore,$billScore,$roamingStatusScore);
					
					$result = $dataConversion;
					$result['communicationRecordScore'] = $communicationRecordScore;
					$result['basicInfoScore'] = $basicInfoScore;
					$result['billScore'] = $billScore;
					$result['roamingStatusScore'] = $roamingStatusScore;
					$result['compositeScore'] = $compositeScore;
					
					$result['customerName'] = $customerName;
					$result['cardID'] = $cardID;
					$result['authcode'] = $authcode;
					
					$result['idMatchedValue'] = $curlResult['idMatched'];//��ͼ���������
					
					//������������update
					$updateResult = $curlResult;
					$updateResult['communicationRecordScore'] = $communicationRecordScore;
					$updateResult['basicInfoScore'] = $basicInfoScore;
					$updateResult['billScore'] = $billScore;
					$updateResult['roamingStatusScore'] = $roamingStatusScore;
					$updateResult['compositeScore'] = $compositeScore;
					$updateResult['queryTime'] = $timeNow;
					if($taskId){
					$updateResult['taskId'] = $taskId;
					}

					
					//�ѿͻ����ݺ͵�ǰʱ����µ�query_history_before��
					//UPDATE
					DB::table('query_history_before as q')
						->where('q.uid','=',$queryResult['uid'])
						->update($updateResult);
					
					if($switch){
					return $result; 
					}
					
				} else { 
					$dataConversion = DataConversionBefore::dataConversion($curlResult);
					
					$result = $dataConversion;
					$result['customerName'] = $customerName;
					$result['cardID'] = $cardID;
					$result['authcode'] = $authcode;
					$result['idMatchedValue'] = $idMatched;//��ͼ���������
					
					//������������update
					$updateResult = $idMatched;
					
					if(!isset($updateResult['idMatched'])){
						$updateResult['idMatched'] = -6;
					}
					
					$updateResult['queryTime'] = $timeNow;
					
					if($taskId){
					$updateResult['taskId'] = $taskId;
					}
					
					//�ѿͻ����ݺ͵�ǰʱ����µ�query_history_before��
					//UPDATE
					DB::table('query_history_before as q')
						->where('q.uid','=',$queryResult['uid'])
						->update($updateResult);
					
					if($switch){
					return $result; 
					}
				}		
			
			}

	} else { 

			$result['customerName'] = $customerName;
			$result['cardID'] = $cardID;
			$result['phoneNumber'] = $phoneNumber;
			$result['authcode'] = $authcode;

			$token = CurlFunctions::getToken();
			
			$idMatched = CurlFunctions::getIDMatched($token, $cardID, $phoneNumber, $authcode, $customerName);

				if($idMatched == "1") {
					//����MultiCurl()��ȡ�����ֶη��ص�������$curlResult['idMatched']ƴ��
					$curlResult = array();
					$curlResult = CurlFunctions::getBeforeResultFromMultiURL($token, $phoneNumber, $authcode);
					//print_r($curlResult);die();
					$curlResult['onlineTime'] = CurlFunctions::getOnlineTime($token, $phoneNumber, $authcode);
					$curlResult['idMatched'] = $idMatched;
					
					$dataConversion = DataConversionBefore::dataConversion($curlResult);
					$dataToScore = DataToScoreBefore::dataToScore($curlResult);
					
					$communicationRecordScore = DataProcessBefore::communicationRecordScore($dataToScore['badWordsSearchLevel'],$dataToScore['powerOffTime'],$dataToScore['mostFrequentNumber']);
					$basicInfoScore = DataProcessBefore::basicInfoScore($dataToScore['onlineTime'],$dataToScore['industry']);
					$billScore = DataProcessBefore::billScore($dataToScore['voiceBillLevel'],$dataToScore['dataBillLevel'],$dataToScore['spBillLevel'],$dataToScore['billOverDueLevel']);
					$roamingStatusScore = DataProcessBefore::roamingStatusScore($dataToScore['busyLoc'],$dataToScore['freeLoc'],$dataToScore['casinoAreaLevel']);
					$compositeScore = DataProcessBefore::compositeScore($communicationRecordScore,$basicInfoScore,$billScore,$roamingStatusScore);
					
					$result = $dataConversion;
					$result['communicationRecordScore'] = $communicationRecordScore;
					$result['basicInfoScore'] = $basicInfoScore;
					$result['billScore'] = $billScore;
					$result['roamingStatusScore'] = $roamingStatusScore;
					$result['compositeScore'] = $compositeScore;
					
					$result['customerName'] = $customerName;
					$result['cardID'] = $cardID;
					$result['authcode'] = $authcode;
					
					$result['idMatchedValue'] = $curlResult['idMatched'];//��ͼ���������
					
					//������������insert
					$insertResult = $curlResult;
					$insertResult['communicationRecordScore'] = $communicationRecordScore;
					$insertResult['basicInfoScore'] = $basicInfoScore;
					$insertResult['billScore'] = $billScore;
					$insertResult['roamingStatusScore'] = $roamingStatusScore;
					$insertResult['compositeScore'] = $compositeScore;
					$insertResult['queryTime'] = $timeNow;
					if($taskId){
					$insertResult['taskId'] = $taskId;
					}
					
					//�ѿͻ����ݺ͵�ǰʱ�����user_before��query_history_before��
					//INSERT
					$id = DB::table('user_before')
						->insertGetId( 
							array('cardID' => $cardID, 'phoneNumber' => $phoneNumber, 'authcode' => $authcode, 'customerName' => $customerName )
							);
							
					$insertResult['uid'] = $id;	
					
					DB::table('query_history_before')
						->insert($insertResult);
					
					if($switch){
					return $result; 
					}
					
				} else { 
				
					
					$dataConversion = DataConversionBefore::dataConversion($idMatched);
					
					$result = $dataConversion;
					$result['customerName'] = $customerName;
					$result['cardID'] = $cardID;
					$result['authcode'] = $authcode;
					$result['idMatchedValue'] = $idMatched;//��ͼ���������
					
					//������������insert
					$insertResult = $idMatched;
					
					if(!isset($insertResult['idMatched'])){
						$insertResult['idMatched'] = -6;
					}
					
					$insertResult['queryTime'] = $timeNow;
					
					if($taskId){
					$insertResult['taskId'] = $taskId;
					}
					
					//�ѿͻ����ݺ͵�ǰʱ�����user_before��query_history_before��
					//INSERT
					$id = DB::table('user_before')
						->insertGetId( 
							array('cardID' => $cardID, 'phoneNumber' => $phoneNumber, 'authcode' => $authcode, 'customerName' => $customerName )
							);
							
					$insertResult['uid'] = $id;	
					
					DB::table('query_history_before')
						->insert($insertResult);
					
					if($switch){
					return $result; 
					}
				}	
	}

}

}