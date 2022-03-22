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
						<span class="postauthor"><?php blog_author($author); ?>
						</span>
						<span class="postcat"><i class="fa fa-list"></i><?php blog_sort($logid); ?>
						</span>
						<span class="postclock"><i class="fa fa-clock-o"></i><?php echo gmdate('Y-n-j', $date); ?>
						</span>
						<span class="posteye"><i class="fa fa-eye"></i><?php echo $views; ?>
						</span>
						<span class="postcomment"><i class="fa fa-comment"></i><?php echo $comnum; ?>
						</span>
						</div>
					</div>
					<div class="post-content">
					    <?php echo $log_content; ?>
					    <?php doAction('log_related', $logData); ?>
					    <br>
					    <div class="post-declare">
                    <p>作者：<?php blog_author1($author); ?>，如若转载，请注明出处：<a href="<?php echo $value['log_url']; ?>">《<?php echo $log_title; ?>》</a></p>
                </div>
					    <div class="next-prev-posts clearfix"><?php neighbor_log($neighborLog); ?></div>
                    
</div>
                </div>
<section class="single-post-comment">
<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>				
<ul>
<?php blog_comments($comments); ?>	
</ul>		
</section>
        </div>
   <div class="sidebar col-xs-12 col-sm-4 col-md-4"><?php include View::getView('side'); ?></div>
    </div>
</div>
</div>
<?php include View::getView('footer'); ?>
