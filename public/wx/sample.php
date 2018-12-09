<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxffe6b161dd9723e6", "1e747a94fd5291dbcefb16b805572984");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="http://res.wx.qq.com/open/libs/weui/0.4.3/weui.min.css"/>
    <title></title>
  
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=RIlrqYA5VzGyyOTGYCoOR8tK5Ia8Hpib"></script>
  
 </head>
<body ontouchstart>
<div id="1_map"></div>
</body>
  
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
     'getLocation',
    ]
  });
   var latitude = 0.0;
    var longitude = 0.0;
  
 
    wx.ready(function () {
        // 在这里调用 API
        wx.getLocation({
            type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
            success: function (res) {
                latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                alert("latitude:" + latitude + "longitude:" + longitude);
               
             /*  var map = new BMap.Map("1_map");          // 创建地图实例           
               var myGeo = new BMap.Geocoder();      
             // 根据坐标得到地址描述    
             myGeo.getLocation(new BMap.Point( longitude,latitude), function(result){      
                if (result){      
                 alert(result.address);      
                  }      
           });*/
              
              
              var map = new BMap.Map("1_map");
              var point = new BMap.Point( longitude,latitude);
               map.centerAndZoom(point,12);

               function myFun(result){
	                  var cityName = result.name;
	                  map.setCenter(cityName);
	                  alert("当前定位城市:"+cityName);
                 
                  }
               var myCity = new BMap.LocalCity();
                  myCity.get(myFun);      
              
              
              
            }
        });
    });
  

   
  
  
  
</script>
</html>
