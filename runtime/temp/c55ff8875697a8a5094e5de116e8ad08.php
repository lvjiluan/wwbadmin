<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/Users/lvjiluan/project/wwbadmin/app/admin/view/platform/opinion.html";i:1519745721;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>意见反馈</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <!--<blockquote class="layui-elem-quote">-->
        <!--<a href="<?php echo url('opinionAdd'); ?>" class="layui-btn layui-btn-small">-->
            <!--<i class="fa fa-plus"></i> <?php echo lang('add'); ?>意见反馈-->
        <!--</a>-->
    <!--</blockquote>-->
    <div style="height:50px;">
        <form method="post" action="<?php echo url('opinion'); ?>" >
            <input style="width:300px;float:left;" value="<?php echo $content; ?>" placeholder="输入反馈用户搜索" class="layui-input" type="text" name="content" class="content" />
            <button style="float:left;margin-left:10px;" type="submit" class="layui-btn" lay-submit="" lay-filter="auth">搜索</button>
        </form>
    </div>
    <div style="clear:both"></div>
    <fieldset class="layui-elem-field ">
        <legend>意见反馈<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>反馈用户</th>
                    <th>反馈内容</th>
                    <th>提交时间</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['pro_id']; ?></td>
                    <td><?php echo $v['use_nickname']; ?></td>
                    <td><div style="width:600px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $v['pro_content']; ?></div></td>
                    <td><?php echo $v['pro_time']; ?></td>
                    <td>
                        <a href="javascript:void(0)" pro_id="<?php echo $v['pro_id']; ?>" id="layerDemo<?php echo $v['pro_id']; ?>" data-method="setTop" class="layui-btn layui-btn-mini">查看内容</a>
                        <!--<a href="<?php echo url('opinionEdit',['pro_id'=>$v['pro_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>-->
                        <a href="javascript:;" onclick="return del('<?php echo $v['pro_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
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
            window.location.href = "<?php echo url('opinionDel'); ?>?pro_id="+id;
        });
    }

    layui.use('layer', function(obj){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
        //触发事件
        var active = {
            setTop: function(e){
                var pid = e.attr("pro_id");
                //多窗口模式，层叠置顶
                layer.open({
                    type: 2 //此处以iframe举例
                    ,title: '反馈内容详情'
                    ,area: ['390px', '260px']
                    ,shade: 0
                    ,maxmin: true
                    ,offset: [
                        ($(window).height()*0.2)
                        ,($(window).width()*0.3)
                    ]
                    ,content: "<?php echo url('opinionView'); ?>?pro_id="+pid
                    ,btn: ['关闭'] //只是为了演示
                    ,btn2: function(){
                        layer.closeAll();
                    }
                });
            }

        };
        $('.layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
        });

    });
</script>
</body>

</html>