<?php
namespace app\index\controller;

use think\Controller;
class Test extends Controller
{
    public function index()
    {
      $has = db('ins_county')->where('county_name', '北京')->find();
    	if(empty($has)){
    		
    		$this->error('无');
    	}
      else{
           echo $has['weather_code'];
      }
    	
       
    }
}
