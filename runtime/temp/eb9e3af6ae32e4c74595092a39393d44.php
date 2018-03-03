<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/Users/lvjiluan/project/wwbadmin/app/admin/view/content/headlines.html";i:1519826095;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>头条管理</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <blockquote class="layui-elem-quote">
        <a href="<?php echo url('headlinesAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>头条内容
        </a>
    </blockquote>
    <fieldset class="layui-elem-field ">
        <legend>头条<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <form method="get" id="formSearch" action="<?php echo url('headlines'); ?>">
                <div class="demoTable" style="margin-bottom: 10px;">
                    搜索头条：
                    <div class="layui-inline">
                        <input class="layui-input" value="<?php echo $keyword; ?>" name="keyword" id="username" autocomplete="off">
                    </div>
                    <button class="layui-btn" data-type="reload">搜索</button>
                </div>
            </form>
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>头条标题</th>
                    <th>头条缩略图</th>
                    <th>头条内容</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td width="10%"><?php echo $v['ta_title']; ?></td>
                    <td width="20%"><img style="max-width:80px;max-height:60px;" src="<?php echo $v['ta_thum_img']; ?>"/></td>
                    <td width="25%"><?php echo $v['ta_content']; ?></td>
                    <td width="15%"><?php echo $v['ta_status']; ?></td>
                    <td width="15%"><?php echo $v['ta_time']; ?></td>

                    <td width="15%">
                        <a href="javascript:void(0)" ta_id="<?php echo $v['ta_id']; ?>" id="layerDemo<?php echo $v['ta_id']; ?>" data-method="setTop" class="layui-btn layui-btn-mini">查看</a>
                        <a href="<?php echo url('headlinesEdit',['ta_id'=>$v['ta_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['ta_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
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
            window.location.href = "<?php echo url('headlinesDel'); ?>?ta_id="+id;
        });
    }
    layui.use('layer', function(obj){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
        //触发事件
        var active = {
            setTop: function(e){
                var pid = e.attr("ta_id");
                //多窗口模式，层叠置顶
                layer.open({
                    type: 2 //此处以iframe举例
                    ,title: '头条内容详情'
                    ,area: ['800px', '500px']
                    ,shade: 0
                    ,maxmin: true
                    ,offset: [
                        ($(window).height()*0.1)
                        ,($(window).width()*0.2)
                    ]
                    ,content: "<?php echo url('headlinesView'); ?>?ta_id="+pid
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
                        location.href="/admin/content/headlines.html?pageIndex="+obj.curr+"&keyword="+keyword;
                    } else {
                        location.href="/admin/content/headlines.html?pageIndex="+obj.curr;
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