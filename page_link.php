<?php if (!defined('EMLOG_ROOT')) {
    exit('error!');
}?>

<div id="page-content">
<div class="container">
    <div class="row">
      <div class="article col-xs-12 col-sm-8 col-md-8">
          <div class="post-timthumb" style="background-image: url(<?php echo img_random() ?>);">
            <h1><?php echo $log_title; ?></h1></div>
 <div class="post">
					<div class="post-title">
							<div class="post-entry-categories"><?php blog_tag($logid); ?></div>	
						<div class="post_icon">
							<span class="postauthor">
							<?php blog_author($author); ?>
							</span> 
							<span class="postclock"><i class="icon-clock-1"></i><?php echo gmdate('Y-m-d H:i', $date); ?></span>
						</div>
					</div>
					<div class=" page-link"><?php page_link(); ?></div>
</div>

             <section class="single-post-comment">
<h2>评论</h2>
<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>				
<ul>
<?php blog_comments($comments); ?>	
</ul>		
</section>
        </div>
   <div class="sidebar col-xs-12 col-sm-4 col-md-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;"><?php include View::getView('side'); ?></div>
    </div>
</div>
</div>
<?php include View::getView('footer'); ?>