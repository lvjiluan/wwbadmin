<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/Users/lvjiluan/project/wwbadmin/app/admin/view/platform/historysearch.html";i:1519745717;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>历史搜索</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <div style="height:50px;">
        <form method="post" action="<?php echo url('historysearch'); ?>" >
            <input style="width:300px;float:left;" value="<?php echo $content; ?>" placeholder="输入反馈用户搜索" class="layui-input" type="text" name="content" class="content" />
            <button style="float:left;margin-left:10px;" type="submit" class="layui-btn" lay-submit="" lay-filter="auth">搜索</button>
        </form>
    </div>
    <div style="clear:both"></div>
    <fieldset class="layui-elem-field ">
        <legend>历史搜索<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>搜索用户</th>
                    <th>搜索内容</th>
                    <th>搜索时间</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['slo_id']; ?></td>
                    <td><?php echo $v['use_nickname']; ?></td>
                    <td><div style="width:600px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $v['slo_content']; ?></div></td>
                    <td><?php echo $v['slo_time']; ?></td>
                    <td>
                        <a href="javascript:;" onclick="return del('<?php echo $v['slo_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
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
            window.location.href = "<?php echo url('historysearchDel'); ?>?slo_id="+id;
        });
    }


</script>
</body>

</html>