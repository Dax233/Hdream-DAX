<?php if (!defined('EMLOG_ROOT')) {
    exit('error!');
}?>
<div id="page-content">
<div class="container">
   <div class="row">
      <div class="article col-xs-12 col-sm-8 col-md-8">
            <div class="page-wrap page-twitter">
                <ul>
                <?php foreach ($tws as $val) : $author = $user_cache[$val['author']]['name'];$avatar = empty($user_cache[$val['author']]['avatar']) ? BLOG_URL . 'admin/views/images/avatar.jpg' : BLOG_URL . $user_cache[$val['author']]['avatar'];$tid = (int)$val['id'];$img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img src="'.BLOG_URL.$val['img'].'"></a>'; ?>
                    <li>
                        <div class="p-ct"><?php echo $val['t'].'<br/>'.$img; ?></div>
                        <div class="p-ft"><img class="img-circle" src="<?php echo $avatar; ?>" alt="<?php echo $author; ?>"><span class="pull-left mr15"><?php echo $author; ?></span><?php echo $val['date']; ?></div>
                    </li>
                <?php endforeach; ?>
                </ul>
                <div class="am-pages"><div class="am-pages-item"><?php echo $pageurl; ?></div></div></div>
        </div>
        <div class="sidebar col-xs-12 col-sm-4 col-md-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;"><?php include View::getView('side'); ?></div>
    </div>
</div></div>
<?php include View::getView('footer'); ?>
