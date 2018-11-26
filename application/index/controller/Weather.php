<?php
namespace app\index\controller;

use think\Controller;
class Weather extends Controller
{
    public function index()
    {
      echo '<span style=\"color:blake;font-size:48px;\">';
  
       echo '北京天气！';
       echo "<br />";
       echo '温度：5℃~15℃';
      echo "<br />";
      echo '晴';
      
      echo "<br />";
      echo 'PM2.5：爆表';
      echo "<br />";
      echo'湿度：10';
       echo '</span>';
      echo "<br />";

    
       
    }
}