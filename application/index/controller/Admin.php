<?php
namespace app\index\controller;

use think\Controller;
class Admin extends Controller
{
   public function admin()
    {
       return $this->fetch();
       
    }
  public function adminsearch()
    {
       return $this->fetch();
       
    }
  
  public function admin1()
    {
    	$param = input('post.');
    	if(empty($param['user_name'])){
    		
    		$this->error('用户名不能为空');
    	}
    	
    	if(empty($param['user_pwd'])){
    		
    		$this->error('密码不能为空');
    	}
    	
       if($param['user_name']!='admin123' && $param['user_pwd']!='admin123'){
       $this->error('用户名和密码错误，请重新输入');
         	
         
    
       }
       else{
       	
         	$this->redirect(url('adminregulate/adminregulate'));
       }
    
    }
}

 

