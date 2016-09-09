<?php
namespace App\Libs\Myclass\Tools;

/*
����÷ִ���ģ��
*/

class DataProcessAfter{

	//ͨ�ż�¼�÷�,oldNumberUsed��Ȩֵ0.25,badWordsSearchLevel��Ȩֵ0.25,powerOffTime��Ȩֵ0.25,frequentNumberChanged��Ȩֵ0.25;
	public static function communicationRecordScore($oldNumberUsed,$badWordsSearchLevel,$powerOffTime,$frequentNumberChanged){
		$score = $oldNumberUsed * 0.25 + $badWordsSearchLevel * 0.25 + $powerOffTime * 0.25 + $frequentNumberChanged * 0.25;
		return $score;
	}

	//�û��˵��÷�,voiceBillLevel��Ȩֵ0.2,dataBillLevel��Ȩֵ0.2,spBillLevel��Ȩֵ0.2,billOverDueLevel��Ȩֵ0.4;
	public static function billScore($voiceBillLevel,$dataBillLevel,$spBillLevel,$billOverDueLevel){
		$score = $voiceBillLevel * 0.2 + $dataBillLevel * 0.2 + $spBillLevel * 0.2 + $billOverDueLevel * 0.4;
		return $score;
	}

	//����״̬�÷�,busyLoc��Ȩֵ0.2,freeLoc��Ȩֵ0.2,casinoAreaLevel��Ȩֵ0.6;
	public static function roamingStatusScore($busyLoc,$freeLoc,$casinoAreaLevel){
		$score = $busyLoc * 0.2 + $freeLoc * 0.2 + $casinoAreaLevel * 0.6;
		return $score;
	}

	//�ۺϵ÷�,communicationRecord��Ȩֵ0.3,bill��Ȩֵ0.4,roamingStatus��Ȩֵ0.3;
	public static function compositeScore($communicationRecord,$bill,$roamingStatus){
		$score = $communicationRecord * 0.3 + $bill * 0.4 + $roamingStatus * 0.3;
		return $score;
	}

}	