<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/Users/lvjiluan/project/wwbadmin/app/admin/view/content/slide.html";i:1519745669;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>用户信息</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <blockquote class="layui-elem-quote">
        <a href="<?php echo url('slideAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>轮播图
        </a>
    </blockquote>
    <fieldset class="layui-elem-field ">
        <legend>轮播图<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>描述</th>
                    <th>轮播图</th>
                    <th>跳转链接</th>
                    <th>添加时间</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['car_id']; ?></td>
                    <td><?php echo $v['car_title']; ?></td>
                    <td><img style="max-width:80px;max-height:60px;" src="<?php echo $v['car_picurl']; ?>"/></td>
                    <td><?php echo $v['car_url']; ?></td>
                    <td><?php echo $v['car_time']; ?></td>
                    <td>
                        <a href="<?php echo url('slideEdit',['car_id'=>$v['car_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['car_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
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
            window.location.href = "<?php echo url('slideDel'); ?>?car_id="+id;
        });
    }

</script>
</body>

</html>