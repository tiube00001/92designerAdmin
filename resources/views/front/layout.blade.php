<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>92设计monkey，一只爱设计的猴子</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<!--导航栏开始-->
<div class="nav">
    <div class="container clearfix">
        <img src="../image/logo.png" alt="" class="logo-fl">
       <div class="list-fl">

           <ul>
               <li class="nav-fl"><a href="index.html">首页</a></li>
               <li class="nav-fl nav-fl2">
                   <a href="designer.html">
                       设计规范
                       <span class="icon-more">&#xe6bd;</span>
                   </a>
               </li>
               <li class="nav-fl"><a href="dry-goods.html">干货速递</a></li>
               <li class="nav-fl"><a href="material.html">素材库</a></li>
               <li class="nav-fl"><a href="video.html">视频库</a></li>
               <li class="nav-fl"><a href="designer.html">每日推荐</a></li>

           </ul>
       </div>
    </div>
</div>
<!--子导航栏开始-->
<div class="sub-nav">
    <div class="container">
        <ul>
            <li class="sub-fl">
                <a href="#">IOS规范</a>
            </li>
            <li class="sub-fl"><a href="#">Android规范</a></li>
            <li class="sub-fl"><a href="#">Web标准</a></li>
            <li class="sub-fl"><a href="#">切图规则</a></li>
            <li class="sub-fl"><a href="#">IOS与Android互转</a></li>
        </ul>
    </div>
</div>
<!--子导航栏结束-->
<!--导航栏结束-->


<div>
    @yield('content')
<!--footer区域开始-->
<div class="footer">
    <ul>
        <li class="footer-mess">
            免责声明：本站提供的素材仅做为学习与交流，请勿用于商业活动。本站素材均来自互联网，如无意中侵犯到您的权益，请与我们联系，
            我们会尽快清除相关内容。
        </li>
        <li class="footer-mess">联系QQ：873188606(合作/广告/交流)  @爱设计网址</li>
        <li class="footer-mess">Copyright © 2018  网址</li>
    </ul>
</div>
<!--footer区域结束-->






</body>
</html>
