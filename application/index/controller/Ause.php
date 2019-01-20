<?php
namespace app\index\controller;

use think\Controller;
class Ause extends Controller
{
   public function a(){
     return $this->fetch();
  }
  public function ause(){
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
    		
    		$this->error('该教室ID不存在，无法借用');
    	}
    	else{
         
           if($has['state'] =="不可借"){
           		$this->error('当前教室处于借用状态，无法再次借用');
           }
          else{
            if($has['state'] =="禁用"){
            	$this->error('当前教室禁止借用');
            }
            else{
           db('classroom')->delete($param['classroomid']);
            $state = "不可借";
      		$borrower=$param['userid'];
    		$data=['id'=>$param['classroomid'],'state'=>$state,'borrower'=>$borrower];
   			 db('classroom')->insert($data);
              echo "借用成功";
         echo '<a href="' . url('auser/auser') . '">返回</a>';
            }
          }
         
        }
  
    }
  } 
}
?>

 

