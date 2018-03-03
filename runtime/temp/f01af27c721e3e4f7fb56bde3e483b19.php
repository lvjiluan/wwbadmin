<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/Users/lvjiluan/project/wwbadmin/app/admin/view/platform/basic.html";i:1519745714;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>平台基本信息</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <fieldset class="layui-elem-field ">
        <legend>平台信息</legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>公司名称</th>
                    <th>公司网址</th>
                    <th>负责人email</th>
                    <th>负责人手机号</th>
                    <th>公司电话</th>
                    <th>备案号</th>
                    <th>copyright</th>
                    <th>公司地址</th>
                    <th>公司简介</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['sys_name']; ?></td>
                    <td><?php echo $v['sys_url']; ?></td>
                    <td><?php echo $v['sys_email']; ?></td>
                    <td><?php echo $v['sys_phone']; ?></td>
                    <td><?php echo $v['sys_tel']; ?></td>
                    <td><?php echo $v['sys_beh']; ?></td>
                    <td><?php echo $v['sys_copyright']; ?></td>
                    <td><?php echo $v['sys_adr']; ?></td>
                    <td><?php echo $v['sys_summary']; ?></td>
                    <td>
                        <a href="<?php echo url('basicEdit',['sys_id'=>$v['sys_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

        </div>
    </fieldset>
    <div class="admin-table-page">
        <div id="page" class="page">
            <?php echo $page; ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="__ADMIN__/plugins/layui/layui.js"></script>
<script src="__STATIC__/js/jquery.2.1.1.min.js"></script>
<script>
    layui.use(['form', 'layer'], function() {
        var form = layui.form(), layer = layui.layer;
    });

</script>
</body>

</html>