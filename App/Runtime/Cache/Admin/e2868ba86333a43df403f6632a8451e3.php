<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>管理后台</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/theme.css" /> 
  <link rel="stylesheet" type="text/css" href="/manage/Public/css/font-awesome.css" />
    <script type="text/javascript" src="/manage/Public/js/jquery.min.js"></script>
  <!-- Demo page code -->    
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="javascripts/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/manage/imgs/favicon.ico">

  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7"> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8"> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9"> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
<body> 
  <!--<![endif]-->
    <!--menu-->
	    <div class="navbar">
	        <div class="navbar-inner">
	            <div class="container-fluid">
	                <ul class="nav pull-right">
	                    
	                    <li id="fat-menu" class="dropdown">
	                        <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
	                            <i class="icon-user"></i> Jack Smith
	                            <i class="icon-caret-down"></i>
	                        </a>

	                        <ul class="dropdown-menu">
	                            <li><a tabindex="-1" href="#">Settings</a></li>
	                            <li class="divider"></li>
	                            <li><a tabindex="-1" href="sign-in.html">Logout</a></li>
	                        </ul>
	                    </li>
	                    
	                </ul>
	                <a class="brand" href="index.html"><span class="first">Your</span> <span class="second">Company</span></a>
	            </div>
	        </div>
	    </div>
    
      <!--content-->
	<div class="container-fluid">     
	    <div class="row-fluid">
		            <div class="span3">
		                <div class="sidebar-nav">
                                    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>课程&学科</div>
                                  <ul id="dashboard-menu" class="nav nav-list collapse in">
                                      <li ><a href="/manage/index.php/Admin/Course/add">添加课程</a></li>
                                      <li><a href="/manage/index.php/Admin/Course/index">课程管理</a></li>
                                      <li><a href="/manage/index.php/Admin/Cat/add">添加学科</a></li>
                                      <li ><a href="/manage/index.php/Admin/Cat/index">学科分类</a></li>
                                      
                                  </ul>
                                    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>工作</div>
                                <ul id="dashboard-menu" class="nav nav-list collapse in">
                                <li><a href="index.html">周统计</a></li>
                                <li ><a href="users.html">月统计</a></li>
                               
                                </ul>
                                    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>&nbsp;人事</div>
                                  <ul id="dashboard-menu" class="nav nav-list collapse in">
                                      <li><a href="/manage/index.php/Admin/User/index">人员管理</a></li>
                                      <li ><a href="/manage/index.php/Admin/User/cat">设置分组</a></li>
                                      
                                  </ul>
                                  
		                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>账户<span class="label label-info">+10</span></div>
		                <ul id="accounts-menu" class="nav nav-list collapse in">
                                    <li ><a href="sign-in.html">登录</a></li>
		                  <li ><a href="sign-up.html">退出</a></li>
		                  <li ><a href="reset-password.html">密码重置</a></li>
		                </ul>

		                <div class="nav-header" data-toggle="collapse" data-target="#legal-menu"><i class="icon-legal"></i>权限</div>
		                <ul id="legal-menu" class="nav nav-list collapse in">
		                  <li ><a href="privacy-policy.html">私有属性</a></li>
		                  <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
		                </ul>
                                
                                 <div class="nav-header" data-toggle="collapse" data-target="#settings-menu"><i class="icon-exclamation-sign"></i>Error Pages</div>
		                <ul id="settings-menu" class="nav nav-list collapse in">
		                  <li ><a href="403.html">403 page</a></li>
		                  <li ><a href="404.html">404 page</a></li>
		                  <li ><a href="500.html">500 page</a></li>
		                  <li ><a href="503.html">503 page</a></li>
		                </ul>
		            </div>
        </div>

<script>
    $(function () {
        $("#add").hide();
        $("#btn").click(function () {
            $("#add").show();
        });
    });
</script>
<div class="span9">
    <h1 class="page-title">管理分组</h1>
    <div class="row-fluid">
        <div class="block">
            <p class="block-heading" data-toggle="collapse" data-target="#chart-container">分组列表<button id="btn" style="float: right;" > 添加 </button></p>
            <div id="chart-container" class="block-body collapse in">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>编号</th>
                            <td>小组名称</td>
                            <td>介绍</td>
                             <td>操作</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($up)): $k = 0; $__LIST__ = $up;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($k % 2 );++$k;?><tr>
                            <td><?php echo ($k); ?></td>
                            <td><?php echo ($u["up_name"]); ?></td>
                            <td><?php echo ($u["up_intro"]); ?></td>
                            <td><a href="/manage/index.php/Admin/User/upedt/id/<?php echo ($up["up_id"]); ?>">编辑</a>&nbsp;&nbsp;<a  href="/manage/index.php/Admin/User/updel/id/<?php echo ($up["up_id"]); ?>">删除</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr id="add">
                        <td></td>
                        <td><input type="text" name="up_name" /></td>
                        <td><textarea name="up_intro" rows="1"></textarea></td>
                        <td><input type="submit" value="提交"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
	   <!--foot-->
<div>
    <footer>
        <hr>
            <p align="center">&copy; 2015 <a href="#">内容事业部</a>&nbsp;&nbsp;Copy right@ <a href="http://www.ulearn.cn/" title="文华在线" target="_blank">文华在线</a> </p>        
    </footer>	
</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/manage/Public/js/bootstrap.js"></script>
  </body>
</html>