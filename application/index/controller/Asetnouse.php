<?php
namespace app\index\controller;

use think\Controller;
class Asetnouse extends Controller
{
   public function a(){
     
     return $this->fetch();
  }
  public function asenotuse(){
  
  	$param = input('post.');
    	if(empty($param['classroomid'])){
    		
    		$this->error('请输入教室ID');
    	}
    else{
    	// 验证是否存在
    	$has = db('classroom')->where('id', $param['classroomid'])->find();
    	if(empty($has)){
    		
    		$this->error('该教室ID不存在，无法禁用');
    	}
    	else{
         
           if($has['state'] =="不可借"){
           		$this->error('当前教室不需禁用');
           }
          else{
           db('classroom')->delete($param['classroomid']);
            $state = "禁用";
      		$borrower="无";
    		$data=['id'=>$param['classroomid'],'state'=>$state,'borrower'=>$borrower];
   			 db('classroom')->insert($data);
         $this->redirect(url('adminregulate/adminregulate'));
            }
          }
         
        }
  
    }
  } 

?>

 

