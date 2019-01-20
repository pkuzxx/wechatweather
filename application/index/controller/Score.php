<?php
namespace app\index\controller;

use think\Controller;
class Score extends Controller
{
   public function s()
    {
       return $this->fetch();
       
    }
    public function score()
    {
    	$param = input('post.');
    	if(empty($param['studentID'])){
    		
    		$this->error('用户名不能为空');
    	}
    	// 验证用户名
    	$has = db('users')->where('studentID', $param['studentID'])->find();
    	if(empty($has)){
    		$this->error('无法查询，请确保您的学号输入正确');
    	}else{
          
  ?>        
          <!DOCTYPE html>
        <html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成绩查询</title> 
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
 
<body class="gray-bg" style="text-align: center">
 
  <h class="m-t-none m-b" style="font-family:arial;color:orange;font-size:50px;"> 您的成绩(⊙o⊙)  </h>
   <p style="font-family:arial;color:red;font-size:70px;"><?php echo $has['scores'] ?> </p>
</body>
</html>
<?php
        }	
    }
}
?>

