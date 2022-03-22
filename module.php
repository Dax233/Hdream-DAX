<?php 
/**
 * Hdrean.Theme by 1梦
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
date_default_timezone_set('Asia/Shanghai');
if (PHP_VERSION < '5.0'){emMsg('您的php版本过低，请选用支持PHP5的环境配置。');}
require_once View::getView('inc/config');
global $arr_navico1;
$arr_navico1 = unserialize($arr_navico);
global $arr_sortico1;
$arr_sortico1 = unserialize($arr_sortico);
?>

<?php 
function widget_blogger($title)
//个人信息
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $name = $user_cache[1]['name'];
    $avatar = empty($user_cache[1]['photo']['src']) ? BLOG_URL.'admin/views/images/avatar.jpg' : BLOG_URL.$user_cache[1]['photo']['src']; ?>
   <div class="widget suxingme_post_author">
	<div class="authors_profile">
		<div class="avatar-panel">
				<a target="_blank" href="<?php echo Url::author('1'); ?>" title="<?php echo $name; ?>" class="author_pic">
					<img alt="" src="<?php echo $avatar; ?>" class="avatar avatar-80 photo" height="80" width="80" style="display: inline;">	
				</a>
		</div>	
		<div class="author_name">
		<a target="_blank" href="<?php echo Url::author('1'); ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a>
		</div>
		<p class="author_dec"><?php echo $user_cache[1]['des']; ?></p>
	</div>
   </div>
<?php }?>

<?php function widget_twitter($title)
//微语
{
    global $CACHE;
    $newtws_cache = $CACHE->readCache('newtw');
    $istwitter = Option::get('istwitter'); ?>
    <div class="widget widget_suxingme_postlist">
        <h3><span><?php echo $title; ?></span></h3>
    <div class="sidebar-twitter">
    <ul>
    <?php foreach ($newtws_cache as $value): ?>
    <li><p><?php echo $value['t']; ?></p><span><?php echo smartDate($value['date']); ?></span></li>
    <?php endforeach; ?><?php if ($istwitter == 'y') : ?>
    <li class="tac"><a href="<?php echo BLOG_URL.'t/'; ?>">查看更多</a></li>
    <?php endif; ?>
    </ul>
    </div>
    </div>
    <?php

}?>
<?php function widget_tag($title)
//标签
{
    global $CACHE;
    $tag_cache = $CACHE->readCache('tags');
    $tag_cachenum = array_slice($tag_cache, 0, 30); ?>
    <div class="widget widget_suxingme_postlist">
        <h3><span><?php echo $title; ?></span></h3>
    <div class="tag post-entry-categories">
    <?php foreach ($tag_cachenum as $value): ?>
    <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章">
    <?php echo $value['tagname']; ?></a>
    <?php endforeach; ?>
    </div>
    </div>
    <?php }?>

<?php function widget_sort($title)
{
    global $CACHE;
    $sort_cache = $CACHE->readCache('sort'); ?>
    <div class="widget widget_suxingme_postlist">
        <h3><span><?php echo $title; ?></span></h3>
    <div class="sidebar-sort">
    <ul class="clearfix">
    <?php foreach ($sort_cache as $value): if ($value['pid'] != 0) {
        continue;
    }?>
    <li><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
    <?php if (!empty($value['children'])): ?>
    <ul>
    <?php $children = $value['children'];
    foreach ($children as $key):$value = $sort_cache[$key]; ?>
    <li>
    <a href="<?php echo Url::sort($value['sid']); ?>"><span></span><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a></li>
    <?php endforeach; ?>
    </ul><?php endif; ?></li><?php endforeach; ?></ul></div></div>
    <?php }?>
    
    <?php function widget_archive($title)
{
    global $CACHE;
    $record_cache = $CACHE->readCache('record'); ?>
    <div class="widget widget_suxingme_postlist">
        <h3><span><?php echo $title; ?></span></h3>
    <div class="sidebar-archive">
    <ul class="clearfix">
    <?php foreach ($record_cache as $value): ?>
    <li><a href="<?php echo Url::record($value['date']); ?>">
    <span></span>
    <?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li><?php endforeach; ?></ul></div>
    </div>
<?php }?>
    
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
<div class="widget widget_coments">
<h3><?php echo $title; ?></h3>	
<ul>
<?php foreach($com_cache as $value): $url = Url::comment($value['gid'], $value['page'], $value['cid']); ?>
<li class="sidcomment">
<div class="perMsg cl">
     <a href="<?php echo $url; ?>" target="_blank" class="avater" rel="nofollow">
    <img src="<?php echo getqqtx($value['mail']);?>" class="avatar"   alt="" width="40" height="40">
    </a>
     <div class="txt">
 <div class="rows cl">
    <a href="<?php echo $url; ?>" target="_blank" class="name" rel="nofollow"><span><?php echo $value['name']; ?></span>：</a>
    <br>
</div>
<div class="artHeadTit">
<a href="<?php echo $url; ?>" target="_blank" title="" alt=""><?php echo sidecomcontent($value['content']); ?> </a>
</div>
</div>
</div>					
</li>
<?php endforeach; ?>
</ul>
</div>	
<?php }?>

<?php function widget_newlog($title)
//最新文章
{
    $db = MySql::getInstance();
    $sql = $db->query("SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog' AND top='n' order by date DESC limit 5"); ?>
   <div class="widget widget_suxingme_postlist">
      <h3><span><?php echo $title; ?></span></h3>
      <div class="attentionus">
		<ul class="recent-posts-widget">
		<?php while ($value = $db->fetch_array($sql)) {
        if (img_zw($value['content'])) {
            $imgurl = img_zw($value['content']);
        } elseif (img_fj($value['gid'])) {
            $imgurl = img_fj($value['gid']);
        } else {
            $imgurl = img_random();
        }?>
        		<li class="one">
						<a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>">
							<div class="overlay"></div>
				<img class="lazy thumbnail" data-original="<?php echo $imgurl; ?>" src="<?php echo $imgurl; ?>" alt="<?php echo $value['title']; ?>" />	
																					<div class="title">
								<h4><?php echo $value['title']; ?></h4>
							</div>
						</a>
			</li>
             
        <?php }?>
        </ul>
      </div>
   </div>
<?php }?>
        
<?php function widget_hotlog($title)
//热门文章
{
    $index_hotlognum = Option::get('index_hotlognum');
    $db = MySql::getInstance();
    $sql = $db->query("SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog' AND top='n' order by views DESC limit $index_hotlognum"); ?>
            <div class="widget widget_suxingme_postlist">
        <h3><span>最热看点</span></h3>
        <div class="sidebar-log">
        <?php while ($value = $db->fetch_array($sql)) {
        if (img_zw($value['content'])) {
            $imgurl = img_zw($value['content']);
        } elseif (img_fj($value['gid'])) {
            $imgurl = img_fj($value['gid']);
        } else {
            $imgurl = img_random();
        }?>

      	<ul class="widget_suxingme_topic">
	<li>
		<a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>">
			<div class="overlay"></div>	
			<div class="image" style="background-image: url(<?php echo $imgurl; ?>);"></div>	
			<div class="title">
				<h4><?php echo $value['title']; ?></h4>
				<div class="meta"><span>查看文章</span></div>
			</div>
		</a>
	</li>
	</ul>
    <?php }?>
    </div></div>
    <?php

}?>

<?php function widget_random_log($title)
//侧边栏随机文章
{
    $index_randlognum = Option::get('index_randlognum');
    $db = MySql::getInstance();
    $sql = $db->query("SELECT gid,title,date FROM ".DB_PREFIX."blog WHERE type='blog' ORDER BY rand() LIMIT $index_randlognum"); ?>
            <div class="widget widget_suxingme_postlist">
        <h3><span><?php echo $title; ?></span></h3>
        <div class="sidebar-log"><ul>
        <?php while ($value = $db->fetch_array($sql)) {
        if (img_zw($value['content'])) {
            $imgurl = img_zw($value['content']);
        } elseif (img_fj($value['gid'])) {
            $imgurl = img_fj($value['gid']);
        } else {
            $imgurl = img_random();
        }?>
        <li class="clearfix"><a class="t-left" href="<?php echo Url::log($value['gid']); ?>"><img src="<?php echo $imgurl; ?>"></a><div class="t-right"><div class="t-cont"><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></div></div></li><?php

    }?></ul></div></div><?php

}?>
<?php function widget_link($title)
//链接只在首页显示
{
    global $CACHE;
    $link_cache = $CACHE->readCache('link');
    if (!tool_ishome()) {
        return;
    }?>        <div class="widget widget_suxingme_postlist">
        <h3><span><?php echo $title; ?></span></h3>
        <div class="sidebar-link"><ul class="clearfix"><?php foreach ($link_cache as $value): ?><li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li><?php endforeach; ?></ul></div></div><?php

}?>
<?php function widget_custom_text($title, $content)
{
    ?>        <div class="widget widget_suxingme_postlist">
        <h3><span><?php echo $title; ?></span></h3>
        <div class="sidebar-custom"><?php echo $content; ?></div></div><?php

}?>


<?php
//blog：PC导航
function blog_navi(){
    global $CACHE; 
    global $arr_navico1;
    global $arr_sortico1;
	define('TEMROOT', EMLOG_ROOT.'/content/templates/'.get_template_name().'/inc');
    $config_file = TEMROOT.'/config.php';
    if (is_file($config_file)) {include $config_file;}
	$navi_cache = $CACHE->readCache('navi');
	?>
<?php
	foreach($navi_cache as $value): $id=$value["id"]; if ($value['pid'] != 0) {continue;}
		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):?>
		<li class=" menu-item-has-children"> 
	<a href="javascript:;"><i class="icon-doc"></i>管理站点</a>
	<ul class="sub-menu"> 
			<li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/">后花园</a></li>
			<li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
    </ul> 
	</li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current-menu-ancestor ' : '';
		$menu_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? '' : 'menu-item-has-children';
		$tunu_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'menu-item-has-children' : '';
		?>		
		<li class="<?php echo $current_tab;?><?php if (!empty($value['children']) || !empty($value['childnavi'])) :?><?php echo $tunu_tab;?> <?php echo $menu_tab;?><?php endif;?>">
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php if(empty($arr_navico1[$id])) {echo $value[''];}else {echo "<i class='".$arr_navico1[$id]."'></i>";} ?><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-menu">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'" target="_blank"><i class="'.$arr_sortico1[$row['sid']].'"></i>'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-menu">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>
		</li>
	<?php endforeach; ?>	
<?php if($more=='1'){?>	
	<li class=" menu-item-has-children"> 
	<a href="javascript:;"><i class="icon-doc"></i>页面模板</a>
	<ul class="sub-menu"> 
	<?php echo $more_html;?>
	</ul> 
	</li>
	<?php }?>
<?php }?>

<?php function tool_ishome()
//置顶
{
    if (BLOG_URL.trim(Dispatcher::setPath(), '/') == BLOG_URL) {
        return true;
    } else {
        return false;
    }
}?>

<?php function tool_purecontent($content, $strlen = null)
{
    $content = strip_tags($content);
    if ($strlen) {
        $content = subString($content, 0, $strlen);
    }
    return $content;
}?>
<?php function img_random()
//随机缩略图
{
    $imgsrc = TEMPLATE_URL."images/random/".rand(1, 7).".jpg";
    return $imgsrc;
} 
function img_zw($content)
{
    preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content, $img);
    $imgsrc = !empty($img[1]) ? $img[1][0] : '';
    if ($imgsrc):return $imgsrc;
    endif;
} 
function img_fj($blogid)
{
    $db = MySql::getInstance();
    $sql = $db->query("SELECT * FROM ".DB_PREFIX."attachment WHERE blogid=".$blogid." AND (`filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png') ORDER BY `aid` ASC LIMIT 1");
    $imgsrc = '';
    while ($row = $db->fetch_array($sql)) {
        $imgsrc .= BLOG_URL.substr($row['filepath'], 3, strlen($row['filepath']));
    }
    return $imgsrc;
}?>
<?php
//blog：文章作者
function blog_author1($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php function blog_author($uid)
//头像
{
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $author = $user_cache[$uid]['name'];
    $avatar = empty($user_cache[$uid]['photo']['src']) ? BLOG_URL.'admin/views/images/avatar.jpg' : BLOG_URL.$user_cache[$uid]['photo']['src'];
    echo '<a href="'.Url::author($uid).'" title="'.$author.'"><img src="'.$avatar.'" alt="'.$author.'">'.$author.'</a>';
}?>
<?php function blog_sort($blogid)
{
    global $CACHE;
    $log_cache_sort = $CACHE->readCache('logsort'); ?>
    <?php if (!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
    <?php endif; ?>
<?php }?>
<?php function blog_tag($blogid)
//标签
{
    global $CACHE;
    $log_cache_tags = $CACHE->readCache('logtags');
    if (!empty($log_cache_tags[$blogid])) {
        foreach ($log_cache_tags[$blogid] as $value) {
            $tag .= "<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
        }
        echo $tag;
    }
}?>
<?php function editflg($logid, $author)
//文章编辑
{
    $editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
    echo $editflg;
}?>

<?php
//blog：评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
<hr>
<?php endif; ?>	
<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'"  class="user_info_name" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
?>
<li class="comment even thread-even depth" id="comment-<?php echo $comment['cid']; ?>"  aos="fade-down">
<div class="comment cf comment_details">
<div class="avatar left"><a href="javascript:void(0)" name="<?php echo $comment['cid']; ?>"><?php if($isGravatar == 'y'): ?><img src="<?php echo getqqtx($comment['mail']);?>" class="avatar" width="100" height="100"></a></div>
<?php endif; ?>	
<div id="div-comment-<?php echo $comment['cid']; ?>" class="commenttext">
<div class="comment-wrapper">
 <div class="postmeta">
<?php echo $comment['poster']; ?>
<time class="timeago" datetime="<?php echo $comment['date']; ?>"> • <?php echo $comment['date']; ?></time>
<a rel="nofollow" class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a>		
</div>
<div class="commemt-main"> <p><?php echo comcontent($comment['content']); ?></p></div>
</div></div>
</div>
<?php blog_comments_children($comments, $comment['children']); ?>
</li>
<?php endforeach; ?>
<div class="pagnation">
<?php echo $commentPageUrl;?>
</div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'"  class="user_info_name target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<ul class="children"> 
<li class="comment even thread-even depth" >
<div class="comment cf comment_details">
<?php if($isGravatar == 'y'): ?>
<div class="avatar left"><a href="javascript:void(0)" name="<?php echo $comment['cid']; ?>">
    <img src="<?php echo getqqtx($comment['mail']);?>" class="avatar" width="100" height="100"></a></div>	
<?php endif; ?>	
<div id="comment-<?php echo $comment['cid']; ?>" class="commenttext">
<div class="comment-wrapper">
 <div class="postmeta">
 <?php echo $comment['poster']; ?> 
<time class="timeago" datetime="<?php echo $comment['date']; ?>"> •<?php echo $comment['date']; ?></time>
<?php if($comment['level'] < 4): ?>
<a rel="nofollow" class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" >回复</a>		 
<?php endif; ?>
</div>
<div class="commemt-main"><p><?php echo comcontent($comment['content']); ?></p></div>
</div></div></div>
</li>
<?php blog_comments_children($comments, $comment['children']);?>
 </ul>	
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
<div id="comment-place">
<div class="single-post-comment-reply" id="comment-post">
<form action="<?php echo BLOG_URL; ?>index.php?action=addcom" class="comment_form" method="post" id="commentform">
				<div class="single-post-comment__form cf"> 
				<div class="form-submit">
						<button id="smilies" class="btn" type="button" data-toggle="dropdown">
    						<i class="icon-emo-happy"></i> 表情
  						</button>
						<div class="dropdown-menu dropdown-menu-left comment-form-smilies">
						    <div class="smilies-box"><?php include View::getView('inc/smile');?></div>
						</div>
						</div>
					<div class="comment-textarea-box">
							<textarea class="comment-textarea" name="comment" id="comment" placeholder="说点什么吧..."></textarea><div id="comment_message" style="display:none;"></div>
						</div>
					<input type="hidden" name="gid" value="<?php echo $logid; ?>" id="comment_post_ID">
                      <input type="hidden" name="comment_parent" id="comment_parent" value="0">
               <span class="mail-notify-check">
				</div>			
				<div id="comboxinfo" class="comboxinfo cl">
				<?php if(ROLE == ROLE_VISITOR): ?>
				<div id="comment-author-info" class="clearfix">   
						<div class="comment-md-3">
							<label for="author">昵称<span class="required">*</span></label>
							<input type="text" name="comname" id="author" class="comment-md-9" size="22" tabindex="1">
						</div>
						<div class="comment-md-3">
							<label for="email">邮箱<span class="required">*</span></label>
							<input type="text" name="commail" id="email" class="comment-md-9" size="22" tabindex="2">
						</div>
						<div class="comment-md-3 comment-form-url">
							<label for="url">网址<span class="required"></span></label>
							<input type="text" name="comurl"  id="url" class="comment-md-9" size="22" tabindex="3">
						</div>
					</div>
					<?php endif; ?>
					<?php echo $verifyCode; ?>
					 <button type="submit" class="ladda-button comment-submit-btn" id="comment_submit">
					 
					 <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
					 <span class="ladda-label" >提交评论</span><a name="respond"></a></button>
					<div id="cancel_comment_reply"><a rel="nofollow" id="cancel-reply" href="javascript:void(0);" onclick="cancelReply()" style="display:none;">取消回复</a></div>
				</div>							
			</form>		
			</div>	</div>		
	<?php endif; ?>
<?php }?>

<?php 
//评论内容
function comcontent($pl) {
	$patterns = array ("/@/","/\[blockquote\](.*?)\[\/blockquote\]/","/\[F(([1]?[0-6]?[0-9])|176|170|171|172|173|174|175)\]/"); 
	$replace = array ('回复了','<blockquote>$1</blockquote>','<img alt="表情" src="'.TEMPLATE_URL.'images/face/$1.gif"  height="30" width="30"/>'); 
	$pl=preg_replace($patterns, $replace, $pl);
	return $pl;
}
?>

<?php function index_slide()
{
    $db = MySql::getInstance();
    $sql = $db->query("SELECT * FROM ".DB_PREFIX."blog WHERE type='blog' and hide='n' and top='y' ORDER BY date DESC LIMIT 5");
    $slidebg = TEMPLATE_URL."images/small.gif"; ?>
    <div class="index-slide">
    <div class="swiper-container">
    <ul class="swiper-wrapper">
    <?php while ($value = $db->fetch_array($sql)) {
        if (img_zw($value['content'])) {
            $imgurl = img_zw($value['content']);
        } elseif (img_fj($value['gid'])) {
            $imgurl = img_fj($value['gid']);
        } else {
            $imgurl = img_random();
        }
        if (strstr($imgurl, 'thum-')) {
            $imgurl = strstr($imgurl, 'thum-', true).substr(strstr($imgurl, 'thum-'), 5);
        }?>
    <li class="swiper-slide">
    <a class="img" href="<?php echo Url::log($value['gid']); ?>" style="background-image: url(<?php echo $imgurl; ?>);" target="_blank">
    <img src="<?php echo $slidebg; ?>">
    </a>
    </li>
    <?php }?>
    </ul>
    <div class="swiper-pagination"></div>
    </div>
    </div>
<?php }?>

<?php function page_archive()
{
    global $CACHE;
    $record_cache = $CACHE->readCache('record');
    $output = '';
    foreach ($record_cache as $value) {
        $output .= '<h4>'.$value['record'].'</h4>'.page_archive_list($value['date']);
    }
    return $output;
} function page_archive_list($record)
{
    if (preg_match("/^([\d]{4})([\d]{2})$/", $record, $match)) {
        $days = getMonthDayNum($match[2], $match[1]);
        $record_stime = emStrtotime($record.'01');
        $record_etime = $record_stime + 3600 * 24 * $days;
    } else {
        $record_stime = emStrtotime($record);
        $record_etime = $record_stime + 3600 * 24;
    }
    $sql = "and date>=$record_stime and date<$record_etime order by top desc,date desc";
    $result = page_archive_db($sql);
    return $result;
} function page_archive_db($condition = '')
{
    $DB = MySql::getInstance();
    $sql = "SELECT gid, title, date, views FROM ".DB_PREFIX."blog WHERE type='blog' and hide='n' $condition";
    $result = $DB->query($sql);
    $output = '';
    while ($row = $DB->fetch_array($result)) {
        $log_url = Url::log($row['gid']);
        $output .= '<li><span></span><time>'.smartDate($row['date']).'</time><a href="'.$log_url.'" target="_blank">'.$row['title'].'</a></li>';
    }
    $output = '<ul>'.$output.'</ul>';
    return $output;
}?>

<?php function page_link()
//友情链接
{
    global $CACHE;
    $link_cache = $CACHE->readCache('link'); ?><ul class="clearfix"><?php foreach ($link_cache as $value): ?><li><a href="<?php echo $value['url']; ?>" target="_blank" rel="nofollow"><span><?php echo $value['link']; ?></span><em><?php echo $value['des']; ?></em></a></li><?php endforeach; ?></ul>
<?php }?>

<?php function footer_link()
//底部链接
{
    global $CACHE;
    $link_cache = $CACHE->readCache('link'); ?>
        <?php foreach ($link_cache as $value): ?>
        <a href="<?php echo $value['url']; ?>" target="_blank" rel="nofollow"><?php echo $value['link']; ?></a>
        <?php endforeach; ?>
<?php }?>

<?php function page_tag()
//页面标签
{
    global $CACHE;
    $tag_cache = $CACHE->readCache('tags');
    $mytag_cache = array_slice($tag_cache, 0, 24); ?><ul class="clearfix"><?php foreach ($mytag_cache as $value): ?><li><h5 class="p-name"><a href="<?php echo Url::tag($value['tagurl']); ?>"><?php echo $value['tagname']; ?></a><em>x <?php echo $value['usenum']; ?></em></h5><?php $db = MySql::getInstance();
    $mytagname = $value['tagname'];
    $sql = $db->query("SELECT * FROM ".DB_PREFIX."tag WHERE tagname='$mytagname'");
    while ($row = $db->fetch_array($sql)) {
        $mygid = substr(strrchr(rtrim(trim($row['gid']), ','), ','), 1);
    }
    $sql = $db->query("SELECT * FROM ".DB_PREFIX."blog WHERE gid='$mygid'");
    while ($row2 = $db->fetch_array($sql)) {
        ?><p class="p-title"><a href="<?php echo Url::log($row2['gid']); ?>" title="<?php echo $row2['title']; ?>"><?php echo $row2['title']; ?></a></p><?php

    }?></li><?php endforeach; ?></ul>
<?php }?>

<?php //获取QQ信息
function getqqtx($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array()){
    preg_match_all('/((\d)*)@qq.com/', $email, $vai);
    if (empty($vai['1']['0'])) {
        $url = 'https://secure.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
    }else{
        $url = 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';
    }
    return  $url;
}
if(isset($_POST['qq'])){
	if(empty($_POST['qq'])){
		echo "@@({comname:'QQ账号错误',commail:'QQ账号错误',comurl:'QQ账号错误',toux:'https://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=1321807442@qq.com&src_uin=admin@92mo.cn&fid=blog&spec=100'})@@";
		return ;
	}
	$spurl = "http://r.pengyou.com/fcg-bin/cgi_get_portrait.fcg?uins={$_POST['qq']}";
	$data = file_get_contents($spurl);
	$nc=explode('"',$data);
	$s=$nc[5];
	$bm=mb_convert_encoding($s,'UTF-8','UTF-8,GBK,GB2312,BIG5');
	if(empty($bm)){echo "@@({comname:'QQ账号错误',commail:'QQ账号错误',comurl:'QQ账号错误',toux:'https://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=1321807442@qq.com&src_uin=admin@92mo.cn&fid=blog&spec=100'})@@";}
else{echo "@@({comname:'{$bm}',commail:'{$_POST['qq']}@qq.com',comurl:'http://user.qzone.qq.com/{$_POST['qq']}',toux:'https://q.qlogo.cn/headimg_dl?bs=qq&dst_uin={$_POST['qq']}&src_uin=admin@92mo.cn&fid=blog&spec=100'})@@";}}
function getqqxx($qq,$role=''){
	if(!empty($role)){
		return $role;
	}
	$ssud=explode("@",$qq,2);
	if($ssud[1]=='qq.com'){
	return getqqtx($ssud[0]);
	}else{	
	return MyGravatar($qq,$role);	
}}
?>
<?php function picthumb($blogid) {$db = MySql::getInstance();$sql = "SELECT * FROM ".DB_PREFIX."attachment WHERE blogid=".$blogid." AND (`filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png') ORDER BY `aid` ASC LIMIT 0,1";$imgs = $db->query($sql);while($row = $db->fetch_array($imgs)){$pict.= ''.BLOG_URL.substr($row['filepath'],3,strlen($row['filepath'])).'';}return $pict;}function pic_thumb($content){preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $content, $img);$imgsrc = !empty($img[1]) ? $img[1][0] : '';if($imgsrc):return $imgsrc;endif;}?>
<?php 
//侧边栏评论
function sidecomcontent($pl) {
	$patterns = array ("/@/","/\[blockquote\](.*?)\[\/blockquote\]/","/\[F(([1]?[0-6]?[0-9])|176|170|171|172|173|174|175)\]/"); 
	$replace = array ('回复了','<small>$1</small>','<img alt="表情" src="'.TEMPLATE_URL.'images/face/$1.gif" height="20" width="20"/>'); 
	$pl=preg_replace($patterns, $replace, $pl);
	return $pl;
}
//格式化内容工具
function blog_tool_purecontent($content, $strlen = null){
        $content = str_replace('继续阅读&gt;&gt;', '', strip_tags($content));
        if ($strlen) {
            $content = subString(preg_replace("/\[gsvideo url=(.*) w=(.*) h=(.*)\]/", '', $content), 0, $strlen);
        }
        return $content;
}
//获取附件第一张图片
function getThumbnail($blogid){
    $db = MySql::getInstance();
    $sql = "SELECT * FROM ".DB_PREFIX."attachment WHERE blogid=".$blogid." AND (`filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png') ORDER BY `aid` ASC LIMIT 0,1";
    //die($sql);
    $imgs = $db->query($sql);
    $img_path = "";
	if(mysql_num_rows($imgs)){
		while($row = $db->fetch_array($imgs)){
			 $img_path .= BLOG_URL.substr($row['filepath'],3,strlen($row['filepath']));
		}
	}else{
		$img_path = false;
	}
    return $img_path;
}
//数据库报错用
function getimgforgid($gid){
    $db = MySql::getInstance();
    $sql = 'SELECT content FROM ' . DB_PREFIX . "blog WHERE gid='".$gid."'";
	$d = $db->once_fetch_array($sql);

	return isset($d['content']) && preg_match("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $d['content'], $img) ? $img[1] : false;
}
function gettime($id){
	$db = MySql::getInstance();
	$sql = 'SELECT * FROM ' . DB_PREFIX . "blog WHERE gid='".$id."'";
	$date = $db->query($sql);
	while ($row = $db->fetch_array($date)) {
		$time = date('Y-m-d',$row['date']);
	}
	return $time;
}
//获取blog表的一条内容,$content填写表名
function blog_content($gid,$content){
    $db = MySql::getInstance();
    $sql = 'SELECT * FROM ' . DB_PREFIX . "blog WHERE gid='".$gid."'";
    $sql = $db->query($sql);
    while ($row = $db->fetch_array($sql)) {
        $content = $row[$content];
	}
    return $content;
}

//自动标签内链
   function nltag($content ,$domain) {
            global $CACHE;  
            $tag_cache = $CACHE->readCache('tags');              
            foreach($tag_cache as $value){  
                $tag_url = Url::tag($value['tagurl']);  
                $keyword = $value['tagname'];  
                $cleankeyword = stripslashes($keyword);  
                $url = "<a href=\"{$tag_url}\" title=\"浏览关于“{$cleankeyword}”的文章\" target=\"_blank\" >{$cleankeyword}</a>";  
                $regEx = '\'(?!((<.*?)|(<a.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s';  
                $content = preg_replace($regEx,$url,$content);          
}  
return $content;  
}
//正则去除HTML
function ClearHtml($content) {  
   $preg = "/<\/?[^>]+>/i";
   return preg_replace($preg,'',$content);
}

?>
<?php 
//分页函数
function tp_page($count,$perlogs,$page,$url,$anchor=''){
$pnums = @ceil($count / $perlogs);
$page = @min($pnums,$page);
$prepg=$page-1;
$nextpg=($page==$pnums ? 0 : $page+1);
$urlHome = preg_replace("|[\?&/][^\./\?&=]*page[=/\-]|","",$url);
$re = "<ul class=\"nav-links\">";
if($pnums<=1) return false;		
if($page!=1) $re .=""; 
if($prepg) $re .="<a class=\"next page-numbers\" href=\"$url$prepg$anchor\" >上一页</a>";
for ($i = $page-2;$i <= $page+2 && $i <= $pnums; $i++){
if ($i > 0){if ($i == $page){$re .= "<a class=\"page-numbers current\">$i</a>";
}elseif($i == 1){$re .= "<a href=\"$urlHome$anchor\" class=\"page-numbers\">$i</a>";
}else{$re .= "<a href=\"$url$i$anchor\" class=\"page-numbers\">$i</a>";}
}}
if($nextpg) $re .="<a href=\"$url$nextpg$anchor\" class=\"next page-numbers\" title=\"下一页\">下一页</a>"; 
if($page!=$pnums) $re.="";
$re .="";
$re .="</ul>";
return $re;}
?>		
<?php
//search：搜索标签
function search_tag($title){
    global $CACHE;
    $tag_cache = $CACHE->readCache('tags');?>
        <?php shuffle ($tag_cache);
		$tag_cache = array_slice($tag_cache,0,30);foreach($tag_cache as $value): ?>
			<li><a href="<?php echo Url::tag($value['tagurl']); ?>"><?php echo $value['tagname']; ?></a></li>
        <?php endforeach; ?>
<?php }?>

<?php
//首页随机
 function Colasysj(){ global $CACHE; ?>
<div class="single-item">
<?php
$index_newlognum = 2;
$db = MySql::getInstance();
//随机文章
	$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND top='n' AND sortid=sid order by RAND() limit 0,$index_newlognum"); 
while ($value = $db->fetch_array($sql)) {
        if (img_zw($value['content'])) {
            $imgurl = img_zw($value['content']);
        } elseif (img_fj($value['gid'])) {
            $imgurl = img_fj($value['gid']);
        } else {
            $imgurl = img_random();
        }?>
<div class="single-item">
<div class="image" style="background-image:url(<?php echo $imgurl;?>)">
    <a href="<?php echo Url::log($row['gid']);?>">
        <div class="overlay"></div>
        <div class="title"><span>随机推荐</span><h3><?php echo $value['title']; ?></h3></div>
        </a>
	</div>
</div>
<?php }?>
</div> 
 <?php }?>
<?php
//Custom：获取模板目录名称
function get_template_name(){
    $template_name = str_replace(BLOG_URL,"",TEMPLATE_URL);
    $template_name = str_replace("content/templates/","",$template_name);
    $template_name = str_replace("/","",$template_name);
    return $template_name;
}
?>
<?php function neighbor_log($neighborLog)
//文章上下页
{
    extract($neighborLog); ?>
	<?php if ($prevLog):?>
	<div class="prev-post">
	<a href="<?php echo Url::log($prevLog['gid']) ?>" title="<?php echo $prevLog['title']; ?>" target="_blank" class="prev has-background" style="background-image: url(<?php echo img_fj($prevLog['gid']); ?>)" alt="<?php echo $prevLog['title']; ?>">
	     <span>Previous Post</span>
	<h4><?php echo $prevLog['title']; ?></h4> </a>
	</div>
	<?php endif; ?>
	<?php if ($nextLog):?>
	<div class="next-post">
	<a href="<?php echo Url::log($nextLog['gid']) ?>" title="<?php echo $nextLog['title']; ?>" target="_blank" class="prev has-background" style="background-image: url(<?php echo img_fj($nextLog['gid']); ?>)" alt="<?php echo $nextLog['title']; ?>">
	     <span>Next Post</span>
	<h4><?php echo $nextLog['title']; ?></h4>
	</a>
	</div>
	<?php endif; ?>
	
	<?php }?>