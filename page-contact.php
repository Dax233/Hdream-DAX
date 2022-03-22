<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<link href="<?php echo TEMPLATE_URL; ?>css/metoo.css" rel="stylesheet" type="text/css" />	
<div id="page-content" class="topic-plaza">

<div class="container">
 <div class="likepage clearfix">
					<div class="post-content"><?php
global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];
$DB = MySql :: getInstance();
$sql = "SELECT count(*) AS comment_nums,poster,mail,url FROM ".DB_PREFIX."comment where date >0 and poster !='". $name ."' and  poster !='匿名' and hide ='n' group by poster order by comment_nums DESC limit 0,66";
$result = $DB -> query( $sql );
$x=1; 
while( $row = $DB -> fetch_array( $result ) )
if ($x<=1) {
{
$img = "";
 if( $row[ 'url' ] )
{$tmp = "<div class=\"like-post col-xs-6 col-sm-4 col-md-3\"><div class=\"like-post-box\" aos=\"fade-down\">
<a href=\"" . $row[ 'url' ] . "\" rel=\"external nofollow\" target=\"_blank\"><div class=\"views\"><span class=\"sealik\">吐槽 | </span><span class=\"count num\">" . $row[ 'comment_nums' ] . "条</span></div>
<div class=\"title\"><img class=\"lazy thumbnail\" style=\"float:left;\" src=\"" . getqqtx($row['mail']) . "\" ><h2>" . $row[ 'poster' ] ."</h2>
</div></a></div></div>";
}
else
{$tmp = $img;}
$output .= $tmp;
$x++;
}
}elseif($x<=2){
$img = "";
 if( $row[ 'url' ] )
{$tmp = "<div class=\"like-post col-xs-6 col-sm-4 col-md-3\"><div class=\"like-post-box\" aos=\"fade-down\">
<a href=\"" . $row[ 'url' ] . "\" rel=\"external nofollow\" target=\"_blank\"><div class=\"views\"><span class=\"sealik\">吐槽 | </span><span class=\"count num\">" . $row[ 'comment_nums' ] . "条</span></div>
<div class=\"title\"><img class=\"lazy thumbnail\" style=\"float:left;\" src=\"" . getqqtx($row['mail']) . "\" ><h2>" . $row[ 'poster' ] ."</h2>
</div></a></div></div>";
}
else
{$tmp = $img;}
$output .= $tmp;
$x++;
}elseif($x<=3){
$img = "";
 if( $row[ 'url' ] )
{$tmp = "<div class=\"like-post col-xs-6 col-sm-4 col-md-3\"><div class=\"like-post-box\" aos=\"fade-down\">
<a href=\"" . $row[ 'url' ] . "\" rel=\"external nofollow\" target=\"_blank\"><div class=\"views\"><span class=\"sealik\">吐槽 | </span><span class=\"count num\">" . $row[ 'comment_nums' ] . "条</span></div>
<div class=\"title\"><img class=\"lazy thumbnail\" style=\"float:left;\" src=\"" . getqqtx($row['mail']) . "\" ><h2>" . $row[ 'poster' ] ."</h2>
</div></a></div></div>";
}
else
{$tmp = $img;}
$output .= $tmp;
$x++;
}elseif($x>=4){
$img = "";
 if( $row[ 'url' ] )
{$tmp = "<div class=\"like-post col-xs-6 col-sm-4 col-md-3\"><div class=\"like-post-box\" aos=\"fade-down\">
<a href=\"" . $row[ 'url' ] . "\" rel=\"external nofollow\" target=\"_blank\"><div class=\"views\"><span class=\"sealik\">吐槽 | </span><span class=\"count num\">" . $row[ 'comment_nums' ] . "条</span></div>
<div class=\"title\"><img class=\"lazy thumbnail\" style=\"float:left;\" src=\"" . getqqtx($row['mail']) . "\" ><h2>" . $row[ 'poster' ] ."</h2>
</div></a></div></div>";
}
else
{$tmp = $img;}
$output .= $tmp;
$x++;
}

echo $output ;
 ?></div>
</div>

</div>
</div>
<?php include View::getView('footer'); ?>