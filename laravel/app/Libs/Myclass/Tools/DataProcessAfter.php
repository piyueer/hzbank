<?php
namespace App\Libs\Myclass\Tools;

/*
贷后得分处理模型
*/

class DataProcessAfter{

	//通信记录得分,oldNumberUsed加权值0.25,badWordsSearchLevel加权值0.25,powerOffTime加权值0.25,frequentNumberChanged加权值0.25;
	public static function communicationRecordScore($oldNumberUsed,$badWordsSearchLevel,$powerOffTime,$frequentNumberChanged){
		$score = $oldNumberUsed * 0.25 + $badWordsSearchLevel * 0.25 + $powerOffTime * 0.25 + $frequentNumberChanged * 0.25;
		return $score;
	}

	//用户账单得分,voiceBillLevel加权值0.2,dataBillLevel加权值0.2,spBillLevel加权值0.2,billOverDueLevel加权值0.4;
	public static function billScore($voiceBillLevel,$dataBillLevel,$spBillLevel,$billOverDueLevel){
		$score = $voiceBillLevel * 0.2 + $dataBillLevel * 0.2 + $spBillLevel * 0.2 + $billOverDueLevel * 0.4;
		return $score;
	}

	//漫游状态得分,busyLoc加权值0.2,freeLoc加权值0.2,casinoAreaLevel加权值0.6;
	public static function roamingStatusScore($busyLoc,$freeLoc,$casinoAreaLevel){
		$score = $busyLoc * 0.2 + $freeLoc * 0.2 + $casinoAreaLevel * 0.6;
		return $score;
	}

	//综合得分,communicationRecord加权值0.3,bill加权值0.4,roamingStatus加权值0.3;
	public static function compositeScore($communicationRecord,$bill,$roamingStatus){
		$score = $communicationRecord * 0.3 + $bill * 0.4 + $roamingStatus * 0.3;
		return $score;
	}

}	