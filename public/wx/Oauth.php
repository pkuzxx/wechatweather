<?php
  if (isset($_GET['code'])){
    echo $_GET['code'];
    $s = $_GET['code'];
   //echo "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxffe6b161dd9723e6&secret=1e747a94fd5291dbcefb16b805572984&code=$s&grant_type=authorization_code";
    
}else{
    echo "NO CODE";
}