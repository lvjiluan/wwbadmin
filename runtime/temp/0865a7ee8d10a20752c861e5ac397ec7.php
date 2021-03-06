<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/Users/lvjiluan/project/wwbadmin/app/admin/view/content/question.html";i:1519745666;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>打听管理</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <blockquote class="layui-elem-quote">
        <a href="<?php echo url('questionAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>打听内容
        </a>
    </blockquote>
    <fieldset class="layui-elem-field ">
        <legend>打听信息<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <form method="get" id="formSearch" action="<?php echo url('question'); ?>">
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
                    <th>打听用户</th>
                    <th>匿名名称</th>
                    <th>打听内容</th>
                    <th>关联机构</th>
                    <th>创建时间</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['hli_title']; ?></td>
                    <td><?php echo $v['hli_title']; ?></td>
                    <td><?php echo $v['tq_content']; ?></td>
                    <td><?php echo $v['tq_org_arrid']; ?></td>
                    <td><?php echo $v['tq_time']; ?></td>

                    <td>
                        <a href="javascript:void(0)" tq_id="<?php echo $v['tq_id']; ?>" id="layerDemo<?php echo $v['tq_id']; ?>" data-method="setTop" class="layui-btn layui-btn-mini">查看</a>
                        <a href="<?php echo url('questionEdit',['tq_id'=>$v['tq_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['tq_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
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
            window.location.href = "<?php echo url('questionDel'); ?>?tq_id="+id;
        });
    }
    layui.use('layer', function(obj){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
        //触发事件
        var active = {
            setTop: function(e){
                var pid = e.attr("tq_id");
                //多窗口模式，层叠置顶
                layer.open({
                    type: 2 //此处以iframe举例
                    ,title: '打听内容详情'
                    ,area: ['800px', '500px']
                    ,shade: 0
                    ,maxmin: true
                    ,offset: [
                        ($(window).height()*0.1)
                        ,($(window).width()*0.2)
                    ]
                    ,content: "<?php echo url('questionView'); ?>?tq_id="+pid
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
                        location.href="/admin/content/question.html?pageIndex="+obj.curr+"&keyword="+keyword;
                    } else {
                        location.href="/admin/content/question.html?pageIndex="+obj.curr;
                    }

                    //do something
                }
            }
        });
        $('.demoTable .layui-btn').on('click', function(){
            $("#formSearch").submit();
        });

    });

</script>
</body>

</html>