<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
    <head>
        <meta charset="utf-8">
        <title>文华在线产品事业部管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/theme.css" />
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/font-awesome.css" />
    <link rel="shortcut icon" href="/manage/Public/favicon.ico" />


    <script src="lib/jquery-1.8.1.min.js" type="text/javascript"></script>

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
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    
  </head>

    <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
    <!--[if IE 7 ]> <body class="ie ie7"> <![endif]-->
    <!--[if IE 8 ]> <body class="ie ie8"> <![endif]-->
    <!--[if IE 9 ]> <body class="ie ie9"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!--> 
    <body> 
        <!--<![endif]-->

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="dialog span4">
                    <div class="block">
                        <div class="block-heading" align="center"><h2>文华在线内容事业部管理系统</h2></div>
                        <div class="block-body">
                            <form action="/manage/index.php/Admin/Index/logIn" method="post">
                                <label>用户名</label>
                                <input type="text" name="name" class="span12">
                                <label>密码</label>
                                <input type="password" name="pwd" class="span12">
                                <button type="submit" class="btn btn-primary pull-right">登录</button>
                                <label class="remember-me"><input type="checkbox"> 记住我</label>
                                <a href="/manage/index.php/Admin/User/reset">忘记密码?</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="btn-info" href="/manage/index.php/Admin/Index/reg">立即注册</a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Le javascript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="lib/bootstrap/js/bootstrap.js"></script>
    </body>
</html>




</head>
<body>