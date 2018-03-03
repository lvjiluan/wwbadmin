<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/Users/lvjiluan/project/wwbadmin/app/admin/view/organization/news.html";i:1519745699;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>消息推送管理</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <blockquote class="layui-elem-quote">
        <a href="<?php echo url('newsAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>消息推送
        </a>
    </blockquote>
    <fieldset class="layui-elem-field ">
        <legend>消息推送<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>推送类型</th>
                    <th>推送范围</th>
                    <th>推送内容</th>
                    <th>推送时间</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['pco_id']; ?></td>
                    <td><?php echo $v['pco_type']; ?></td>
                    <td><?php if($v['org_name'] != ''): ?>"<?php echo $v['org_name']; ?>"圈内<?php else: ?><?php echo $v['org_name']; endif; ?></td>
                    <td><?php echo $v['pco_content']; ?></td>
                    <td><?php echo $v['pco_time']; ?></td>
                    <td>
                        <a href="<?php echo url('newsEdit',['pco_id'=>$v['pco_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['pco_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
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
    function del(id) {
        layer.confirm('<?php echo lang("Are you sure you want to delete it"); ?>', {icon: 3}, function (index) {
            window.location.href = "<?php echo url('news'); ?>?pco_id="+id;
        });
    }

</script>
</body>

</html>