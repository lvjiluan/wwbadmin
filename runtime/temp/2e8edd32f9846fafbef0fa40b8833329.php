<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"/Users/lvjiluan/project/wwbadmin/app/admin/view/content/comment.html";i:1519745657;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>评论管理</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <fieldset class="layui-elem-field ">
        <legend>评论<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <form method="post" id="formSearch" action="<?php echo url('comment'); ?>">
                <div class="demoTable" style="margin-bottom: 10px;">
                    搜索用户：
                    <div class="layui-inline">
                        <input class="layui-input" value="<?php echo $keyword; ?>" name="keyword" id="username" autocomplete="off">
                    </div>
                    <button class="layui-btn" data-type="reload">搜索</button>
                </div>
            </form>
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>文章标题</th>
                    <th>所属圈子</th>
                    <th>用户</th>
                    <th>内容</th>
                    <th>类型</th>
                    <th>发布时间</th>
                    <th>状态</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['tmc_id']; ?></td>
                    <td><?php echo $v['tma_title']; ?></td>
                    <td><?php echo $v['tmd_name']; ?></td>
                    <td><?php echo $v['use_nickname']; ?></td>
                    <td><?php echo $v['tmc_content']; ?></td>
                    <td><?php echo $v['tmc_type']; ?></td>
                    <td><?php echo $v['tmc_time']; ?></td>
                    <td>
                        <?php if($v["tmc_isshow"] == 1): ?>
                        <a class="red" href="javascript:;" onclick="return stateyes('<?php echo $v['tmc_id']; ?>');" title="正常">
                            <div id="zt<?php echo $v['tmc_id']; ?>">
                                <button class="layui-btn layui-btn-warm layui-btn-mini">正常</button>
                            </div>
                        </a>
                        <?php else: ?>
                        <a class="red" href="javascript:;" onclick="return stateyes('<?php echo $v['tmc_id']; ?>');" title="隐藏">
                            <div id="zt<?php echo $v['tmc_id']; ?>">
                                <button class="layui-btn layui-btn-danger layui-btn-mini">隐藏</button>
                            </div>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo url('commentEdit',['tmc_id'=>$v['tmc_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['tmc_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
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
        $('.demoTable .layui-btn').on('click', function(){
            $("#formSearch").submit();
        });
    });
    function del(id) {
        layer.confirm('<?php echo lang("Are you sure you want to delete it"); ?>', {icon: 3}, function (index) {
            window.location.href = "<?php echo url('commentDel'); ?>?tmc_id="+id;
        });
    }

    function stateyes(id) {
        $.post('<?php echo url("commentState"); ?>',{'tmc_id': id},function (data) {
            if (data.status==1) {
                if (data.info == "隐藏") {
                    var a = '<button class="layui-btn layui-btn-danger layui-btn-mini">隐藏</button>'
                    $('#zt' + id).html(a);
                    return false;
                } else {
                    var b = '<button class="layui-btn layui-btn-warm layui-btn-mini">正常</button>'
                    $('#zt' + id).html(b);
                    return false;
                }
            }else{
                layer.alert(data.info, {icon: 4});
                return false;
            }
        });
        return false;
    }
</script>
</body>

</html>