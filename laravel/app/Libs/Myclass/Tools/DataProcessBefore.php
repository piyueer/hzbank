<?php
namespace App\Libs\Myclass\Tools;

/*
贷前得分处理模型
*/
	
class DataProcessBefore{

	//通信记录得分,badWordsSearchLevel加权值0.6,powerOffTime加权值0.2,mostFrequentNumber加权值0.2;
	public static function communicationRecordScore($badWordsSearchLevel,$powerOffTime,$mostFrequentNumber){		
		$score = $badWordsSearchLevel * 0.6 + $powerOffTime * 0.2 + $mostFrequentNumber * 0.2;
		return $score;
	}

	//用户基本信息得分,online加权值0.6,industry加权值0.4;
	public static function basicInfoScore($online,$industry){		
		$score = $online * 0.6 + $industry * 0.4;
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

	//综合得分,communicationRecord加权值0.15,basicInfo加权值0.3,bill加权值0.4,roamingStatus加权值0.15;
	public static function compositeScore($communicationRecord,$basicInfo,$bill,$roamingStatus){
		$score = $communicationRecord * 0.15 + $basicInfo * 0.3 + $bill * 0.4 + $roamingStatus * 0.15;
		return $score;
	}

}	