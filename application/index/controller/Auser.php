<?php
namespace app\index\controller;

use think\Controller;
class Auser extends Controller
{
  
  public function ause(){
  	$this->redirect(url('ause/a'));
  }
  
  public function anouse(){
  
  	$this->redirect(url('anouse/a'));
  }
    public function auser()
    {
      ?>


<!DOCTYPE html>
      <html>
	<head>
<meta http-equiv="content-type" content="text/html;charset = utf-8" />
</head>
<body>
        <table border=1>
    <p sytle="text-align:center">教室借用与归还</p>
 
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
        echo '<td><a href="ause/a">借用</a>|<a href="anouse">归还</a></td>';
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