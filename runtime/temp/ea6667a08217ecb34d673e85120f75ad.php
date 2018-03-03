<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"D:\www\admin/app/admin\view\userinfo\basic.html";i:1519907107;}*/ ?>
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
        <a href="<?php echo url('basicAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>用户
        </a>
    </blockquote>
    <fieldset class="layui-elem-field ">
        <legend>用户信息<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <form method="get" id="formSearch" action="<?php echo url('basic'); ?>">
                <div class="demoTable" style="margin-bottom: 10px;">
                    搜索用户：
                    <div class="layui-inline">
                        <input type="hidden" class="layui-input" value="1" name="pageIndex"  autocomplete="off">
                        <input class="layui-input" value="<?php echo $keyword; ?>" name="keyword" id="username" autocomplete="off">
                    </div>
                    <button class="layui-btn" data-type="reload">搜索</button>
                </div>
            </form>
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>用户id</th>
                    <th>昵称</th>
                    <th>手机号</th>
                    <th>头像</th>
                    <th>所属机构</th>
                    <th>性别</th>
                    <th>简介</th>
                    <th>状态</th>
                    <th>注册时间</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['use_id']; ?></td>
                    <td><?php echo $v['use_nickname']; ?></td>
                    <td><?php echo $v['use_phone']; ?></td>
                    <td><img style="max-width:80px;max-height:60px;" src="<?php echo $v['use_picurl']; ?>"/></td>
                    <td><?php echo $v['org_name']; ?></td>
                    <td><?php echo $v['use_sex']; ?></td>
                    <td><?php echo $v['use_content']; ?></td>
                    <td><?php echo $v['use_status']; ?></td>
                    <td><?php echo $v['use_time']; ?></td>
                    <td>
                        <a href="<?php echo url('basicEdit',['use_id'=>$v['use_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['use_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="10">
                        <!--分页容器-->
                        <div id="paged" style="text-align: right"></div>
                    </td>
                </tr>
                </tfoot>
            </table>

        </div>
    </fieldset>
    <div class="admin-table-page">
        <div id="page" class="page">
            <?php echo $page; ?>
        </div>
    </div>
</div>
<script src="__STATIC__/js/jquery.2.1.1.min.js"></script>
<script type="text/javascript" src="__ADMIN__/plugins/layui/layui.js"></script>
<script>
    layui.use(['form', 'layer'], function() {
        var form = layui.form(), layer = layui.layer;
    });
    layui.use('laypage', function(){
        var laypage = layui.laypage;

        laypage({
            cont: 'paged'
            ,pages: <?php echo $count; ?>
            ,curr:<?php echo $pageIndex; ?>
            ,skip: true
            ,jump: function(obj, first){
                //首次不执行
                console.log(obj);
                if(!first){
                    var keyword = $("#username").val();
                    if(keyword) {
                        location.href="/admin/userinfo/basic.html?pageIndex="+obj.curr+"&keyword="+keyword;
                    } else {
                        location.href="/admin/userinfo/basic.html?pageIndex="+obj.curr;
                    }

                    //do something
                }
            }
        });
        $('.demoTable .layui-btn').on('click', function(){
            $("#formSearch").submit();
        });

    });

    function del(id) {
        layer.confirm('<?php echo lang("Are you sure you want to delete it"); ?>', {icon: 3}, function (index) {
            window.location.href = "<?php echo url('basicDel'); ?>?use_id="+id;
        });
    }

</script>
</body>

</html>