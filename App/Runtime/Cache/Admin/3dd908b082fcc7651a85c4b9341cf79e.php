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
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/theme.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/calendar/need/laydate.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/calendar/skins/molv/laydate.css" />
    <script type="text/javascript" src="/manage/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/manage/Public/js/jquery-ui.js"></script>
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
	                    <li id="fat-menu" class="paragraph">
                                <?php echo $_SESSION['user']['name'];?>
	                        
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
                                    
                                    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>&nbsp;人事</div>
                                  <ul id="dashboard-menu" class="nav nav-list collapse in">
                                    
                                      <li><a href="/manage/index.php/Admin/User/index">人员管理</a></li>
                                      <li ><a href="/manage/index.php/Admin/User/dep">部门列表</a></li>
                                      <li ><a href="/manage/index.php/Admin/Work/index">工作统计</a></li>
                                  </ul>
                                  
		                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>账户<span class="label label-info">+10</span></div>
		                <ul id="accounts-menu" class="nav nav-list collapse in">
                                   
		                  <li ><a href="/manage/index.php/Admin/Index/ext">退出</a></li>
		                  <li ><a href="/manage/index.php/Admin/User/reset">密码重置</a></li>
		                </ul>

		                <div class="nav-header" data-toggle="collapse" data-target="#legal-menu"><i class="icon-legal"></i>权限</div>
		                <ul id="legal-menu" class="nav nav-list collapse in">
		                  <li ><a href="privacy-policy.html">私有属性</a></li>
		                  <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
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
                            <br/>
                            课程：
                            <input type="text" name="co_name" class="form-control" placeholder="名称"/>&nbsp;&nbsp;&nbsp;&nbsp;
                            类型：<select style="width:16%;" name="co_type">
                                <option value="1">标准型</option>
                                <option value="0">定制型</option>
                            </select>

                        </div>
                        <div class="form-group">
                            类别：
                            <select  name="co_cat">
                                <option >请选择</option>
                                <?php if(is_array($data['cat'])): $k = 0; $__LIST__ = $data['cat'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($k % 2 );++$k;?><option value="<?php echo ($k); ?>"> <?php echo ($c); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                            负责人：
                            <input style="width:13%" name="co_manager" id="manager"  />
                        </div>
                        <div class="form-group">
                            计划完成时间：<input type="text" style="width: 15%" id="end" value="<?php echo ($dat["co_time_e"]); ?>" class="laydate-icon" name="co_time_e" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />&nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <div class="form-group">
                            <button type="submit"  id="btn" class="btn btn-info">提交</button>
                        </div>
                    </form>
                </div>
                <script>
                    //auto complete
                    $(function () {
                      var user=<?php echo ($data['user']); ?>;
                      $("#manager").autocomplete({
                            source: user
                      });
                    });
                    //end date
                    laydate({
                        elem: '#end', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
                        event: 'focus' //响应事件。如果没有传入event，则按照默认的click
                    });
                </script>
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