<?php if (!defined('EMLOG_ROOT')) {
    exit('error!');
}?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>404错误提示</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="icon" type="image/png" href="<?php echo TEMPLATE_URL; ?>images/favicon.png">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-wrap page-error">
                    <p class="mb25">很抱歉，您访问的页面不存在或已被管理员删除</p>
                    <p class="tar"><a href="javascript:history.back(-1);" title="返回上一页">返回上一页</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
