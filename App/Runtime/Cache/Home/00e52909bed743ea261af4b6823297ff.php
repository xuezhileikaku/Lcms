<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
    <head>
        <meta charset="utf-8">
        <title>文华在线产品事业部管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/manage/Public/css/bootstrap.min.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="./favicon.ico" />
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
    <div class="container">
        <div class="head"><h1 align="center">文华在线内容事业部</h1></div>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#"></a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active">
                                <a href="index.html">首页</a>
                            </li>
                            <li>
                                <a href="settings.htm">课程</a>
                            </li>
                            <li>
                                <a href="help.htm">群组</a>
                            </li>
                            <li class="dropdown">
                                <a href="help.htm" class="dropdown-toggle" data-toggle="dropdown">Tours <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="help.htm">Introduction Tour</a>
                                    </li>
                                    <li>
                                        <a href="help.htm">Project Organisation</a>
                                    </li>
                                    <li>
                                        <a href="help.htm">Task Assignment</a>
                                    </li>
                                    <li>
                                        <a href="help.htm">Access Permissions</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li class="nav-header">
                                        Files
                                    </li>
                                    <li>
                                        <a href="help.htm">How to upload multiple files</a>
                                    </li>
                                    <li>
                                        <a href="help.htm">Using file version</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-search pull-left" action="">
                            <input type="text" class="search-query span2" placeholder="Search" />
                        </form>
                        <ul class="nav pull-right">
                            <li>
                                <a href="profile.htm">@用户名</a>
                            </li>
                            <li>
                                <a href="login.htm">退出</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<div class="row">
    <div class="span3">
        <div class="well" style="padding: 8px 0;">
            <ul class="nav nav-list">
                <li class="nav-header">
                    我的任务
                </li>
                <li class="active">
                    <a href="index.htm"><i class="icon-white icon-home"></i> 已完成</a>
                </li>
                <li>
                    <a href="projects.htm"><i class="icon-folder-open"></i>进行中</a>
                </li>
                <li>
                    <a href="tasks.htm"><i class="icon-check"></i> 未完成</a>
                </li>
                <li>
                    <a href="messages.htm"><i class="icon-envelope"></i> 消息</a>
                </li>
                <li>
                    <a href="files.htm"><i class="icon-file"></i> 活动</a>
                </li>
                <li>
                    <a href="activity.htm"><i class="icon-list-alt"></i> 文件</a>
                </li>
                <li class="nav-header">
                   我的账户
                </li>
                <li>
                    <a href="profile.htm"><i class="icon-user"></i> 个人设置</a>
                </li>
                <li>
                    <a href="settings.htm"><i class="icon-cog"></i>个人信息</a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="help.htm"><i class="icon-info-sign"></i> Help</a>
                </li>
                <li class="nav-header">
                    Bonus Templates
                </li>
                <li>
                    <a href="gallery.htm"><i class="icon-picture"></i> Gallery</a>
                </li>
                <li>
                    <a href="blank.htm"><i class="icon-stop"></i> Blank Slate</a>
                </li>
            </ul>
        </div>
    </div>
<div class="span9">
    <h1>
        Dashboard
    </h1>
    <div class="hero-unit">
        <h1>
            Welcome!
        </h1>
        <p>
            To get the most out of Akira start with our 3 minute tour.
        </p>
        <p>
            <a href="help.htm" class="btn btn-primary btn-large">Start Tour</a> <a class="btn btn-large">No Thanks</a>
        </p>
    </div>
    <div class="well summary">
        <ul>
            <li>
                <a href="#"><span class="count">3</span> Projects</a>
            </li>
            <li>
                <a href="#"><span class="count">27</span> Tasks</a>
            </li>
            <li>
                <a href="#"><span class="count">7</span> Messages</a>
            </li>
            <li class="last">
                <a href="#"><span class="count">5</span> Files</a>
            </li>
        </ul>
    </div>
    <h2>
        Recent Activity
    </h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    Project
                </th>
                <th>
                    Client
                </th>
                <th>
                    Type
                </th>
                <th>
                    Date
                </th>
                <th>
                    View
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Nike.com Redesign
                </td>
                <td>
                    Monsters Inc
                </td>
                <td>
                    New Task
                </td>
                <td>
                    4 days ago
                </td>
                <td>
                    <a href="#" class="view-link">View</a>
                </td>
            </tr>
            <tr>
                <td>
                    Nike.com Redesign
                </td>
                <td>
                    Monsters Inc
                </td>
                <td>
                    New Message
                </td>
                <td>
                    5 days ago
                </td>
                <td>
                    <a href="#" class="view-link">View</a>
                </td>
            </tr>
            <tr>
                <td>
                    Nike.com Redesign
                </td>
                <td>
                    Monsters Inc
                </td>
                <td>
                    New Project
                </td>
                <td>
                    5 days ago
                </td>
                <td>
                    <a href="#" class="view-link">View</a>
                </td>
            </tr>
            <tr>
                <td>
                    Twitter Server Consulting
                </td>
                <td>
                    Bad Robot
                </td>
                <td>
                    New Task
                </td>
                <td>
                    6 days ago
                </td>
                <td>
                    <a href="#" class="view-link">View</a>
                </td>
            </tr>
            <tr>
                <td>
                    Childrens Book Illustration
                </td>
                <td>
                    Evil Genius
                </td>
                <td>
                    New Message
                </td>
                <td>
                    9 days ago
                </td>
                <td>
                    <a href="#" class="view-link">View</a>
                </td>
            </tr>
            <tr>
                <td>
                    Twitter Server Consulting
                </td>
                <td>
                    Bad Robot
                </td>
                <td>
                    New Task
                </td>
                <td>
                    16 days ago
                </td>
                <td>
                    <a href="#" class="view-link">View</a>
                </td>
            </tr>
            <tr>
                <td>
                    Twitter Server Consulting
                </td>
                <td>
                    Bad Robot
                </td>
                <td>
                    New Project
                </td>
                <td>
                    16 days ago
                </td>
                <td>
                    <a href="#" class="view-link">View</a>
                </td>
            </tr>
            <tr>
                <td>
                    Twitter Server Proposal
                </td>
                <td>
                    Bad Robot
                </td>
                <td>
                    Completed Project
                </td>
                <td>
                    20 days ago
                </td>
                <td>
                    <a href="#" class="view-link">View</a>
                </td>
            </tr>
        </tbody>
    </table>
    <ul class="pager">
        <li class="next">
            <a href="activity.htm">More &rarr;</a>
        </li>
    </ul>
            <ul class="pager">
                <li class="center">
                    <a href="http://www.ulearn.cn/" target="_blank">优学院</a> <a href="http://www.ulearning.com.cn/" title="文华在线" target="_blank">文华在线</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/site.js"></script>
</body>
</html>