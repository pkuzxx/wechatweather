<?php
namespace app\index\controller;

use think\Controller;
class Asetuse extends Controller
{
   public function a(){
     
     return $this->fetch();
  }
  public function asetuse(){
  
  	$param = input('post.');
    	if(empty($param['classroomid'])){
    		
    		$this->error('请输入教室ID');
    	}
    else{
    	// 验证是否存在
    	$has = db('classroom')->where('id', $param['classroomid'])->find();
    	if(empty($has)){
    		
    		$this->error('该教室ID不存在，无法恢复');
    	}
    	else{
         
           if($has['state'] =="可借"){
           		$this->error('当前教室可借，无需恢复');
           }
          else{
            if($has['borrower'] !="无"){
            	$this->error('当前教室正在被使用，无需恢复');
            }
            else{
           db('classroom')->delete($param['classroomid']);
            $state = "可借";
      		$borrower="无";
    		$data=['id'=>$param['classroomid'],'state'=>$state,'borrower'=>$borrower];
   			 db('classroom')->insert($data);
         $this->redirect(url('adminregulate/adminregulate'));
            }
          }
         
        }
  
    }
  } 
}
?>

 

