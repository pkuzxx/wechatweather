<?php
namespace app\index\controller;

use think\Controller;
class Index extends Controller
{
    public function index()
    {
       echo "您： " . cookie('user_name') . ', <a href="' . url('login/loginout') . '">退出</a>';
       
    }
}
