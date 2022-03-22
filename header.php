<?php
/*
Template Name:Hdream-DAX
Description:<a href="../?setting">模板设置</a>
Version:2.13
Author:1梦&DAX
Author Url:https://zz04.net/
Sidebar Amount:2
*/
if (!defined('EMLOG_ROOT')) {
    exit('error!');
} require_once View::getView('module'); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo $site_description; ?>">
    <meta name="keywords" content="<?php echo $site_key; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_title; ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php echo $blogname; ?>">
    <link rel="shortcut icon" href="<?php echo TEMPLATE_URL; ?>images/favicon.ico" type="image/x-icon" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo BLOG_URL; ?>rss.php">
<?php include View::getView('inc/head');?>

</head>
<body class="home blog off-canvas-nav-left">
    <div id="web_bg" style="position:absolute; width:100%; height:100%; z-index:-1">
    <img style="position:fixed;" src="http://blog.bakadax.top/content/templates/Hdream/ecy" height="100%" width="100%" />
</div>
<div id="header" class="navbar-fixed-top">
	<div class="container">
		<h1 class="logo">
<a href="<?php echo BLOG_URL; ?>" title="GRACE" style="background-image: url(<?php echo $logo ?  $logo : ''.TEMPLATE_URL."images/logo.png";?>);">
			</a>
		</h1>
		<div role="navigation" class="site-nav  primary-menu">
			<div class="menu-fix-box">
				 <ul id="menu-navigation" class="menu"><?php blog_navi(); ?></ul>				 			
			</div>
		</div>
		<div class="right-nav pull-right">
<div class="js-toggle-message hidden-xs hidden-sm">
<button id="sitemessage" type="button" data-toggle="dropdown"><i class="fa fa-bullhorn"></i></button>
<div class="dropdown-menu" role="menu"><ul>
<?php global $CACHE;$newtws_cache = $CACHE->readCache('newtw');
foreach($newtws_cache as $value):
$img = empty($value['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank"><i class="icon-image"></i></a>';?>
<li><span class="time"><?php echo date('n月j日',$value['date']);?></span><a  target="_blank" href="<?php echo BLOG_URL.'t';?>"><?php echo preg_replace("/\[F(([1]?[0-6]?[0-9])|176|170|171|172|173|174|175)\]/",'<img alt="face" src="'.TEMPLATE_URL.'img/face/$1.gif"  />',$value['t']);echo $img;?></a></li>
<?php endforeach; ?> 		
</ul><div class="more-messages">
<a target="_blank" href="<?php echo BLOG_URL.'t';?>">更多</a>
</div></div></div>
<button class="js-toggle-search"><i class="fa fa-search"></i></button>
</div>

		<div class="navbar-mobile hidden-md hidden-lg">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              	<span class="icon-bar"></span>
              	<span class="icon-bar"></span>
              	<span class="icon-bar"></span>
            </button>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	
<ul class="nav navbar-nav mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" style="position: relative; overflow: visible;">
<?php blog_navi(); ?>				   
</ul>
			</div>

			<div class="body-overlay"></div>
		</div>
	</div>	
</div>