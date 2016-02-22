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
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/jquery-ui.css" />
    <link rel="shortcut icon" href="./favicon.ico" />
  <link rel="stylesheet" type="text/css" href="/manage/Public/css/font-awesome.css" />
  <script type="text/javascript" src="/manage/Public/js/jquery.js"></script>
  <script type="text/javascript" src="/manage/Public/js/jquery-ui.min.js"></script>
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
                                      <li ><a href="/manage/index.php/Admin/Set/index">课程设置</a></li>

                                  </ul>

                                    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>&nbsp;人事</div>
                                  <ul id="dashboard-menu" class="nav nav-list collapse in">

                                      <li><a href="/manage/index.php/Admin/User/index">人员管理</a></li>
                                      <li ><a href="/manage/index.php/Admin/User/dep">部门列表</a></li>
                                      <li ><a href="/manage/index.php/Admin//User/work">工作统计</a></li>
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

<script >
    //点击部门标题 显示或隐藏表格
</script>
<div class="span9">
    <div>
      <h1 class="page-title" align="center">人员管理</h1>
      <h3>
        <a class="btn-github" href="/manage/index.php/Admin/User/add">添加人员</a></h3></div>
    <div class="row-fluid">
      <div class="block">

        <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
          <!--循环输出部门名称-->

          <ul class="block-heading" role="tablist">

            <?php if(is_array($dep)): $i = 0; $__LIST__ = $dep;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><li class="ui-state-default ui-corner-top" ><a href="#tabs-<?php echo ($p["cat_id"]); ?>" >
                <?php echo ($p["cat_name"]); ?>
              </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>

          <!--循环输出部门人员信息-->
          <?php if(is_array($dep)): $i = 0; $__LIST__ = $dep;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><div id="tabs-<?php echo ($p["cat_id"]); ?>"  style="display: none;">
            <div class="block-body collapse in">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>编号</th>
                            <td>姓名</td>
                            <td>账户</td>
                            <td>角色</td>
                            <td>邮件</td>
                            <td>电话</td>
                            <td>qq</td>
                            <td>操作</td>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(is_array($user[$p['cat_id']])): $i = 0; $__LIST__ = $user[$p['cat_id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr>
                          <td><?php echo ($i); ?></td>
                          <td><?php echo ($u['u_real_name']); ?></td>
                          <td><?php echo ($u['u_name']); ?></td>
                          <td><?php echo ($u['u_role']); ?></td>
                          <td><?php echo ($u['u_email']); ?></td>
                          <td><?php echo ($u['u_tel']); ?></td>
                          <td><?php echo ($u['u_qq']); ?></td>
                          <td><a class="btn-info" href="/manage/index.php/Admin/User/edt/id/<?php echo ($u['u_id']); ?>">编辑</a>&nbsp;&nbsp;<a class="btn-info" href="/manage/index.php/Admin/User/del/id/<?php echo ($u['u_id']); ?>">删除</a></td><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
      <script type="text/javascript">
          $( "#tabs" ).tabs();
      </script>
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