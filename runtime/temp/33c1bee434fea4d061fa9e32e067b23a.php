<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/Users/lvjiluan/project/wwbadmin/app/admin/view/organization/comment.html";i:1519745685;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>机构评论信息</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <?php if(ORG_ID <= 0): ?><blockquote class="layui-elem-quote">
        <a href="<?php echo url('commentAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>机构评论
        </a>
    </blockquote><?php endif; ?>
    <fieldset class="layui-elem-field ">
        <legend>机构评论信息</legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>排序</th>
                    <th>机构</th>
                    <th>评论用户</th>
                    <th>评分</th>
                    <th>浏览量</th>
                    <th>留言数</th>
                    <th>评论内容</th>
                    <th>评论时间</th>
                    <?php if(ORG_ID <= 0): ?><th>操作</th><?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['oco_id']; ?></td>
                    <td><?php echo $v['org_name']; ?></td>
                    <td><?php echo $v['use_nickname']; ?></td>
                    <td><?php echo $v['oco_grade']; ?></td>
                    <td><?php echo $v['oco_click']; ?></td>
                    <td><?php echo $v['oco_com']; ?></td>
                    <td><?php echo $v['oco_content']; ?></td>
                    <td><?php echo $v['oco_time']; ?></td>
                    <?php if(ORG_ID <= 0): ?><td>
                        <a href="<?php echo url('commentEdit',['oco_id'=>$v['oco_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['oco_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
                    </td><?php endif; ?>
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
            window.location.href = "<?php echo url('commentDel'); ?>?oco_id="+id;
        });
    }

</script>
</body>

</html>