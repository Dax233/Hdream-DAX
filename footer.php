<?php if (!defined('EMLOG_ROOT')) {
    exit('error!');
}?>
<div class="clearfix"></div>
<div id="footer" class="two-s-footer clearfix">
	<div class="footer-box">
		<div class="container">
			<div class="social-footer">
				<a id="tooltip-f-weixin" class="wxii" href="javascript:void(0);"><i class="icon-wechat"></i></a>
				<a id="tooltip-f-qq" class="qq" href="<?php echo $QQuel; ?>"><i class="icon-qq"></i></a>
				<a id="tooltip-f-email" class="email" href="<?php echo $QQmaliurl; ?>"><i class="icon-mail"></i></a>
			</div>
			<div class="copyright-footer">

                        <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a>
                        <?php echo $footer_info; ?>
			</div>
			<div class="copyright-footer">
				<p>
				Powered By <a class="site-link" href="http://www.emlog.net/" title="Emlog" rel="home">Emlog</a> 
				· Hdream-DAX Theme By <a href="http://blog.bakadax.top/" target="_blank">达X</a>
				</p>
			</div>
						<div class="links-footer">
				<span>友情链接：</span>
				<?php footer_link(); ?>
			</div>
					    <div class="icp-footer">
			    <a href="https://icp.gov.moe/?keyword=20223332" target="_blank">萌ICP备20223332号</a>
		    </div>
					</div>
	</div>
</div>

<div class="search-form">
	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">       
		<div class="search-form-inner">
			<div class="search-form-box">
				 <input name="keyword" type="text" class="form-search" placeholder="搜索其实很简单">
				 <button type="submit" id="btn-search"><i class="icon-search"></i> </button>
			</div>
			<div class="search-commend">
				<h4>大家都在搜</h4>
				<ul>
					<?php search_tag($title); ?>
				</ul>
			</div>
		</div>                
	</form> 
	<div class="close-search">
		<span class="close-top"></span>
			<span class="close-bottom"></span>
    </div>
</div>
<div class="f-weixin-dropdown">
	<div class="tooltip-weixin-inner">
		<h3>大佬赞助点吧~qaq</h3>
		<div class="qcode"> 
			<img src="<?php echo $weixin; ?>" width="160" height="160" alt="微信公众号">
		</div>
	</div>
	<div class="close-weixin">
		<span class="close-top"></span>
			<span class="close-bottom"></span>
    </div>
</div>

<script type='text/javascript'>
/* <![CDATA[ */
var suxingme_url = {"slidestyle":"index_slide_sytle_2","wow":"1","duang":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/plugins.min.js'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/suxingme.js'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/owl.carousel.min.js'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/lazyload.min.js'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/wow.min.js'></script>
<?php
if($yanhua== 1 ){
?>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/meme.js"></script>
<canvas class="fireworks" style="position:fixed;left:0;top:0;z-index:99999999;pointer-events:none;"></canvas>
<script type="text/javascript" src="https://cdn.bootcss.com/animejs/2.2.0/anime.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/fireworks.js"></script>
<?php }?>
</body>
</html>
