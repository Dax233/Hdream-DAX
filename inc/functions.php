<?php
/*
 * @des 主题控制中心
 * theme by 1梦
 */
if(!defined('EMLOG_ROOT')) {exit('Tadpole Functions Requrire Emlog!');}
function d($str){
	$str = str_replace("'","\'",$str );
	return $str;
}

function plugin_setting(){
	$do = isset($_GET['do']) ? $_GET['do'] : '';
    if($do == 'save') {
		if(empty($_POST)){
                emMsg("修改失败，请重试！");
			return ;
		}
		//处理上传的图片
		if ($_FILES['logo']['error'] != 4) {
			$logo = $_FILES['logo']['tmp_name'];
			$logopath = 'content/templates/Hdream/images/logo.png';
			$a = move_uploaded_file($logo, EMLOG_ROOT .'/'.$logopath);
			$logo = BLOG_URL.$logopath;
		}else{
			$logo = isset($_POST['logo']) ? d(trim($_POST['logo'])) : '';
		}
		 $arr_navico = $_POST['arr_navico'];
		 $arr_sortico = $_POST['arr_sortico'];
		 $weixin = isset($_POST['weixin']) ? d(trim($_POST['weixin'])) : '';
		 $homhead = isset($_POST['homhead']) ? d(trim($_POST['homhead'])) : '';
		 $homfu = isset($_POST['homfu']) ? d(trim($_POST['homfu'])) : '';
		 $headimg = isset($_POST['headimg']) ? d(trim($_POST['headimg'])) : '';
		 $weibotime = isset($_POST['weibotime']) ? d(trim($_POST['weibotime'])) : '';
		 $weibourl = isset($_POST['weibourl']) ? d(trim($_POST['weibourl'])) : '';
		 $Txweibo = isset($_POST['Txweibo']) ? d(trim($_POST['Txweibo'])) : '';
		 $Txweibourl = isset($_POST['Txweibourl']) ? d(trim($_POST['Txweibourl'])) : '';
		 $QQ = isset($_POST['QQ']) ? d(trim($_POST['QQ'])) : '';
		 $QQuel = isset($_POST['QQuel']) ? d(trim($_POST['QQuel'])) : '';
		 $QQmali = isset($_POST['QQmali']) ? d(trim($_POST['QQmali'])) : '';
		 $QQmaliurl = isset($_POST['QQmaliurl']) ? d(trim($_POST['QQmaliurl'])) : '';
		 $Slide = isset($_POST['Slide']) ? d(trim($_POST['Slide'])) : '';
		 $Slide1 = isset($_POST['Slide1']) ? d(trim($_POST['Slide1'])) : '';
		 $Surl1 = isset($_POST['Surl1']) ? d(trim($_POST['Surl1'])) : '';
		 $Slide2 = isset($_POST['Slide2']) ? d(trim($_POST['Slide2'])) : '';
		 $Surl2 = isset($_POST['Surl2']) ? d(trim($_POST['Surl2'])) : '';
		 $Slide3 = isset($_POST['Slide3']) ? d(trim($_POST['Slide3'])) : '';
		 $Surl3 = isset($_POST['Surl3']) ? d(trim($_POST['Surl3'])) : '';
		 $Sorts = isset($_POST['Sorts']) ? d(trim($_POST['Sorts'])) : '';
		 $Sorth1 = isset($_POST['Sorth1']) ? d(trim($_POST['Sorth1'])) : '';
		 $Sortp1 = isset($_POST['Sortp1']) ? d(trim($_POST['Sortp1'])) : '';
		 $Sorta1 = isset($_POST['Sorta1']) ? d(trim($_POST['Sorta1'])) : '';
		 $Sorth2 = isset($_POST['Sorth2']) ? d(trim($_POST['Sorth2'])) : '';
		 $Sortp2 = isset($_POST['Sortp2']) ? d(trim($_POST['Sortp2'])) : '';
		 $Sorta2 = isset($_POST['Sorta2']) ? d(trim($_POST['Sorta2'])) : '';
		 $Sorth3 = isset($_POST['Sorth3']) ? d(trim($_POST['Sorth3'])) : '';
		 $Sortp3 = isset($_POST['Sortp3']) ? d(trim($_POST['Sortp3'])) : '';
		 $Sorta3 = isset($_POST['Sorta3']) ? d(trim($_POST['Sorta3'])) : '';
		 $ads = isset($_POST['ads']) ? d(trim($_POST['ads'])) : '';
		 $adimg1 = isset($_POST['adimg1']) ? d(trim($_POST['adimg1'])) : '';
		 $adurl1 = isset($_POST['adurl1']) ? d(trim($_POST['adurl1'])) : '';
		 $adimg2 = isset($_POST['adimg2']) ? d(trim($_POST['adimg2'])) : '';
		 $adurl2 = isset($_POST['adurl2']) ? d(trim($_POST['adurl2'])) : '';
		 $headbiaoqian1 = isset($_POST['headbiaoqian1']) ? d(trim($_POST['headbiaoqian1'])) : '';
		 $head1 = isset($_POST['head1']) ? d(trim($_POST['head1'])) : '';
		 $headbiaoqian2 = isset($_POST['headbiaoqian2']) ? d(trim($_POST['headbiaoqian2'])) : '';
		 $head2 = isset($_POST['head2']) ? d(trim($_POST['head2'])) : '';
		 $headbiaoqian3 = isset($_POST['headbiaoqian3']) ? d(trim($_POST['headbiaoqian3'])) : '';
		 $head3 = isset($_POST['head3']) ? d(trim($_POST['head3'])) : '';
		 $more = isset($_POST['more']) ? d(trim($_POST['more'])) : '';
		 $more_html = isset($_POST['more_html']) ? d(trim($_POST['more_html'])) : '';
		 $Gonggao = isset($_POST['Gonggao']) ? d(trim($_POST['Gonggao'])) : '';
		 $yanhua = isset($_POST['yanhua']) ? d(trim($_POST['yanhua'])) : '';
		 $cachedata = "<?php
	\$arr_navico = '".serialize($arr_navico)."';
	\$arr_sortico = '".serialize($arr_sortico)."';	
	\$logo = '".$logo."';	 
	\$weixin = '".$weixin."';
	\$homhead = '".$homhead."';
	\$homfu = '".$homfu."';
	\$QQ = '".$QQ."';
	\$QQuel = '".$QQuel."';
	\$QQmali = '".$QQmali."';
	\$QQmaliurl = '".$QQmaliurl."';
	\$Slide = '".$Slide."';
	\$Slide1 = '".$Slide1."';
	\$Surl1 = '".$Surl1."';
	\$Slide2 = '".$Slide2."';
	\$Surl2 = '".$Surl2."';
	\$Slide3 = '".$Slide3."';
	\$Surl3 = '".$Surl3."';
	\$Sorts = '".$Sorts."';
	\$Sorth1 = '".$Sorth1."';
	\$Sortp1 = '".$Sortp1."';
	\$Sorta1 = '".$Sorta1."';
	\$Sorth2 = '".$Sorth2."';
	\$Sortp2 = '".$Sortp2."';
	\$Sorta2 = '".$Sorta2."';
	\$Sorth3 = '".$Sorth3."';
	\$Sortp3 = '".$Sortp3."';
	\$Sorta3 = '".$Sorta3."';
	\$headbiaoqian1 = '".$headbiaoqian1."';
	\$head1 = '".$head1."';
	\$headbiaoqian2 = '".$headbiaoqian2."';
	\$head2 = '".$head2."';
	\$headbiaoqian3 = '".$headbiaoqian3."';
	\$head3 = '".$head3."';
	\$more = '".$more."';
	\$more_html = '".$more_html."';
	\$Gonggao = '".$Gonggao."';
	\$yanhua = '".$yanhua."';
?>";
		$cachefile = EMLOG_ROOT.'/content/templates/Hdream/inc/config.php';
		@ $fp = fopen($cachefile, 'wb') OR emMsg('读取缓存失败。如果您使用的是Unix/Linux主机，请修改缓存目录 (content/cache) 下所有文件的权限为777。如果您使用的是Windows主机，请联系管理员，将该目录下所有文件设为可写');
		@ $fw =	fwrite($fp,$cachedata) OR emMsg('写入缓存失败，缓存目录 (content/cache) 不可写');
		fclose($fp);
		emMsg("修改配置成功！",BLOG_URL.'?setting');
		}
}