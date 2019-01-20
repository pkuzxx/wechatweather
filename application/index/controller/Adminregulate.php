<?php
namespace app\index\controller;

use think\Controller;
class Adminregulate extends Controller
{
  public function asetuse(){
  	$this->redirect(url('asetuse/a'));
  }
  
  public function asetnouse(){
  
  	$this->redirect(url('asetnouse/a'));
  }
  public function add(){
  	$this->redirect(url('add/a'));
  }
  public function delete (){
  
  $this->redirect(url('delete/d'));
  }
    public function adminregulate()
    {
      ?>


<!DOCTYPE html>
      <html>
	<head>
<meta http-equiv="content-type" content="text/html;charset = utf-8" />
</head>
<body>
        <table border=1>
    <p sytle="text-align:center">教室占用情况</p>
 
    <a href="add">增添教室</a>|<a href="delete">删除教室</a>
    <tr>
      <th>序号</th>
        <th>教室ID</th>
        <th>教室状态</th>
        <th>借用者</th>
        <th>操作</th>
    </tr>
    <?php
      
      $con = mysql_connect("localhost","sql188_131_154_","3HxWEt33Es");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
      $db_selected=mysql_select_db("sql188_131_154_",$con);
      if (!$db_selected)
  {
  die ("Can\'t use test_db : " . mysql_error());
  }

      $result = mysql_query("SELECT * FROM classroom");
      $i=0;
      while($row = mysql_fetch_array($result))
  {
      $i+=1;
    echo "<tr>";
        echo "<td>"."$i"."</td>";
 		echo "<td>" . $row['id'] . "</td>";
  		echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['borrower'] . "</td>";
        echo '<td><a href="asetuse">恢复可用</a>|<a href="asetnouse">设置禁用</a></td>';
  		echo "</tr>";
  		
  }

      
      
?>
     
   
    
</table>
        </body>
</html>

<?php
    }
}
?>