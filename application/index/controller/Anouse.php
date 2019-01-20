<?php
namespace app\index\controller;

use think\Controller;
class Anouse extends Controller
{
   public function a(){
     return $this->fetch();
  }
  public function anouse(){
  	$param = input('post.');
    	if(empty($param['classroomid'])){
    		
    		$this->error('请输入教室ID');
    	}
        if(empty($param['userid'])){
       		$this->error('请输入用户ID');
        }
    else{
    	// 验证是否存在
    	$has = db('classroom')->where('id', $param['classroomid'])->find();
    	if(empty($has)){
    		
    		$this->error('该教室ID不存在，请重新操作');
    	}
    	else{
         
           if($has['state'] =="可借"){
           		$this->error('教室ID输入错误，请重新输入');
           }
          else{
            if($has['state'] =="禁用"){
            	$this->error('教室ID输入错误，请重新输入');
            }
            else{
              if($has['borrower'] !=$param['userid']){
              	$this->error('无归还权限，请确认教室ID和用户ID匹配');
              }
              else{
           db('classroom')->delete($param['classroomid']);
            $state = "可借";
      		$borrower="无";
    		$data=['id'=>$param['classroomid'],'state'=>$state,'borrower'=>$borrower];
   			 db('classroom')->insert($data);
              echo "归还成功";
         	echo '<a href="' . url('auser/auser') . '">返回</a>';
              }
            }
          }
         
        }
  
    }
  } 
}
?>

 

