<?php
namespace app\index\controller;

use think\Controller;
class Add extends Controller
{
   public function a(){
     return $this->fetch();
  }
  public function add(){
  
  	$param = input('post.');
    	if(empty($param['classroomid'])){
    		
    		$this->error('用户名不能为空');
    	}
    else{
    	// 验证是否存在
    	$has = db('classroom')->where('id', $param['classroomid'])->find();
    	if(!empty($has)){
    		
    		$this->error('该教室ID已存在，请重新输入');
    	}
    	else{
        
         $state = "可借";
      		$borrower="无";
    		$data=['id'=>$param['classroomid'],'state'=>$state,'borrower'=>$borrower];
   			 db('classroom')->insert($data);
         $this->redirect(url('adminregulate/adminregulate'));
        }
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    
    
    }
      
      
      
      
   
  
  }

 
}
?>

 

