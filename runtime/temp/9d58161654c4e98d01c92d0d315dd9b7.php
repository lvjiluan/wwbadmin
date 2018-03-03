<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/Users/lvjiluan/project/wwbadmin/app/admin/view/auth/adminList.html";i:1519745643;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <blockquote class="layui-elem-quote">
        <a href="<?php echo url('adminAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?><?php echo lang('admin'); ?>
        </a>
    </blockquote>
    <fieldset class="layui-elem-field ">
        <legend><?php echo lang('admin'); ?><?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th><?php echo lang('username'); ?></th>
                    <th><?php echo lang('email'); ?></th>
                    <th><?php echo lang('userGroup'); ?></th>
                    <th><?php echo lang('tel'); ?></th>
                    <th><?php echo lang('ip'); ?></th>
                    <th><?php echo lang('status'); ?></th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($adminList) || $adminList instanceof \think\Collection || $adminList instanceof \think\Paginator): $i = 0; $__LIST__ = $adminList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['adm_username']; ?></td>
                    <td><?php echo $v['adm_email']; ?></td>
                    <td><?php echo $v['agr_title']; ?></td>
                    <td><?php echo $v['adm_phone']; ?></td>
                    <td><?php echo $v['adm_ip']; ?></td>
                    <td>
                        <?php if($v['adm_id'] == 1): ?>
                            <div>
                                <button disabled class="layui-btn layui-btn-mini layui-btn-disabled"><?php echo lang('enabled'); ?></button>
                            </div>
                        <?php else: if($v["adm_isopen"] == 1): ?>
                        <a class="red" href="javascript:;" onclick="return stateyes('<?php echo $v['adm_id']; ?>');" title="<?php echo lang('enabled'); ?>">
                            <div id="zt<?php echo $v['adm_id']; ?>">
                                <button class="layui-btn layui-btn-warm layui-btn-mini"><?php echo lang('enabled'); ?></button>
                            </div>
                        </a>
                        <?php else: ?>
                        <a class="red" href="javascript:;" onclick="return stateyes('<?php echo $v['adm_id']; ?>');" title="<?php echo lang('disabled'); ?>">
                            <div id="zt<?php echo $v['adm_id']; ?>">
                                <button class="layui-btn layui-btn-danger layui-btn-mini"><?php echo lang('disabled'); ?></button>
                            </div>
                        </a>
                        <?php endif; endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo url('adminEdit',['adm_id'=>$v['adm_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <?php if($v['adm_id'] == 1): ?>
                        <a href="#" class="layui-btn layui-btn-mini layui-btn-disabled"><?php echo lang('del'); ?></a>
                        <?php else: ?>
                        <a href="javascript:;" onclick="return del('<?php echo $v['adm_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
                        <?php endif; ?>
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
        if (id == 1) {
            layer.msg('<?php echo lang("Super administrator cannot be deleted"); ?>', {time: 1800,icon:0});
            return false;
        }
        layer.confirm('<?php echo lang("Are you sure you want to delete it"); ?>', {icon: 3}, function (index) {
            window.location.href = "<?php echo url('adminDel'); ?>?adm_id="+id;
        });
    }
    function stateyes(id) {
        $.post('<?php echo url("adminState"); ?>',{'adm_id': id},function (data) {
            if (data.status==1) {
                if (data.info == "<?php echo lang('disabled'); ?>") {
                    var a = '<button class="layui-btn layui-btn-danger layui-btn-mini"><?php echo lang("disabled"); ?></button>'
                    $('#zt' + id).html(a);
                    return false;
                } else {
                    var b = '<button class="layui-btn layui-btn-warm layui-btn-mini"><?php echo lang("enabled"); ?></button>'
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