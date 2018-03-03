<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/Users/lvjiluan/project/wwbadmin/app/admin/view/organization/joincircle.html";i:1519745691;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>申请列表</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <?php if(ORG_ID <= 0): ?><blockquote class="layui-elem-quote">
        <a href="<?php echo url('joincircleAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>申请
        </a>
    </blockquote><?php endif; ?>
    <fieldset class="layui-elem-field ">
        <legend>申请<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>机构</th>
                    <th>申请人</th>
                    <th>申请时间</th>
                    <th>状态</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['oap_id']; ?></td>
                    <td><?php echo $v['org_name']; ?></td>
                    <td><?php echo $v['use_nickname']; ?></td>
                    <td><?php echo $v['oap_time']; ?></td>
                    <td><?php echo $v['oap_status']; ?></td>
                    <td>
                        <?php if($v['oap_status'] != '已通过'): ?>
                        <a href="javascript:;" onclick="return sta('<?php echo $v['oap_id']; ?>')" class="layui-btn layui-btn-mini">通过</a>
                        <?php if(ORG_ID <= 0): ?>
                        <a href="<?php echo url('joincircleEdit',['oap_id'=>$v['oap_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['oap_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
                        <?php endif; endif; ?>
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
            window.location.href = "<?php echo url('joincircleDel'); ?>?oap_id="+id;
        });
    }

    function sta(id) {
        layer.confirm('确定通过？通过后不能更改！', {icon: 3}, function (index) {
            window.location.href = "<?php echo url('joincircleStatus'); ?>?oap_id="+id;
        });
    }
</script>
</body>

</html>