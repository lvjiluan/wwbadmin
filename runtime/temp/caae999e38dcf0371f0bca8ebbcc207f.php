<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"D:\www\admin/app/admin\view\organization\dynamic.html";i:1519907130;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>动态列表</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <?php if(ORG_ID <= 0): ?><blockquote class="layui-elem-quote">
        <a href="<?php echo url('dynamicAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>动态
        </a>
    </blockquote><?php endif; ?>
    <fieldset class="layui-elem-field ">
        <legend>动态<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>机构</th>
                    <th>发布人</th>
                    <th>发布内容</th>
                    <th>发布时间</th>
                    <?php if(ORG_ID <= 0): ?><th><?php echo lang('action'); ?></th><?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['ody_id']; ?></td>
                    <td><?php echo $v['org_name']; ?></td>
                    <td><?php echo $v['use_nickname']; ?></td>.
                    <td><?php echo $v['ody_content']; ?></td>
                    <td><?php echo $v['ody_time']; ?></td>
                    <?php if(ORG_ID <= 0): ?>
                    <td>
                        <a href="<?php echo url('dynamicEdit',['ody_id'=>$v['ody_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['ody_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
                    </td>
                    <?php endif; ?>
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
            window.location.href = "<?php echo url('dynamicDel'); ?>?ody_id="+id;
        });
    }

</script>
</body>

</html>