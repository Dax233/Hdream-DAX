<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
    <link rel="stylesheet" id="carousel-css" href="<?php echo TEMPLATE_URL; ?>css/owl.carousel.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="animate-css" href="<?php echo TEMPLATE_URL; ?>css/nicetheme.css" type="text/css" media="all">
    <link rel="stylesheet" id="reset-css" href="<?php echo TEMPLATE_URL; ?>css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" id="style-css" href="<?php echo TEMPLATE_URL; ?>css/bkstyle.css" type="text/css" media="all">
    <script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>css/public.css" type="text/css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>css/font-awesome.min.css" type="text/css">
    <script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js"></script>
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>css/main.css" type="text/css" media="all">
        <style>
        #header .primary-menu ul>li>a, #menu-mobile a,
        #header .js-toggle-message button,
        #header .js-toggle-search,
        #header .toggle-login,
        #header .toggle-tougao{color:#000;}
        .navbar-toggle .icon-bar{background-color:#000;}
        #header .primary-menu ul>li.current-menu-item>a,
        #header .primary-menu ul>li.current-menu-ancestor > a,
        #header .primary-menu ul>li:hover>a,
        #header .primary-menu ul>li>a:hover{color:#19B5FE;}
        #header .toggle-tougao:hover,
        #header .primary-menu ul>li .sub-menu li a:hover,
        #header .primary-menu ul>li .sub-menu li.current-menu-item>a{color:#19B5FE;}
        #header .toggle-tougao,#header .toggle-tougao:hover{border-color:#404040;}
        #header .toggle-tougao:hover{background-color:#404040;
		</style>
    <?php doAction('index_head'); ?>