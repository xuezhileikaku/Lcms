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
    <link rel="stylesheet" type="text/css" href="/manage/Public/calendar/need/laydate.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/calendar/skins/molv/laydate.css" /> 
    <script type="text/javascript" src="/manage/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/manage/Public/calendar/laydate.js"></script>

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
                                    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>课程</div>
                                  <ul id="dashboard-menu" class="nav nav-list collapse in">
                                      
                                      <li><a href="/manage/index.php/Admin/Course/index">课程管理</a></li>

                                      <li ><a href="/manage/index.php/Admin/Cat/index">课程分类</a></li>
                                      <li ><a href="/manage/index.php/Admin/Course/set">课程设置</a></li>
                                  </ul>
                                    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>工作</div>
                                <ul id="dashboard-menu" class="nav nav-list collapse in">
                                <li><a href="index.html">周统计</a></li>
                                <li ><a href="users.html">月统计</a></li>
                               
                                </ul>
                                    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>&nbsp;人事</div>
                                  <ul id="dashboard-menu" class="nav nav-list collapse in">
                                      <li><a href="/manage/index.php/Admin/User/index">人员管理</a></li>
                                      <li ><a href="/manage/index.php/Admin/Gp/index">人员分组</a></li>
                                      
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

<div class="span9">
    <h1 class="page-title">课程管理</h1>
    <div class="row-fluid">

        <div class="block span12">
            <div class="block-heading" data-toggle="collapse" data-target="#widget1container">添加课程 </div>
            <div id="widget1container" class="block-body collapse in">
                <div class=''>
                    <form action="/manage/index.php/Admin/Course/addUp" method="post" >
                        <div class="form-group">
                            <label>课程</label>
                            <input type="text" name="co_name" style="width:5%;" class="form-control" placeholder="名称"/>&nbsp;&nbsp;&nbsp;&nbsp;
                            <select style="width:6%;" name="co_type">
                                <option value="标准">标准</option>
                                <option value="定制">定制</option>
                            </select>
                            <label>负责人</label>
                            <select style="width:10%" name="co_manager">
                                <option><ul>
                                    <li>教学设计部
                                    <li>黎明</li>
                                    <li>黎明</li>
                                    <li>黎明</li>
                                    </li>
                                    <li>思政部
                                        <li>朝阳</li>
                                        <li>朝阳</li>
                                        <li>朝阳</li>
                                    </li>
                                </ul></option>
                                
                                <?php if(is_array($data['user'])): $k = 0; $__LIST__ = $data['user'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($k % 2 );++$k;?><option value="<?php echo ($k); ?>"><?php echo ($u); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <div class="form-group">                  
                            <label>课程类别</label>
                            <select style="width:10%" name="co_cat">   
                                <option >请选择</option>
                                <?php if(is_array($data['cat']['name'])): $k = 0; $__LIST__ = $data['cat']['name'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($k % 2 );++$k;?><option value="<?php echo ($k); ?>"> <?php echo ($c); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>                   
                        </div>
                        <div class="form-group">
                            <label>开始时间</label>
                            <input type="text" style="width: 15%" id="start" value="<?php echo ($dat["co_time_s"]); ?>" class="laydate-icon" name="co_time_s" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"/>&nbsp;&nbsp;
                            <input type="text" style="width: 15%" id="end" value="<?php echo ($dat["co_time_e"]); ?>" class="laydate-icon" name="co_time_e" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />  
                        </div>
                        <div class="form-group">
                            <label>课程进度</label>
                            <input type="range" value="0" step="10" id="range" style="width: 15%"  title="" name="co_process" min="0" max="100" /><span id="pro"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btn" class="btn btn-info">提交</button>
                        </div>
                    </form>
                </div>
                <script>
                    //设置input 进度的值
                    var $pro = $("input[name='co_process']");
                    $pro.mouseout(function () {
                            $("#pro").empty();
                            $("#pro").append($pro.val() + '%');
                        });
                    //日期范围限制
                    var start = {
                        elem: '#start',
                        format: 'YYYY-MM-DD',
                        min: laydate.now(), //设定最小日期为当前日期
                        max: '2099-06-16', //最大日期
                        istime: true,
                        istoday: false,
                        choose: function (datas) {
                            end.min = datas; //开始日选好后，重置结束日的最小日期
                            end.start = datas //将结束日的初始值设定为开始日
                        }
                    };

                    var end = {
                        elem: '#end',
                        format: 'YYYY-MM-DD',
                        min: laydate.now(),
                        max: '2099-06-16',
                        istime: true,
                        istoday: false,
                        choose: function (datas) {
                            start.max = datas; //结束日选好后，充值开始日的最大日期
                        }
                    };
                    laydate(start);
                    laydate(end);
                </script>
            </div>
        </div>
        <div class="block-body collapse in">

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