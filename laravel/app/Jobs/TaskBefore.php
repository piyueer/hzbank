<?php

namespace App\Jobs;

use DB,Excel;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Libs\Myclass\GetSingleResultBefore;

class TaskBefore extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

	protected $excelName;
	protected $taskId;
	
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($excelName,$taskId)
    {
        $this->excelName = $excelName;
		$this->taskId = $taskId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
		$results = Excel::selectSheetsByIndex(0)->load(app_path().'/storage/uploads/'.$this->excelName)->toArray();
		
		
		foreach($results[0] as $insertResult){
			if(!empty($insertResult['customername']) && !empty($insertResult['cardid']) && !empty($insertResult['phonenumber']) && !empty($insertResult['authcode'])){
				GetSingleResultBefore::getSingleResult($insertResult['customername'],$insertResult['cardid'],$insertResult['phonenumber'],$insertResult['authcode'],false,$this->taskId);
			}
			else
			{
				continue;
			}	
		}
		
		
		/*
		Excel::load(app_path().'/storage/uploads/'.$this->excelName, function($reader) {
		
		//获取excel的第几张表
		$results = $reader->getSheet(0);
		//$results = $reader->get();
		//获取表中的数据
		$results = $reader->toArray();
		//$results = $reader->all();
		
		
		foreach($results[0] as $insertResult){

		//DB::table('user')->insert($insertResult);
			GetSingleResult::getSingleResult($insertResult['customername'],$insertResult['cardid'],$insertResult['phonenumber'],$insertResult['authcode']);		
		}
		
		
		
		});*/
		
		DB::table('task_list_before')
					->where('id','=',$this->taskId)
					->update(array('taskStatus'=>'已完成'));
		
		
    }
	
	 public function failed()
    {
        DB::table('task_list_before')
					->where('id','=',$this->taskId)
					->update(array('taskStatus'=>'失败'));
    }
	
}
