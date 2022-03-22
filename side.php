<?php if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
$widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array();
doAction('diff_side');
foreach ($widgets as $val) {
    $widget_title = @unserialize($options_cache['widget_title']);
    $custom_widget = @unserialize($options_cache['custom_widget']);
    if (strpos($val, 'custom_wg_') === 0) {
        $callback = 'widget_custom_text';
        if (function_exists($callback)) {
            call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content']);
        }
    } else {
        $callback = 'widget_'.$val;
        if (function_exists($callback)) {
            preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
            $wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
            call_user_func($callback, htmlspecialchars($wgTitle));
        }
    }
}
?>
<div class="widget suxingme_social">
    <h3><span>关注我们 么么哒！</span></h3>
    <div class="attentionus">
		<span class="social-widget-link social-link-qq"> 
		<span class="social-widget-link-count"><i class="icon-qq"></i><?php echo $QQ; ?></span> 
		<span class="social-widget-link-title">QQ</span> 
		<a href="<?php echo $QQuel; ?>" rel="nofollow"></a> 
		</span>
			
		<span class="social-widget-link social-link-email"> 
		<span class="social-widget-link-count"><i class="icon-mail"></i><?php echo $QQmali; ?></span> 
		<span class="social-widget-link-title">QQ邮箱</span> 
		<a href="<?php echo $QQmaliurl; ?>" target="_blank" rel="nofollow"></a> 
		</span>
			
		<span class="social-widget-link social-link-wechat"> 
		<span class="social-widget-link-count"><i class="icon-wechat"></i>微信</span> 
		<span class="social-widget-link-title">赞助</span> <a id="tooltip-s-weixin" href="javascript:void(0);"></a> 
		</span>	
		</ul>
	</div>
</div>