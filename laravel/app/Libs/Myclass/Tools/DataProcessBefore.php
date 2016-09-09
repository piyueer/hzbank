<?php
namespace App\Libs\Myclass\Tools;

/*
��ǰ�÷ִ���ģ��
*/
	
class DataProcessBefore{

	//ͨ�ż�¼�÷�,badWordsSearchLevel��Ȩֵ0.6,powerOffTime��Ȩֵ0.2,mostFrequentNumber��Ȩֵ0.2;
	public static function communicationRecordScore($badWordsSearchLevel,$powerOffTime,$mostFrequentNumber){		
		$score = $badWordsSearchLevel * 0.6 + $powerOffTime * 0.2 + $mostFrequentNumber * 0.2;
		return $score;
	}

	//�û�������Ϣ�÷�,online��Ȩֵ0.6,industry��Ȩֵ0.4;
	public static function basicInfoScore($online,$industry){		
		$score = $online * 0.6 + $industry * 0.4;
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

	//�ۺϵ÷�,communicationRecord��Ȩֵ0.15,basicInfo��Ȩֵ0.3,bill��Ȩֵ0.4,roamingStatus��Ȩֵ0.15;
	public static function compositeScore($communicationRecord,$basicInfo,$bill,$roamingStatus){
		$score = $communicationRecord * 0.15 + $basicInfo * 0.3 + $bill * 0.4 + $roamingStatus * 0.15;
		return $score;
	}

}	