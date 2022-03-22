<?php if (!defined('EMLOG_ROOT')) {
    exit('error!');
} if (isset($_GET["setting"])) {
    include View::getView('setting');
    exit;
}?>
<div id="page-content">
	<div class="top-content">
	<div class="container">
		<div class="row">

<?php
if($Slide== 1 ){
?>
	<div class="owl-carousel top-slide-two">
		<div class="item">	
			<a href="<?php echo $Surl1?>" title="<?php echo $head1; ?>">
				<div class="slider-content" style="background-image: url(<?php echo $Slide1; ?>); ">
					<div class="slider-content-item">
						<div class="slider-cat clearfix"><?php echo $headbiaoqian1;?></div>  
							<h2><?php echo $head1; ?></h2>
					</div>
				</div>
			</a>
		</div>
		<div class="item">	
			<a href="<?php echo $Surl2?>" title="<?php echo $head2; ?>">
				<div class="slider-content" style="background-image: url(<?php echo $Slide2; ?>); ">
					<div class="slider-content-item">
						<div class="slider-cat clearfix"><?php echo $headbiaoqian2;?></div>  
							<h2><?php echo $head2; ?></h2>
					</div>
				</div>
			</a>
		</div>
		<div class="item">	
			<a href="<?php echo $Surl3?>" title="<?php echo $head3; ?>">
				<div class="slider-content" style="background-image: url(<?php echo $Slide3; ?>); ">
					<div class="slider-content-item">
						<div class="slider-cat clearfix"><?php echo $headbiaoqian3;?></div>  
							<h2><?php echo $head3; ?></h2>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="top-singles hidden-xs hidden-sm">
	      <?php Colasysj(); ?>
	</div>
		<?php }?>
		</div>
	</div>
</div>
		<div class="recommend-content">
			<div class="container">
				<div class="row">
					<div class="cat">
						<div class="thumbnail-cat">
							<div class="image col-xs-12 col-sm-4 col-md-4">
								<div class="index-cat-box" style="background-image:url(<?php echo $Sortp1;?>)">
									<a class="iscat" href="<?php echo $Sorta1;?>">
									     <div class="promo-overlay"><?php echo $Sorth1;?></div>
									    <div class="modulo_line"></div>
									</a>
								</div>
							</div>
							<div class="image col-xs-12 col-sm-4 col-md-4">
								<div class="index-cat-box" style="background-image:url(<?php echo $Sortp2;?>)">
                                    <a class="iscat" href="<?php echo $Sorta2;?>">
                                        <div class="promo-overlay"><?php echo $Sorth2;?></div>
                                        <div class="modulo_line"></div>
                                    </a>
								</div>
							</div>
							<div class="image col-xs-12 col-sm-4 col-md-4">
								<div class="index-cat-box" style="background-image:url(<?php echo $Sortp3;?>)">
									<a class="iscat" href="<?php echo $Sorta3;?>">
										<div class="promo-overlay"><?php echo $Sorth3;?></div>
										<div class="modulo_line"></div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
   <div class="main-content">
	<div class="container">
    <div class="row">
        <div class="article col-xs-12 col-sm-8 col-md-8">
        <?php
if($Gonggao== 1 ){
?>
            <div class="breadcrumbs">
                <span itemprop="itemListElement"><span itemprop="name"><i class="icon-megaphone"></i>公告：</span></span>
                <span class="current"><?php echo $homfu; ?></span>
            </div>
        <?php }?>
       <div class="ajax-load-box posts-con">
        <?php doAction('index_loglist_top'); ?>
        <?php if (!empty($logs)) {
            foreach ($logs as $value): if (preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $imgs)) {
                $imgNum = count($imgs[1]);
            }

         ?>
                <!-- 单图模式 -->
            <div class="ajax-load-con content posts-default wow fadeInUp">
                  <div class="content-box">	
                  <?php if (!empty($imgs[1]) && $imgNum < 3) {
                    $n = 1; for ($i=0;$i < $n;$i++) {
                        $img = $imgs[1][$i]; ?>
                  <div class="posts-default-img">
			<a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>" >
				<div class="overlay"></div>	
<img class="lazy thumbnail" data-original="<?php echo $img; ?>" src="<?php echo TEMPLATE_URL; ?>/images/lazyload.png" alt="<?php echo $value['log_url']; ?>" style="display: block;">
			</a> 
		</div>
                        <?php
                    }
                }?>
                <!-- 单图模式NED -->
<div class="posts-default-box">
<div class="posts-default-title">
    <div class="post-entry-categories"><?php blog_tag($value['logid']); ?></div>
        <h2>
           <a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a>
        </h2>
</div>
<?php if (!empty($imgs[1]) && $imgNum >= 3) { ?>           
   <div class="post-images-item">
		<ul>
			<?php $n = 3; for ($i=0;$i < $n;$i++) {$img = $imgs[1][$i]; ?>
			<li>
                <div class="image-item">
                        <a href="<?php echo $value['log_url']; ?>">
                            <div class="overlay"></div>
<img class="lazy thumbnail" data-original="<?php echo $img; ?>" src="<?php echo TEMPLATE_URL; ?>/images/lazyload.png" alt="<?php echo $value['log_url']; ?>" style="display: block;">
                        </a>
                </div>
           </li>
         <?php }?>
        </ul>
   </div>
<?php }?>
            <div class="index-descrip">
                <?php 
                if (!empty($value['excerpt'])) {
                        echo $value['excerpt'];
                    } else {
                        echo tool_purecontent($value['content'], 110);
                }?>
            </div>
            <div class="posts-default-info">
				<ul>
				    <li class="post-author hidden-xs hidden-sm"><?php blog_author1($value['author']); ?></li>
					<li><i class="fa fa-list"></i><?php blog_sort($value['logid']); ?></li>
					<li><i class="fa fa-clock-o"></i><?php echo gmdate('Y-n-j', $value['date']); ?></li>
					<li class="hidden-xs"><i class="fa fa-eye"></i><?php echo $value['views']; ?></li>
					<li class="hidden-xs"><i class="fa fa-comments-o"></i><?php echo $value['comnum']; ?></li>
				</ul>
			</div>
</div>
                </div>
                </div>
                <?php
            endforeach;
        } else {
            ?>
            <div class="index-box">抱歉，没有符合您查询条件的结果</div>
            <?php
        }?>
<nav class="navigation pagination" role="navigation">
		<h2 class="screen-reader-text">文章导航</h2>
		<?php echo tp_page($lognum,$index_lognum,$page,$pageurl);?>
</nav>
        </div></div><!-- 文章结束-->
          <div class="article col-xs-12 col-sm-8 col-md-4 sidebar"><?php require_once View::getView('side');?></div>
    </div>
</div>
</div>
</div>
<?php include View::getView('footer'); ?>