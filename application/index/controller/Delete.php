<?php
namespace app\index\controller;

use think\Controller;
class Delete extends Controller
{
   public function d(){
     return $this->fetch();
  }
  public function delete(){
  
  	$param = input('post.');
    	if(empty($param['classroomid'])){
    		
    		$this->error('教室ID不能为空');
    	}
    else{
    	// 验证是否存在
    	$has = db('classroom')->where('id', $param['classroomid'])->find();
    	if(empty($has)){
    		
    		$this->error('该教室ID不存在，无法删除');
    	}
    	else{  
       
   			 db('classroom')->delete($param['classroomid']);
           $this->redirect(url('adminregulate/adminregulate'));
        }
    }
  }
}