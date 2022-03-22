<?php 
/*
 * Hdream控制台
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
require_once('inc/config.php');
if (ROLE == ROLE_ADMIN):
require_once('inc/functions.php');
plugin_setting();
?>
<div id="page-content">
<div class="main_inner">
<link rel='stylesheet' id='set-css'  href='<?php echo TEMPLATE_URL; ?>css/set.css' type='text/css' media='all' />
<script src="<?php echo TEMPLATE_URL; ?>inc/jquery.js"></script>
<div id="setting" >
<main id="main" class="site-main" role="main">
<form action="?setting&do=save" method="post" id="input" class="da-form" enctype="multipart/form-data">
<div class="set_nav">
<ul><li class="active"><a href="#sethome">基本配置</a></li>
<li><a href="#setaside">轮播/专题</a></li>
<li><a href="#shejiao">社交</a></li>
<li><a href="#qita">其他</a></li>
<li class="last"><input type="submit" value="保 存" class="svae" /></li>
</ul></div>
<div class="set_cnt">
<div class="set_box" id="sethome" style="display:block">
<div class="da-form-row">
<td class="right_td">站点LOGO：</td>
<td class="left_td">
   <input type="file" name="logo" style="display: inline-flex;" class="text-width"/>
</td>
<td class="right_td"><img src="<?php echo $logo ?  $logo : ''.TEMPLATE_URL."images/logo.png";?>" width="135px" height="32px" style="margin-left:5px;margin-top:-3px;border-radius: 3px;border:1px solid #eee;padding:2px"></td>
</div>

<div class="da-form-row">
<td class="right_td">背景图设置
<br>http://blog.bakadax.top/content/templates/Hdream/ecy</td>
<br>
<td class="left_td"><input size="30" name="headimg" type="text" value="<?php echo $headimg; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">微信二维码</td>
<td class="left_td"><input size="30" name="weixin" type="text" value="<?php echo $weixin; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">网站标题</td>
<td class="left_td"><input size="30" name="homhead" type="text" value="<?php echo $homhead; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">开启公告：</td>
<td class="left_td"><input name="Gonggao" type="radio" value="1" <?php if ($Gonggao == "1") echo 'checked'?> ></input></td>
<td class="right_td">开启</td>
<td class="left_td"><input name="Gonggao" type="radio" value="2" <?php if ($Gonggao == "2") echo 'checked'?> ></input></td>
<td class="right_td">关闭</td>
</div>
<div class="da-form-row">
<td class="right_td">公告内容</td>
<td class="left_td"><input size="30" name="homfu" type="text" value="<?php echo $homfu; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">开启烟花点击效果功能：</td>
<td class="left_td"><input name="yanhua" type="radio" value="1" <?php if ($yanhua == "1") echo 'checked'?> ></input></td>
<td class="right_td">开启</td>
<td class="left_td"><input name="yanhua" type="radio" value="2" <?php if ($yanhua == "2") echo 'checked'?> ></input></td>
<td class="right_td">关闭</td>
</div>

</div>

<div class="set_box" id="setaside">

<div class="da-form-row">
<td class="right_td">开启轮播图：</td>
<td class="left_td"><input name="Slide" type="radio" value="1" <?php if ($Slide == "1") echo 'checked'?> ></input></td>
<td class="right_td">开启</td>
<td class="left_td"><input name="Slide" type="radio" value="2" <?php if ($Slide == "2") echo 'checked'?> ></input></td>
<td class="right_td">关闭</td>
</div>
<div class="da-form-row">
<td class="right_td">幻灯片图片1：</td>
<td class="left_td"><input size="30" name="Slide1" type="text" value="<?php echo $Slide1; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片标签：</td>
<td class="left_td"><input size="30" name="headbiaoqian1" type="text" value="<?php echo $headbiaoqian1; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片标题：</td>
<td class="left_td"><input size="30" name="head1" type="text" value="<?php echo $head1; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片链接1：</td>
<td class="left_td"><input size="30" name="Surl1" type="text" value="<?php echo $Surl1; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">幻灯片图片2：</td>
<td class="left_td"><input size="30" name="Slide2" type="text" value="<?php echo $Slide2; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片标签：</td>
<td class="left_td"><input size="30" name="headbiaoqian2" type="text" value="<?php echo $headbiaoqian2; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片标题：</td>
<td class="left_td"><input size="30" name="head2" type="text" value="<?php echo $head2; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片链接2：</td>
<td class="left_td"><input size="30" name="Surl2" type="text" value="<?php echo $Surl2; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">幻灯片图片3：</td>
<td class="left_td"><input size="30" name="Slide3" type="text" value="<?php echo $Slide3; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片标签：</td>
<td class="left_td"><input size="30" name="headbiaoqian3" type="text" value="<?php echo $headbiaoqian3; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片标题：</td>
<td class="left_td"><input size="30" name="head3" type="text" value="<?php echo $head3; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">幻灯片链接3：</td>
<td class="left_td"><input size="30" name="Surl3" type="text" value="<?php echo $Surl3; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">开启分类信息：</td>
<td class="left_td"><input name="Sorts" type="radio" value="1" <?php if ($Sorts == "1") echo 'checked'?> ></input></td>
<td class="right_td">开启</td>
<td class="left_td"><input name="Sorts" type="radio" value="2" <?php if ($Sorts == "2") echo 'checked'?> ></input></td>
<td class="right_td">关闭</td>
</div>
<div class="da-form-row">
<td class="right_td">分类一标题：</td>
<td class="left_td"><input size="30" name="Sorth1" type="text" value="<?php echo $Sorth1; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">分类一图片：</td>
<td class="left_td"><input size="30" name="Sortp1" type="text" value="<?php echo $Sortp1; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">分类一链接：</td>
<td class="left_td"><input size="30" name="Sorta1" type="text" value="<?php echo $Sorta1; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">分类二标题：</td>
<td class="left_td"><input size="30" name="Sorth2" type="text" value="<?php echo $Sorth2; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">分类二图片：</td>
<td class="left_td"><input size="30" name="Sortp2" type="text" value="<?php echo $Sortp2; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">分类二链接：</td>
<td class="left_td"><input size="30" name="Sorta2" type="text" value="<?php echo $Sorta2; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">分类三标题：</td>
<td class="left_td"><input size="30" name="Sorth3" type="text" value="<?php echo $Sorth3; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">分类三图片：</td>
<td class="left_td"><input size="30" name="Sortp3" type="text" value="<?php echo $Sortp3; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">分类三链接：</td>
<td class="left_td"><input size="30" name="Sorta3" type="text" value="<?php echo $Sorta3; ?>" class="text-width"/></td>
</div>
</div>


<div class="set_box" id="shejiao">
<div class="da-form-row">
<td class="right_td">微博名称</td>
<td class="left_td"><input size="30" name="weibotime" type="text" value="<?php echo $weibotime; ?>" class="text-width"/></td>
</div>
<div class="da-form-row">
<td class="right_td">新浪微博URL</td>
<td class="left_td"><input size="30" name="weibourl" type="text" value="<?php echo $weibourl; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">腾讯微博名称</td>
<td class="left_td"><input size="30" name="Txweibo" type="text" value="<?php echo $Txweibo; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">腾讯微博URL</td>
<td class="left_td"><input size="30" name="Txweibourl" type="text" value="<?php echo $Txweibourl; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">QQ号名称</td>
<td class="left_td"><input size="30" name="QQ" type="text" value="<?php echo $QQ; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">QQ联系URL</td>
<td class="left_td"><input size="30" name="QQuel" type="text" value="<?php echo $QQuel; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">QQ邮箱</td>
<td class="left_td"><input size="30" name="QQmali" type="text" value="<?php echo $QQmali; ?>" class="text-width"/></td>
</div>

<div class="da-form-row">
<td class="right_td">QQ邮箱URL</td>
<td class="left_td"><input size="30" name="QQmaliurl" type="text" value="<?php echo $QQmaliurl; ?>" class="text-width"/></td>
</div>
</div>

<div class="set_box" id="qita">
<div class="da-form-row">
<td class="right_td"><span style="color:red; font-weight:bold">导航设置: <a href="http://www.fontawesome.com.cn/faicons/" rel="external nofollow" target="_black">Awesome 字体图标</a></span></td>
</div>
<div class="da-form-row">
<td class="right_td"> 导航图标设置(<span style="color:red; font-weight:bold">注意更改导航后需重新设置</span>)</td></br>
<?php
global $CACHE; 
global $arr_navico1; 
$navi_cache = $CACHE->readCache('navi');
foreach($navi_cache as $num=>$value):

        if ($value['pid'] != 0) {
            continue;
        }
		$id=$value["id"];
		
		echo '<td class="right_td">'.$value['naviname'].' &nbsp; =></td>
<td class="left_td"><input class="input"  value="'.$arr_navico1[$id].'" name="arr_navico['.$id.']"></td></br>';
endforeach;
?>
</div>
<div class="da-form-row">
<td class="right_td">分类和二级导航图标(<span style="color:red; font-weight:bold">注意更改分类后需重新设置</span>)</td></br>
<?php
global $CACHE;
$sort_cache = $CACHE->readCache('sort'); 
global $arr_navico1; 
foreach($sort_cache as $num=>$value):
		$sid=$value["sid"];
		
		echo '<td class="right_td">'.$value['sortname'].' &nbsp; =></td>
<td class="left_td"><input class="input"  value="'.$arr_sortico1[$sid].'" name="arr_sortico['.$sid.']"></td></br>';
endforeach;
?>
</div>
<div class="da-form-row">
<td class="right_td">开启菜单栏更多：</td>
<td class="left_td"><input name="more" type="radio" value="1" <?php if ($more == "1") echo 'checked'?> ></input></td>
<td class="right_td">开启</td>
<td class="left_td"><input name="more" type="radio" value="2" <?php if ($more == "2") echo 'checked'?> ></input></td>
<td class="right_td">关闭</td>
</div>
<div class="da-form-row">
<td class="right_td">菜单栏更多功能 (<span style="color:red; font-weight:bold">支持html代码</span>)</td><br/>
<p><textarea name="more_html" cols="125" rows="8" id="home_text" ><?php echo $more_html; ?></textarea></p>
</div>

</div>

</div>
</form>
</main>
</div>
</div>
</div>
<script>
$(function(){
	$(".set_nav li").not(".set_nav .last").click(function(e) {
		e.preventDefault();
		$(this).addClass("active").siblings().removeClass("active");
		$($(this).children("a").attr("href")).show().siblings().hide();
	});
	
  })
</script>
<?php else:?>
<?php header("Location:".BLOG_URL.""); exit; ?> 
<?php endif; ?>
<div class="clear"></div>
<br/>
<?php include View::getView('footer');?>